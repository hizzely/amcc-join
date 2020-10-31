<?php
namespace App\Action;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ContactAction extends BaseAction
{
    public function payment(Request $request, Response $response)
    {
        $params = $request->getQueryParams();

        if (array_key_exists('name', $params)) {
            $message = urlencode(sprintf('Halo, saya %s. Saya mau konfirmasi pembayaran Expo AMCC, berikut bukti transfernya...', $params['name']));
        } else {
            die('Missing "name" parameter!');
        }

        $contact = $this->db->get('settings', 'value', ['name' => 'cp_payment']);

        header(sprintf('Location: http://wa.me/%s?text=%s', $contact, $message));
        
        exit();
    }
}
