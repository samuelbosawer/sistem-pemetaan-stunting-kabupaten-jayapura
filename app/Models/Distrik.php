<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrik extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_distrik',
        'latitude',
        'longitude',
    ];

    public function kelurahan()
    {
        return $this->belongsToMany(Kelurahan::class,'kelurahan_id', 'id');
    }

    public function puskesmas()
    {
        return $this->belongsToMany(Kelurahan::class,'puskemas_id', 'id');
    }

    public function stunting()
    {
        return $this->hasMany(Stunting::class, 'distrik_id', 'id');
    }
}
