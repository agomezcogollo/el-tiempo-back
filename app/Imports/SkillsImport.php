<?php

namespace App\Imports;

use App\Models\Skills;
use Maatwebsite\Excel\Concerns\ToModel;

class SkillsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Skills([
            'title_profession'  => $row[0],
            'skill'             => $row[1],
        ]);
    }
}
