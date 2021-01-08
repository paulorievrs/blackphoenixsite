<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogo extends Model
{
    use HasFactory;
    protected $table = "jogos";


    public function campeonatos()
    {
        return $this->belongsTo(Campeonatos::class);
    }

    public function times()
    {
        return $this->belongsTo(Time::class);
    }

}
