<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stunting extends Model
{
    use HasFactory;

    public function puskesmas()
    {
        return $this->belongsTo(Puskesmas::class,'puskesmas_id', 'id');
    }
}
