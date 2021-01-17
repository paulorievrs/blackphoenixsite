<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amazon extends Model
{
    use HasFactory;

    protected $table = 'amazon';

    public function amazon()
    {
        return $this->hasOne(User::class, 'user_id');
    }

}
