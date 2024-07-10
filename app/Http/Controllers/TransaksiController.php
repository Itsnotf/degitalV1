<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Transaksi::with('user', 'pembayaran', 'produk')->get();
            return DataTables::of($query)
                ->addColumn('user', function ($row) {
                    return $row->user->name;
                })
                ->addColumn('pembayaran', function ($row) {
                    return $row->pembayaran->nama;
                })
                ->addColumn('produk', function ($row) {
                    return $row->produk->namaProduk;
                })
                ->make(true);
        }

        return view('pages.transaksi.index');
    }

    public function updateStatus(Request $request, $id)
        {
            $transaksi = Transaksi::findOrFail($id);
            $transaksi->status = $request->input('status');
            $transaksi->save();

            return redirect()->back()->with('success', 'Status transaksi berhasil diperbarui.');
        }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect('pembayaran')->with('toast', 'showToast("Data berhasil dihapus")');
    }
}
