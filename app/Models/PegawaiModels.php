<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PegawaiModels extends Model
{
    use HasFactory;

    protected $table="pegawai";
    protected $primary_key = "id";
    protected $fillable = ['nip','nama_pegawai','jenis_kelamin','ruangan_models_id'];


    public function ruangan():BelongsTo{
        return $this->belongsTo(RuanganModels::class, 'ruangan_models_id','id');
    }

}
