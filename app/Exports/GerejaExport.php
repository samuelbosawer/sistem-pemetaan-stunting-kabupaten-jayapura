<?php

namespace App\Exports;

use App\Models\Gereja;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Http\Request;

class GerejaExport implements FromCollection, WithHeadings, WithMapping, WithStyles
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
        return Gereja::where(function ($query) {
                $query->where('nama_gereja', '!=', Null);
                if (($s = $this->request->s)) {
                    $query->where('nama_gereja', 'LIKE', '%' . $s . '%')
                        ->orWhere('alamat', 'LIKE', '%' . $s . '%')
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
            'Nama Gereja',
            'Wilayah',
            'Alamat',
            'Keterangan',
        ];
    }


    public function map($gereja): array
    {
        $no = ++$this->no;
        return [
            $no,
            $gereja->nama_gereja,
            $gereja->wilayah->nama_wilayah,
            $gereja->alamat,
            $gereja->keterangan,
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
