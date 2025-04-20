<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_depan',
        'nama_belakang',
        'tanggal_lahir',
        'jenis_kelamin',
    ];

    // Relasi ke tabel users
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Non-aktifkan soft delete agar admin tidak bisa dihapus
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($admin) {
            throw new \Exception("Admin tidak dapat dihapus.");
        });
    }
}