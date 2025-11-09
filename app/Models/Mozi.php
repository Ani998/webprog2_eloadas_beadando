<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mozi extends Model
{
    use HasFactory;

    protected $fillable = ['neve', 'varos', 'ferohely'];

    public function eloadasok() {
        return $this->hasMany(Eloadas::class, 'moziid');
    }
}
