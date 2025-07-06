<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PesananModel;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class LaporanController extends BaseController
{
    protected $pesananModel;

    public function __construct()
    {
        $this->pesananModel = new PesananModel();
    }

    public function index()
    {
        $from = $this->request->getGet('from');
        $to = $this->request->getGet('to');

        $builder = $this->pesananModel;

        if ($from && $to) {
            $builder = $builder->where('tanggal_pesan >=', $from)
                ->where('tanggal_pesan <=', $to);
        }

        $pesanan = $builder->findAll();

        // ✅ Hitung total pendapatan
        $totalPendapatan = 0;
        foreach ($pesanan as $p) {
            $totalPendapatan += $p['total_harga'];
        }

        $data = [
            'pesanan' => $pesanan,
            'from' => $from,
            'to' => $to,
            'total_pendapatan' => $totalPendapatan // kirim ke view
        ];

        return view('admin/laporan/index', $data);
    }


    public function exportPdf()
    {
        $data['pesanan'] = $this->pesananModel->findAll();
        $dompdf = new Dompdf();
        $html = view('admin/laporan/pdf', $data);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('laporan-pembayaran.pdf');
    }

    public function exportExcel()
    {
        $pesanan = $this->pesananModel->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'ID Member');
        $sheet->setCellValue('C1', 'Tanggal Pesan');
        $sheet->setCellValue('D1', 'Total Harga');
        $sheet->setCellValue('E1', 'Status Pembayaran');

        $no = 1;
        $row = 2;

        foreach ($pesanan as $p) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $p['id_member']);
            $sheet->setCellValue('C' . $row, $p['tanggal_pesan']);
            $sheet->setCellValue('D' . $row, $p['total_harga']);
            $sheet->setCellValue('E' . $row, $p['status_pembayaran']);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'laporan-pembayaran.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}
