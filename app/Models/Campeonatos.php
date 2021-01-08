<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campeonatos extends Model
{
    use HasFactory;

    public $table = 'campeonatos';

    public function jogos()
    {
        return $this->hasOne(Jogo::class, 'campeonato_id');
    }
}
