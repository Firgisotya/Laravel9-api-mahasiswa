<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $guarded = ['id'];

    public function jurusan()
    {
        return $this->belongsTo(jurusan::class);
    }

    public function kelas()
    {
        return $this->belongsTo(kelas::class);
    }
}
