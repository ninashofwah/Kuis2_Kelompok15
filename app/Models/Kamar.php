<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'kamar';
    
    // TODO: Definisikan kolom yang dapat diisi (mass assignment)
    protected $fillable = [
        'nomor_kamar', 
        'tipe', 
        'harga_bulanan', 
        'fasilitas', 
        'status'
    ];
    
    // TODO: Definisikan relasi ke tabel lain
    public function kontrakSewa()
    {
        return $this->hasMany(KontrakSewa::class, 'kamar_id');
    }
}

