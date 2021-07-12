<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelationSkillsUser extends Model
{
    use HasFactory;

    /**
    * Get customers from every trip
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
    * Get customers from every trip
    */
    public function skills()
    {
        return $this->belongsTo(Skills::class);
    }
}
