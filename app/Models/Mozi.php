<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mozi extends Model
{
    protected $table = 'mozi';   // <<< EZ HIÁNYZOTT

    public function eloadasok()
    {
        return $this->hasMany(Eloadas::class, 'moziid');
    }
}
