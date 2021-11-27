<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';
    protected $primaryKey = 'id';

    protected $fillable = [
        'Nama', 'Harga', 'Stok', 'siswa_id'
    ];
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
