<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistoryModels extends Model
{
    use HasFactory;

    protected $table="history";
    protected $primary_key = "id";
    protected $fillable = ['keterangan','jam','tanggal','perangkat_models_id'];

    public function perangkat():BelongsTo{
        return $this->belongsTo(PerangkatModels::class, 'perangkat_models_id','id');
    }
}
