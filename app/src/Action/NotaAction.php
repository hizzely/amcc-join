<?php
namespace App\Action;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Hizzely\Fpdf\FPDF;

class NotaAction extends BaseAction
{ 
    public function view(Request $request, Response $response, $args)
    {
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 8);
        $pdf->Image('../public/img/nota.png', 5, 4, -300);
        
        // --- Lembar Bukti
        // Nomor
        $pdf->SetXY(9, 27);
        $pdf->Cell(25, 5.5, 'AMCC', 0, 1);
        $pdf->SetXY(36, 27);
        $pdf->Cell(25, 5.5, '0000', 0, 1);

        // Telah diterima dari
        $pdf->SetXY(9, 38);
        $pdf->Cell(50, 5.5, 'NAMA MEMBER', 0, 1);

        // Uang sejumlah
        $pdf->SetXY(12, 49);
        $pdf->Cell(48, 5.5, '00.000', 0, 1);

        // Untuk pembayaran
        $pdf->SetXY(9, 60);
        $pdf->Cell(50, 5.5, 'PENDAFTARAN MEMBER AMCC', 0, 1);

        // Tanggal
        $pdf->SetXY(9, 71.25);
        $pdf->Cell(14, 5.5, date('d'), 0, 1, 'C');
        $pdf->SetXY(27, 71.25);
        $pdf->Cell(14, 5.5, date('m'), 0, 1, 'C');
        $pdf->SetXY(45, 71.25);
        $pdf->Cell(14, 5.5, date('Y'), 0, 1, 'C');

        // --- Lembar Daftar
        // Nomor
        $pdf->SetXY(105.50, 27);
        $pdf->Cell(50, 5.5, 'AMCC/0000', 0, 1);

        // Telah diterima dari
        $pdf->SetXY(105.50, 33.75);
        $pdf->Cell(50, 5.5, 'NAMA MEMBER', 0, 1);

        // Uang sejumlah
        $pdf->SetXY(109, 40.5);
        $pdf->Cell(48, 5.5, '00.000', 0, 1);

        // Untuk pembayaran
        $pdf->SetXY(105.50, 47.75);
        $pdf->Cell(50, 5.5, 'PENDAFTARAN MEMBER AMCC', 0, 1);

        $pdf->SetFontSize(6);

        // Tanggal
        $pdf->SetXY(98, 57.50);
        $pdf->Cell(20, 5.5, date('d/m/Y'), 0, 1, 'L');

        // Penerima
        $pdf->SetXY(92, 71.50);
        $pdf->Cell(23, 5.5, 'Panitia', 0, 1, 'C');
        

        return $response->write($pdf->Output('I', 'amcc-nota.pdf'))
                        ->withHeader('Content-type', 'application/pdf');
    }
}