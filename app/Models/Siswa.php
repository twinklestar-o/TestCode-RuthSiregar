<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [ 
        'foto',
        'nama_depan',
        'nama_belakang',
        'no_hp',
        'nisn',
        'alamat',
        'jenis_kelamin'
    ];

    protected $casts = [
        'foto' => 'array', // Cast lampiran column as array
    ];

    public function ekstrakulikulers()
    {
        return $this->belongsToMany(Ekstrakulikuler::class, 'siswa_ekstrakulikuler')
                    ->withPivot('tahun')
                    ->withTimestamps();
    }

    public function getAvailableEkstrakulikulers()
    {
        return Ekstrakulikuler::whereDoesntHave('siswas', function ($query) {
            $query->where('siswa_id', $this->id); // Ekstrakulikuler yang belum diambil siswa
        })->orWhereHas('siswas', function ($query) {
            $query->where('siswa_id', $this->id)->where('tahun', now()->year);
        }, '<', 20) // Batas maksimal 20 siswa per ekstrakulikuler
        ->get();
    }
}
