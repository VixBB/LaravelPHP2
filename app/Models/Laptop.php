<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_laptop',
        'merk',
        'tipe',
        'cpu',
        'gpu',
        'ram',
        'storage',
        'port',
        'gambar',
        'status',
    ];

    public function peminjaman()
{
    return $this->hasMany(Peminjaman::class);
}

    
}
