<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novel extends Model
{
    use HasFactory;

    // Menentukan field yang bisa diisi
    protected $fillable = [
        'judul', 
        'penulis',
        'sinopsis',
        'gambar',
    ];
}
