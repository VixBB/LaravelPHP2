<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    protected $fillable = [
        'user_id',
        'laptop_id',
        'tanggal_pinjam',
        'status',
    ];

    protected static function booted()
    {
        static::created(function ($peminjaman) {
            Log::info('Peminjaman created event triggered', ['status' => $peminjaman->status]);
            if ($peminjaman->status === 'dipinjam' && $peminjaman->Laptop) {
                Log::info('Updating Laptop status to dipinjam', ['laptop_id' => $peminjaman->Laptop->id]);
                $peminjaman->Laptop->update(['status' => 'dipinjam']);
            }
        });

        static::updated(function ($peminjaman) {
            Log::info('Peminjaman updated event triggered', ['status' => $peminjaman->status]);
            if ($peminjaman->status === 'dikembalikan' && $peminjaman->Laptop) {
                Log::info('Updating Laptop status to tersedia', ['laptop_id' => $peminjaman->Laptop->id]);
                $peminjaman->Laptop->update(['status' => 'tersedia']);
            }
        });
    }

    /**
     * Get the user that owns the peminjaman.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the laptop that is borrowed.
     */
    public function laptop()
    {
        return $this->belongsTo(Laptop::class);
    }
}
