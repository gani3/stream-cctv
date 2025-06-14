<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuanganModels extends Model
{
    use HasFactory;

    protected $table="ruangan";
    protected $primary_key = "id";
    protected $fillable = ['nama_ruangan'];

}
