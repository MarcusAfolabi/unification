<?php

namespace App\Exports;

use App\Models\FourthSubConvention;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SubconventionsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return FourthSubConvention::all(); // Adjust as necessary
    }

    public function headings(): array
    {
        return [
            'S/No',
            'Email',
            'Full Name',
            'Fellowship Name',
            'Gender',
            'Phone Number',
            'Academic Status',
            'Fellowship Status',
            'Unit member',
            'When'
        ];
    }
}
