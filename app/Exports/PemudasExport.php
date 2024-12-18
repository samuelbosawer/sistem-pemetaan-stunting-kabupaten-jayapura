<?php

namespace App\Exports;

use App\Models\Pemuda;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Http\Request;

class PemudasExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
   protected $request, $no;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->no = 0;
    }

    public function collection()
    {

           return Pemuda::with('gereja')->whereHas('gereja')
            ->where(function ($query) {
                $query->where('nama_depan', '!=', Null);
                if (($s = $this->request->s)) {
                    $query->where('nama_depan', 'LIKE', '%' . $s . '%')
                        ->orWhere('nama_tengah', 'LIKE', '%' . $s . '%')
                        ->orWhere('nama_belakang', 'LIKE', '%' . $s . '%')
                        ->orWhere('nomor_hp', 'LIKE', '%' . $s . '%');
                }
            })
            ->orderBy('id', 'desc')
            ->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Jenis Kelamin',
            'TTL',
            'No HP',
            'Usia (Tahun)',
            'Alamat',
            'Gereja',
            // 'Foto',
        ];
    }


    public function map($pemuda): array
    {
          $no = ++$this->no;
        return [

            $no,
            $pemuda->nama_depan.' '.$pemuda->nama_tengah.' '.$pemuda->nama_belakang,
            $pemuda->jenis_kelamin,
            $pemuda->tempat_lahir.' '.strftime('%d %B %Y', strtotime($pemuda->tanggal_lahir)),
            $pemuda->no_hp,
            $pemuda->usia,
            $pemuda->alamat,
            $pemuda->gereja->nama_gereja,
            // $mahasiswa->foto,
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
