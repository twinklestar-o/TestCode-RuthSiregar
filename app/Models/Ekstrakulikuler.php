<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekstrakulikuler extends Model
{
    protected $fillable = [ 
        'nama_ekstrakulikuler',
        'nama_penanggungjawab',
        'no_hp',
        'alamat'
    ];

    public function siswas()
    {
        return $this->belongsToMany(Siswa::class, 'siswa_ekstrakulikuler')
                    ->withPivot('tahun')
                    ->withTimestamps();
    }

    public function isFull()
    {
        return $this->siswas()->wherePivot('tahun', now()->year)->count() >= 20;
    }
}
