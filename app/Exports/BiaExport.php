<?php

namespace App\Exports;

use App\Models\Asset;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;

class BiaExport implements FromCollection, WithHeadings, WithCustomStartCell, WithStyles, ShouldAutoSize, WithMapping
{

    public function headings(): array
    {
        return [
            [
                'Nomor', '', '', 'Spesifikasi Aset', '', '', 'Bahan', 'Asal-Usul Perolehan Aset', 'Tanggal Perolehan', 'Satuan', 'Kondisi Aset (B/RR/RB)', 'Jumlah', '', 'Ket'
            ],
            [
                'No.', 'Kode Aset', 'Register', 'Nama/Jenis Aset', 'Merek/Tipe', 'No. Sertifikat/No. Pabrik/No. Rangka/No. Mesin', '', '', '', '', '', 'Aset', 'Harga', ''
            ],
        ];
    }

    public function startCell(): string
    {
        return 'A1';
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->mergeCells('A1:C1');
        $sheet->mergeCells('D1:F1');
        $sheet->mergeCells('L1:M1');
        $sheet->mergeCells('G1:G2');
        $sheet->mergeCells('H1:H2');
        $sheet->mergeCells('I1:I2');
        $sheet->mergeCells('J1:J2');
        $sheet->mergeCells('K1:K2');
        $sheet->mergeCells('N1:N2');

        $sheet->getStyle('A1:N1')->getFont()->setBold(true);
        $sheet->getStyle('A2:N2')->getFont()->setBold(true);
        $sheet->getStyle('A1:N2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A1:N2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        $styleArray = [
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => ['argb' => 'FFFF00'],
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
            'font' => [
                'color' => ['argb' => '000000'],
            ],
        ];

        $sheet->getStyle('A1:N2')->applyFromArray($styleArray);

        return [];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Asset::with(['detailAset', 'kodefikasiAset'])->get();
    }
    protected $index = 0;
    public function map($row): array
    {
        return [
            ++$this->index,
            $row->kodefikasiAset->kodefikasi_aset,
            $row->kodefikasiAset->no_register,
            $row->nama . " (" . $row->jenis . ")",
            $row->merek ?? '-',
            $row->detailAset->no_sertifikat ?? $row->detailAset->no_seri_pabrik ?? '-',
            $row->material ?? '-',
            $row->riwayat ?? '-',
            $row->tahun ?? '-',
            $row->detailAset->satuan ?? '-',
            strtoupper($row->kondisi ?? '-'),
            $row->detailAset->jumlah ?? '-',
            $row->harga ?? '-',
            $row->ket ?? '-',
        ];
    }
}
