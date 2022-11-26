<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upah extends Model
{
    use HasFactory;
    protected $fillable = [
        'upah',
        'jenis_upah',
        'mulai',
        'selesai',
        'status',
        'permintaan_id', 
    ];
    public function permintaan()
    {
        return $this->belongsTo(Permintaan::class, 'permintaan_id');
    }
}
