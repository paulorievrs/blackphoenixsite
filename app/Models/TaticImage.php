<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaticImage extends Model
{
    use HasFactory;
    protected $table = 'taticsimage';
    public function tatic()
    {
        return $this->belongsTo(Tatic::class);
    }

}
