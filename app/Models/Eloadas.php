<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eloadas extends Model
{
    use HasFactory;

    protected $fillable = ['filmid', 'moziid', 'datum', 'nezoszam', 'bevetel'];

    public function film() {
        return $this->belongsTo(Film::class, 'filmid');
    }

    public function mozi() {
        return $this->belongsTo(Mozi::class, 'moziid');
    }
}
