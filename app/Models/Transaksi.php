<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function produk() {
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function pembayaran() {
        return $this->belongsTo(Pembayaran::class, 'id_pembayaran');
    }
}
