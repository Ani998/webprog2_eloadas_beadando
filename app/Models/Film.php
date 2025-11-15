<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $table = 'film'; // fontos, ha nem "films" a táblanév!

    protected $fillable = [
        'cim',
        'ev',
        'hossz',
    ];

    public $timestamps = false; // mert a film táblában nincs created_at / updated_at
}
