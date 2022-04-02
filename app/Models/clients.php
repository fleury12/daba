<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clients extends Model
{
    use HasFactory;


    public function societes()
    {
        return $this->belongsTo(Societes::class, 'id_societe');
    }
}
