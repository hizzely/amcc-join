<?php
namespace App\Action;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Fpdf\Fpdf as FPDF;

class NotaAction extends BaseAction
{
    public function view(Request $request, Response $response, $args)
    {
        $member = $this->db->get('nota', [
            '[>]member' => ['nim' => 'nim']
        ], [
            'nota.penerima',
            'nota.hash',
            'nota.tgl_dibuat',
            'member.nama',
            'member.noReg'
        ], ['nota.hash' => $args['id']]);

        if (!$member) {
            return $response->withJson([
                'status' => 'error',
                'message' => 'Data tidak ditemukan.'
            ], 404);
        }

        $price = $this->db->get('settings', 'value', ['name' => 'price']);
        
        $nota = $this->generate([
            'no_reg'    => $member['noReg'],
            'nama'      => $member['nama'],
            'penerima'  => $member['penerima'],
            'harga'     => $price,
            'tgl'       => $member['tgl_dibuat']
        ]);

        return $response->write($nota->Output('I', 'amcc-nota.pdf'))
                        ->withHeader('Content-type', 'application/pdf');
    }

    public function generate($data)
    {
        $date = date_parse($data['tgl']);
        
        $pdf = new FPDF('L', 'mm', [230, 110]);
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 8);
        $pdf->Image('../public/img/nota.png', 15, 14, -300);
        
        // --- Lembar Bukti
        // Nomor
        $pdf->SetXY(19, 37);
        $pdf->Cell(25, 5.5, 'AMCC', 0, 1);
        $pdf->SetXY(46, 37);
        $pdf->Cell(25, 5.5, $data['no_reg'], 0, 1);

        // Telah diterima dari
        $pdf->SetXY(19, 48);
        $pdf->Cell(50, 5.5, strtoupper($data['nama']), 0, 1);

        // Uang sejumlah
        $pdf->SetXY(22, 59);
        $pdf->Cell(48, 5.5, $data['harga'], 0, 1);

        // Untuk pembayaran
        $pdf->SetXY(19, 70);
        $pdf->Cell(50, 5.5, strtoupper('PENDAFTARAN MEMBER AMCC'), 0, 1);

        // Tanggal
        $pdf->SetXY(19, 81.25);
        $pdf->Cell(14, 5.5, $date['day'], 0, 1, 'C');
        $pdf->SetXY(37, 81.25);
        $pdf->Cell(14, 5.5, $date['month'], 0, 1, 'C');
        $pdf->SetXY(55, 81.25);
        $pdf->Cell(14, 5.5, $date['year'], 0, 1, 'C');

        // --- Lembar Daftar
        // Nomor
        $pdf->SetXY(115.50, 37);
        $pdf->Cell(50, 5.5, 'AMCC/' . $data['no_reg'], 0, 1);

        // Telah diterima dari
        $pdf->SetXY(115.50, 43.75);
        $pdf->Cell(50, 5.5, strtoupper($data['nama']), 0, 1);

        // Uang sejumlah
        $pdf->SetXY(119, 50.5);
        $pdf->Cell(48, 5.5, $data['harga'], 0, 1);

        // Untuk pembayaran
        $pdf->SetXY(115.50, 57.75);
        $pdf->Cell(50, 5.5, strtoupper('PENDAFTARAN MEMBER AMCC'), 0, 1);

        $pdf->SetFontSize(6);

        // Tanggal
        $pdf->SetXY(108, 67.50);
        $pdf->Cell(20, 5.5, $date['day'] . '/' . $date['month'] . '/' . $date['year'], 0, 1, 'L');

        // Penerima
        $pdf->SetXY(102, 81.50);
        $pdf->Cell(23, 5.5, strtoupper($data['penerima']), 0, 1, 'C');
        
        return $pdf;
    }
}