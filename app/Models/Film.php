<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = ['cim', 'ev', 'hossz'];

    public function eloadasok() {
        return $this->hasMany(Eloadas::class, 'filmid');
    }
}