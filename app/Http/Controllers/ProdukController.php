<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Produk::get();
            return DataTables::of($query)->make();
        }

        return view('pages.produk.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaProduk' => 'required',
            'harga' => 'required',
            'gambar' => 'nullable|max:2048|mimes:jpg,jpeg,png,gif',
        ]);

        $data = [
            'namaProduk' => $request->namaProduk,
            'harga' => $request->harga,
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar']=$request->file('gambar')->store('produk', 'public');
        }

        Produk::create($data);

        return redirect('produk')->with('toast', 'showToast("Data berhasil disimpan")');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Produk::findOrFail($id);

        return view('pages.produk.edit', [
            'item'  =>  $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'namaProduk' => 'required',
            'harga' => 'required',
            'gambar' => 'nullable|max:2048|mimes:jpg,jpeg,png,gif',
        ]);

        $data = [
            'namaProduk' => $request->namaProduk,
            'harga' => $request->harga,
        ];

        if ($request->hasFile('gambar') && $request->file('gambar')->isValid()) {
            $path = "produk/";
            $oldfile = $path . basename($produk->gambar);
            Storage::disk('public')->delete($oldfile);
            $data['gambar'] = Storage::disk('public')->put($path, $request->file('gambar'));
        }

        $produk->update($data);

        return redirect('produk')->with('toast', 'showToast("Data berhasil diupdate")');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect()->back()->with('toast', 'showToast("Data berhasil dihapus")');
    }
}
