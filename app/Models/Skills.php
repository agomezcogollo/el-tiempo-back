<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_profession',
        'skill',
    ];

    /**
     * Get the trip of each skills
    */
    public function relationskillsuser()
    {
        return $this->hasMany(RelationSkillsUser::class);
    }

}
