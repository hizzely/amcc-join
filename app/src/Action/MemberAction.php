<?php
namespace App\Action;

//use App\Datatables;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Ozdemir\Datatables\Datatables;
use Ozdemir\Datatables\DB\MySQL;

class MemberAction extends BaseAction
{

    public function home(Request $request, Response $response)
    {
        $this->view->render($response, 'admin.home');

        return $response;
    }

    public function getData(Request $request, Response $response)
    {
        $config = [
            'host'     => getenv('DB_HOST'),
            'port'     => '3306',
            'username' => getenv('DB_USER'),
            'password' => getenv('DB_PASS'),
            'database' => getenv('DB_NAME')
        ];

        $dt = new Datatables(new MySQL($config));

        $dt->query("SELECT nim, nama, email, noHp, divisi, noReg, status FROM member");

        $dt->add('aksi', function($row) {
            $editBtn = '<button type="button" class="btn btn-info btn-sm" data-nim="'.$row['nim'].'" data-status="'.$row['status'].'" data-reg="'.$row['noReg'].'" data-nama="'.$row['nama'].'" data-toggle="modal" data-target="#edit-member-modal"><i class="ion-edit"></i></button>';
            $deleteBtn = '<button type="button" class="btn btn-danger btn-sm btn-delete-member" data-nim="'.$row['nim'].'" data-nama="'.$row['nama'].'"><i class="ion-trash-a"></i></button>';

            return "$editBtn $deleteBtn";
        });

        return $response->withJson($dt->generate()->toArray());
    }

    public function editData(Request $request, Response $response)
    {
        $data = $request->getParsedBody();

        $member = $this->db->get('member', '*', ['nim' => $data['nim']]);

        if (!$member) {
            return $response->withJson([
                'status' => 'error',
                'message' => 'Data tidak ditemukan.'
            ], 404);
        }

        if (!array_key_exists('status', $data)) {
            $data['status'] = 0;
        }

        if (!array_key_exists('nota-notify', $data)) {
            $data['nota-notify'] = 0;
        }

        $this->db->update('member', [
            'noReg'  => $data['noReg'],
            'status' => (int) $data['status']
        ], ['nim' => $data['nim']]);
        
        if ($data['status']) {
            $inserted = $this->db->get('nota', 'hash', ['nim' => $data['nim']]);
            $nota_hash = '';

            if (!$inserted) {
                $nota_hash = md5(date('dmYhis') . $member['noReg']);

                $this->db->insert('nota', [
                    'nim' => $data['nim'],
                    'penerima' => 'Admin',
                    'hash' => $nota_hash,
                    'notified' => $data['nota-notify']
                ]);
            } else {
                $nota_hash = $inserted;
            }

            if ($data['nota-notify']) {
                $data = [
                    'nama' => $member['nama'],
                    'nim' => $member['nim'],
                    'link_nota' => getenv('APP_URL') . '/e-nota/' . $nota_hash,
                ];
        
                $this->view->render($response, 'email.nota', compact('data'));
                $mailContent = $response->getBody()->__toString();
                $mailSubject = 'Join AMCC @Expo Amikom 2019';
        
                $mail = $this->mailer;
                $mail->setFrom(getenv('SMTP_FROM_EMAIL'), getenv('SMTP_FROM_NAME'));
                $mail->addAddress($member['email']);
                $mail->isHTML(true);
                $mail->Subject = $mailSubject;
                $mail->Body = $mailContent;
                
                try {
                    $mail->send();
                    $this->db->update('nota', ['notified'  => 1], ['nim' => $data['nim']]);
                } catch (Exception $e) {
                    return $response->withJson([
                        'status' => 'error',
                        'message' => $mail->ErrorInfo()
                    ], 500);
                }
            }
        } else {
            $this->db->delete('nota', ['nim' => $data['nim']]);
        }

        return $response->withJson([
            'status' => 'ok',
            'message' => 'Data member berhasil diupdate.'
        ]);
    }

    public function deleteData(Request $request, Response $response)
    {
        $data = $request->getParsedBody();

        $member = $this->db->get('member', '*', ['nim' => $data['nim']]);

        if (!$member) {
            return $response->withJson([
                'status' => 'error',
                'message' => 'Data tidak ditemukan.'
            ], 404);
        }

        $this->db->delete('member', ['nim' => $data['nim']]);
        $this->db->delete('nota', ['nim' => $data['nim']]);

        return $response->withJson([
            'status' => 'ok',
            'message' => 'Data member berhasil dihapus.'
        ]);
    }
}
