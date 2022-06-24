<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;
    protected $fillable = ['hero_name', 'gender', 'type', 'description' , 'photo','skill_id'];

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

    public function universes()
    {
        return $this->belongsToMany(Universe::class, 'heroes_universe', 'hero_id' , 'universe_id');
    }

}
