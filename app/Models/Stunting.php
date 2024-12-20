<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stunting extends Model
{
    use HasFactory;

    protected $fillable = [
        'distrik_id',
        'jumlah_balita',
        'sangat_pendek',
        'pendek',
    ];

    public function distrik()
    {
        return $this->belongsTo(Distrik::class,'distrik_id', 'id');
    }

}
