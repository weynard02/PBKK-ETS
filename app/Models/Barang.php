<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'jenis_id', 'kondisi_id', 'keterangan', 'kecacatan', 'jumlah', 'image_path'];

    public function jenis(): BelongsTo
    {
        return $this->belongsTo(Jenis::class);
    }

    public function kondisi(): BelongsTo
    {
        return $this->belongsTo(Kondisi::class);
    }
}
