<?php

namespace App\Exports;

use App\Models\FourthSubConvention;
use Rap2hpoutre\FastExcel\FastExcel;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class SubconventionsExport
{
    public function export()
    {
        return (new FastExcel(FourthSubConvention::all()))->download('subconventions.xlsx', function ($convention) {
            return [
                'S/No' => $convention->id,
                'Full Name' => $convention->lastname . ' ' . $convention->firstname,
                'Fellowship Name' => $convention->fellowship_id,
                'Gender' => $convention->gender,
                'House' => $convention->house,
                'Phone Number' => $convention->phone,
                'Academic Status' => $convention->academic_status,
                'Fellowship Status' => $convention->fellowship_status,
                'Unit Member' => $convention->unit_id,
                'When' => $convention->created_at->format('l, jS M. Y g:ia'),
            ];
        });
    }
}
