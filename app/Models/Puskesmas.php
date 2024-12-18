<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puskesmas extends Model
{
    use HasFactory;

    public function distrik()
    {
        return $this->belongsTo(Distrik::class,'distrik_id', 'id');
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class,'kelurahan_id', 'id');
    }
}
