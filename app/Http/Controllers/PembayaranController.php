<?php

namespace App\Http\Controllers;

use App\Models\pembayaran;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = pembayaran::get();
            return DataTables::of($query)->make();
        }

        return view('pages.pembayaran.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.pembayaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nomer' => 'required',
            'an' => 'required',
            'jenis' => 'required',
            ]);

        pembayaran::create($request->all());

        return redirect('pembayaran')->with('toast', 'showToast("Data berhasil disimpan")');
    }

    /**
     * Display the specified resource.
     */
    public function show(pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = pembayaran::findOrFail($id);

        return view('pages.pembayaran.edit', [
            'item'  =>  $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pembayaran $pembayaran)
    {
        $request->validate([
            'nama' => 'required',
            'nomer' => 'required',
            'an' => 'required',
            'jenis' => 'required',
            ]);

            $pembayaran->update($request->all());

        return redirect('pembayaran')->with('toast', 'showToast("Data berhasil diubah")');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect('pembayaran')->with('toast', 'showToast("Data berhasil dihapus")');
    }
}
