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

        $name = urlencode(sprintf('%s (%s)', $inserted['nama'], $inserted['nim']));
        $methods = $this->db->get('settings', 'value', ['name' => 'payment_methods']);
        $price = $this->db->get('settings', 'value', ['name' => 'price']);
        $confirmLink = $this->db->get('settings', 'value', ['name' => 'link_konfirmasi']);
        $data = [
            'nama' => $inserted['nama'],
            'firstname' => explode(' ', $inserted['nama'])[0],
            'nim' => $inserted['nim'],
            'payments' => explode(';', $methods),
            'amount' => 'Rp' . number_format($price, 0, ',', '.'),
            'divisi' => $this->getDivisi($inserted['divisi']),
            'link_konfirmasi' => $confirmLink,
        ];

        $this->view->render($response, 'email.invoice', compact('data'));

        $this->mailer
            ->from(getenv('SMTP_FROM_EMAIL'))
            ->to($inserted['email'])
            ->subject('Join Amikom Computer Club')
            ->html($response->getBody()->__toString())
            ->send();

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
