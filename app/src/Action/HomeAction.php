<?php
namespace App\Action;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class HomeAction extends BaseAction
{
    public function home(Request $request, Response $response)
    {
        $settings = $this->getSettingsData();

        $dateOpen = date_format(date_create($settings["date_open"]), "Y/m/d");

        $dateClosed = date_format(date_create($settings["date_closed"]), "Y/m/d");

        $now = date("Y/m/d");

        if ($now < $dateOpen) {
            header("Location:" . $this->helper->route("soon"));
            exit();
        }

        if ($now > $dateClosed) {
            die("Pendaftaran telah ditutup! :(");
        }

        $csrf = [
            'name'  => $request->getAttribute('csrf_name'),
            'value' => $request->getAttribute('csrf_value')
        ];

        $this->view->render($response, 'home', compact('csrf'));

        return $response;
    }

    public function soon(Request $request, Response $response)
    {
        $settings = $this->getSettingsData();

        $dateOpen = date_format(date_create($settings['date_open']), "Y/m/d");

        $now = date("Y/m/d");

        if ($now >= $dateOpen) {
            header("Location: /");
            exit();
        }

        $csrf = [
            'name'  => $request->getAttribute('csrf_name'),
            'value' => $request->getAttribute('csrf_value')
        ];

        $this->view->render($response, 'soon', compact(['csrf', 'dateOpen']));

        return $response;
    }

    public function register(Request $request, Response $response)
    {
        $data = $request->getParsedBody();
        $registrationCode = intval($this->db->get('settings', 'value', ['name' => 'registration_code']));
        $lastRegistrationNumber = $this->db->count('member');
        $registrationNumber = ($registrationCode + ($lastRegistrationNumber + 1));

        $id = $this->db->insert('member', [
            'nim'          => $data['nim'],
            'alamat'       => $data['address'],
            'asal_sekolah' => $data['school'],
            'divisi'       => $data['division'],
            'email'        => $data['email'],
            'nama'         => $data['fullname'],
            'noHp'         => $data['phone'],
            'noReg'        => $registrationNumber,
            'status'       => 0
        ]);

        $inserted = $this->db->get('member', '*', ['nim' => $data['nim']]);

        if (empty($inserted)) {
            $this->flash->addMessage('error', 'Terjadi kesalahan saat menyimpan data.');

            return $response->withStatus(500)->withHeader('Location', $this->router->pathFor('home'));
        }

        $message = urlencode(sprintf('Halo, saya %s (%s). Saya mau konfirmasi pembayaran Expo AMCC, berikut bukti transfernya...', $inserted['nama'], $inserted['nim']));

        $methods = $this->db->get('settings', 'value', ['name' => 'payment_methods']);

        $price = $this->db->get('settings', 'value', ['name' => 'price']);

        $contact = $this->db->get('settings', 'value', ['name' => 'cp_payment']);

        $data = [
            'nama' => $inserted['nama'],
            'firstname' => explode(' ', $inserted['nama'])[0],
            'nim' => $inserted['nim'],
            'payments' => explode(';', $methods),
            'amount' => 'Rp' . number_format($price, 0, ',', '.'),
            'divisi' => $this->getDivisi($inserted['divisi']),
            'link_konfirmasi' => sprintf('http://wa.me/%s?text=%s', $contact, $message),
        ];

        $this->view->render($response, 'email.invoice', compact('data'));

        $mailContent = $response->getBody()->__toString();
        $mailSubject = 'Join Amikom Computer Club';
        
        $mail = $this->mailer;
        $mail->setFrom(getenv('SMTP_FROM_EMAIL'), getenv('SMTP_FROM_NAME'));
        $mail->addAddress($inserted['email']);
        $mail->isHTML(true);
        $mail->Subject = $mailSubject;
        $mail->Body = $mailContent;
        
        try {
            $mail->send();
        } catch (Exception $e) {
            return $response->withJson([
                'status' => 'error',
                'message' => $mail->ErrorInfo()
            ], 500);
        }

        $this->flash->addMessage('success', $this->helper->getSettings()['success_message']);

        return $response->withStatus(200)->withHeader('Location', $this->router->pathFor('home'));
    }

    public function getSettingsData() : array
    {
        $settings = $this->db->select('settings', '*');

        foreach ($settings as $setting) {
            $data[$setting['name']] = $setting['value'];
        }
        
        return $data;
    }

    protected function getDivisi(string $code) : string
    {
        switch ($code) {
            case 'desktop':
                return 'Desktop Programming';
            case 'mobile':
                return 'Mobile Programming';
            case 'network':
                return 'Computer Network';
            case 'web-backend':
                return 'Web Programming (Backend)';
            case 'web-frontend':
                return 'Web Programming (Frontend)';
            case 'hardware':
                return 'Hardware Software';
            default:
                return 'Tidak dikenali';
        }
    }
}
