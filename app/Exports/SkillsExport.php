<?php

namespace App\Exports;

use App\Models\Skills;
use Maatwebsite\Excel\Concerns\FromCollection;

class SkillsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Skills::all();
    }
}
