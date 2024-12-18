<?php

namespace App\Exports;

use App\Models\Galeri;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Http\Request;


class GaleriExport implements FromCollection, WithHeadings, WithMapping, WithStyles
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
        return Galeri::with('gereja')->where(function ($query) {
                $query->where('judul', '!=', Null);
                if (($s = $this->request->s)) {
                    $query->where('judul', 'LIKE', '%' . $s . '%')
                        ->orWhere('keterangan', 'LIKE', '%' . $s . '%')
                        ->orWhere('foto', 'LIKE', '%' . $s . '%');
                }
            })
            ->orderBy('id', 'desc')
            ->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Gereja',
            'Judul',
            'Keterangan',
            'Status',
        ];
    }


    public function map($agenda): array
    {
        $no = ++$this->no;
        return [
            $no,
            $agenda->gereja->nama_gereja ?? 'Semua Gereja',
            $agenda->judul,
            $agenda->keterangan,
            $agenda->status,
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
