<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function transaksi() {
        return $this->hasOne(Transaksi::class, 'id_pembayaran');
    }
}
