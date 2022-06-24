<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universe extends Model
{
    use HasFactory;
    protected $fillable = ['universe_name'];

    public function heroes()
    {
        return $this->belongsToMany(Hero::class, 'heroes_universe', 'universe_id' , 'hero_id');
    }
}
