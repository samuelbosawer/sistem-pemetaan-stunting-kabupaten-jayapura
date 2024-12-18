<?php

namespace App\Exports;

use App\Models\Wilayah;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Http\Request;

class WilayahExport implements FromCollection, WithHeadings, WithMapping, WithStyles
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
        return Wilayah::where(function ($query) {
                $query->where('nama_wilayah', '!=', Null);
                if (($s = $this->request->s)) {
                    $query->where('nama_wilayah', 'LIKE', '%' . $s . '%')
                        ->orWhere('kode_wilayah', 'LIKE', '%' . $s . '%')
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
            'Nama Wilayah',
            'Kode Wilayah',
            'Keterangan',
        ];
    }


    public function map($wilayah): array
    {
        $no = ++$this->no;
        return [
            $no,
            $wilayah->nama_wilayah,
            $wilayah->kode_wilayah,
            $wilayah->keterangan,
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
