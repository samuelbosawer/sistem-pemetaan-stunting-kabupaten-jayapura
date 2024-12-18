<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Http\Request;

class UsersExport implements FromCollection, WithHeadings, WithMapping, WithStyles
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
        return User::where(function ($query) {
                $query->where('email', '!=', Null);
                if (($s = $this->request->s)) {
                    $query->where('email', 'LIKE', '%' . $s . '%')
                        ->orWhere('name', 'LIKE', '%' . $s . '%');
                }
            })
            ->orderBy('id', 'desc')
            ->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Email',
            'Wilayah',
            'Gereja',
        ];
    }


    public function map($user): array
    {
        $no = ++$this->no;
        return [
            $no,
            $user->email,
            $user->wilayah->nama_wilayah ?? '',
            $user->gereja->nama_gereja ?? '',
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
