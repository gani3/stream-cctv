<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuTamuModels extends Model
{
    use HasFactory;

    protected $table="buku_tamu";
    protected $primary_key = "id";
    protected $fillable = ['nama_lengkap','jenis_kelamin','keperluan','tanggal','jam_masuk','jam_pulang'];
}
