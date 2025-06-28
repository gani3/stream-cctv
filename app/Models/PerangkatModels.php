<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PerangkatModels extends Model
{
    use HasFactory;

    protected $table="perangkat";
    protected $primary_key = "id";
    protected $fillable = ['kategori','label_cctv','model','channel','sumbu_x','sumbu_y','keterangan','ruangan_models_id'];


    public function ruangan():BelongsTo{
        return $this->belongsTo(RuanganModels::class,'ruangan_models_id','id');
    }
}
