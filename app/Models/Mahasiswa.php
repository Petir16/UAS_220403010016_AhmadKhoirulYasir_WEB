<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $primarykey = 'id';
    public $incrementing = true;
    protected $fillable = ['nama', 'nim', 'prodi', 'gambar'];
}
