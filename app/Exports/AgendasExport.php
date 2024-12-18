<?php

namespace App\Exports;

use App\Models\AgendaKegiatan as Agenda;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Http\Request;

class AgendasExport implements FromCollection, WithHeadings, WithMapping, WithStyles
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
        return Agenda::with('gereja')->where(function ($query) {
                $query->where('judul', '!=', Null);
                if (($s = $this->request->s)) {
                    $query->where('judul', 'LIKE', '%' . $s . '%')
                        ->orWhere('keterangan', 'LIKE', '%' . $s . '%')
                        ->orWhere('tanggal_kegiatan', 'LIKE', '%' . $s . '%')
                        ->orWhere('status', 'LIKE', '%' . $s . '%');
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
            'Tanggal Kegiatan',
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
            strftime('%d %B %Y', strtotime($agenda->tanggal_kegiatan)),
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
