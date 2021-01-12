<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tatic extends Model
{
    use HasFactory;
    protected $table = "tatics";

    public function taticimage()
    {
        return $this->hasMany(TaticImage::class, 'tatic_id');
    }
}
