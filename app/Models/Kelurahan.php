<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kelurahan',
        'distrik_id',
        'latitude',
        'longitude',
        'keterangan',
    ];

    public function distrik()
    {
        return $this->belongsTo(Distrik::class,'distrik_id', 'id');
    }
}
