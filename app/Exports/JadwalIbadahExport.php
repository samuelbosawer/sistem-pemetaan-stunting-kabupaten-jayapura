<?php

namespace App\Exports;

use App\Models\JadwalIbadah as Jadwal;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Http\Request;

class JadwalIbadahExport implements FromCollection, WithHeadings, WithMapping, WithStyles
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
        return Jadwal::with('gereja')->where(function ($query) {
                $query->where('tempat_ibadah', '!=', Null);
                if (($s = $this->request->s)) {
                    $query->where('tempat_ibadah', 'LIKE', '%' . $s . '%')
                    ->orWhere('pelayan_firman', 'LIKE', '%' . $s . '%')
                    ->orWhere('doa_syafaat', 'LIKE', '%' . $s . '%')
                    ->orWhere('doa_syukur', 'LIKE', '%' . $s . '%')
                    ->orWhere('status', 'LIKE', '%' . $s . '%')
                    ->orWhere('keterangan', 'LIKE', '%' . $s . '%')
                    ->orWhere('tanggal', 'LIKE', '%' . $s . '%');
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
            'Tanggal Ibadah',
            'Tempat Ibadah',
            'Pelayan Firman',
            'Doa Syafaat',
            'Doa Syukur',
            'Status',
            'Keterangan',
        ];
    }


    public function map($jadwal): array
    {
        $no = ++$this->no;
        return [
            $no,
            $jadwal->gereja->nama_gereja ?? 'Semua Gereja',
            strftime('%d %B %Y', strtotime($jadwal->tanggal)),
            $jadwal->tempat_ibadah,
            $jadwal->pelayan_firman,
            $jadwal->doa_syafaat,
            $jadwal->doa_syukur,
            $jadwal->status,
            $jadwal->keterangan,
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
