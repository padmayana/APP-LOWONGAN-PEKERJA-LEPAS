<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'bidang_id',
        'nama',
        'deskripsi', 
        'daerah_id',
        'upah', 
        'jenis_upah', 
        'kuota', 
        'terima', 
        'status', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'bidang_id');
    }
    public function daerah()
    {
        return $this->belongsTo(Daerah::class, 'daerah_id');
    }
}
