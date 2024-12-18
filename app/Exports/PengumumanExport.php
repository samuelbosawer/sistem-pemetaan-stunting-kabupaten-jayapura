<?php

namespace App\Exports;

use App\Models\Pengumuman;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Http\Request;

class PengumumanExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    protected $request, $no;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->no = 0;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pengumuman::where(function ($query) {
            $query->where('judul', '!=', Null);
            if (($s = $this->request->s)) {
                $query->where('judul', 'LIKE', '%' . $s . '%')
                    ->orWhere('mulai', 'LIKE', '%' . $s . '%')
                    ->orWhere('selesai', 'LIKE', '%' . $s . '%')
                    ->orWhere('keterangan', 'LIKE', '%' . $s . '%');
            }
        })
        ->orderBy('id', 'desc')
        ->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Judul',
            'Tanggal Mulai',
            'Tanggal Selesai',
            'Keterangan',
        ];
    }


    public function map($pengumuma): array
    {
        $no = ++$this->no;
        return [
            $no,
            $pengumuma->judul,
            strftime('%d %B %Y', strtotime($pengumuma->mulai)),
            strftime('%d %B %Y', strtotime($pengumuma->selesai)),
            $pengumuma->keterangan,
        ];
    }

    /**
     * @param Worksheet $sheet
     * @return array
     */
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }

}
