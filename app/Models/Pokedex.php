<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pokedex extends Model
{
    protected $table = 'pokedexs';

    protected $fillable = [
        'name',
        'type',
        'species',
        'height',
        'weight',
        'hp',
        'attack',
        'defense',
        'image_url'
    ];
}
