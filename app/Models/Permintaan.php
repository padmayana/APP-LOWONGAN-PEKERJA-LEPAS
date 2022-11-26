<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    use HasFactory;
    protected $fillable = [
        'deskripsi',
        'status',
        'skil_id',
        'status_pekerjaan', 
        'daerah_id',
        'pekerja_id', 
        'klien_id', 
    ];

    public function klien()
    {
        return $this->belongsTo(User::class, 'klien_id');
    }public function pekerja()
    {
        return $this->belongsTo(User::class, 'pekerja_id');
    }
    public function skil()
    {
        return $this->belongsTo(Skil::class, 'skil_id');
    }
}
