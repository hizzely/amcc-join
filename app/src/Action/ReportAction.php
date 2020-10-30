<?php
namespace App\Action;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ReportAction extends BaseAction
{
    public function index(Request $request, Response $response)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = $request->getQueryParams();

        $date = (array_key_exists('d', $params) ? $params['d'] : date('d/m/Y'));
        $date = explode('/', $date);

        $price = intval($this->db->get('settings', 'value', ['name' => 'price']));

        $data = [
            'KSK-1' => [
                'time' => '00:00-07:00',
                'joined' => 0,
                'confirmed' => 0,
                'income' => 0,
            ],
            'SESI-1' => [
                'time' => '07:00-08:50',
                'joined' => 0,
                'confirmed' => 0,
                'income' => 0,
            ],
            'SESI-2' => [
                'time' => '08:50-10:40',
                'joined' => 0,
                'confirmed' => 0,
                'income' => 0,
            ],
            'SESI-3' => [
                'time' => '10:40-13:20',
                'joined' => 0,
                'confirmed' => 0,
                'income' => 0,
            ],
            'SESI-4' => [
                'time' => '13:20-15:00',
                'joined' => 0,
                'confirmed' => 0,
                'income' => 0,
            ],
            'KSK-2' => [
                'time' => '15:00-23:59',
                'joined' => 0,
                'confirmed' => 0,
                'income' => 0,
            ],
        ];

        foreach ($data as $k => $v) {
            $v['time'] = explode('-', $v['time']);
            $time['from'] = explode(':', $v['time'][0]);
            $time['to'] = explode(':', $v['time'][1]);

            $data[$k]['joined'] = $this->db->count('member', [
                'tgl_daftar[<>]' => [
                    date("Y-m-d H:i:s", mktime($time['from'][0], $time['from'][1], 0, $date[1], $date[0], $date[2])),
                    date("Y-m-d H:i:s", mktime($time['to'][0], $time['to'][1], 0, $date[1], $date[0], $date[2]))
                ]
            ]);

            $data[$k]['confirmed'] = $this->db->count('member', [
                'tgl_konfirmasi[<>]' => [
                    date("Y-m-d H:i:s", mktime($time['from'][0], $time['from'][1], 0, $date[1], $date[0], $date[2])),
                    date("Y-m-d H:i:s", mktime($time['to'][0], $time['to'][1], 0, $date[1], $date[0], $date[2]))
                ]
            ]);

            $data[$k]['income'] = number_format(($price * $data[$k]['confirmed']), 0, ',', '.');
        }
        
        $this->view->render($response, 'admin.report', ['data' => $data]);

        return $response;
    }
}