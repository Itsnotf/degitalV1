<?php

namespace App\Http\Controllers;

use App\Models\pembayaran;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function home() {
        $pembayarans = pembayaran::all();
        $produks = Produk::inRandomOrder()->limit(4)->get();
        return view('pages.home.index', compact('produks','pembayarans'));
    }

    public function shop(){
        $pembayarans = pembayaran::all();
        $produks = Produk::all();
        return view('pages.home.shop', compact('produks','pembayarans'));
    }

    public function profileUser(){
        return view('pages.home.profile');
    }

    public function cekout(Request $request) {
        $request->validate([
            'id_produk' => 'required',
            'id_pembayaran' => 'required',
            'qty' => 'required',
            'catatan' => 'required',
            'status' => 'required',
            'bukti' => 'nullable|max:2048|mimes:jpg,jpeg,png,gif',
        ]);

        $data = [
            'id_user' => Auth::id(),
            'id_produk' => $request->id_produk,
            'id_pembayaran' => $request->id_pembayaran,
            'qty' => $request->qty,
            'catatan' => $request->catatan,
            'status' => $request->status,
        ];

        if ($request->hasFile('bukti')) {
            $data['bukti']=$request->file('bukti')->store('bukti', 'public');
        }

        Transaksi::create($data);

        return redirect('/')->with('toast', 'showToast("Transaksi Sedang Di Proses")');
    }

    public function transaksiUser() {
        $transaksis = Transaksi::where('id_user', Auth::id())->get();
        return view('pages.home.transaksi', compact('transaksis'));
    }



}
