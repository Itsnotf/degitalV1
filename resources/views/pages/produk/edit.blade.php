@extends('layouts.app')

@section('title', 'Edit Produk')
@section('desc', ' Dihalaman ini anda bisa edit produk. ')

@section('content')
<form action="{{ route('produk.update', $item->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Produk</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="namaProduk" class="col-sm-3 col-form-label">Nama Produk</label>
                        <div class="col-sm-9">
                            <input value="{{ old('namaProduk', $item->namaProduk) }}" type="text"
                                class="form-control @error('namaProduk') is-invalid @enderror" name="namaProduk" id="namaProduk"
                                placeholder="Nama Produk">
                            @error('namaProduk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga" class="col-sm-3 col-form-label">Harga Produk</label>
                        <div class="col-sm-9">
                            <input value="{{ old('harga', $item->harga) }}" type="number"
                                class="form-control @error('harga') is-invalid @enderror" name="harga" id="harga"
                                placeholder="Harga Produk">
                            @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h4>Gambar Produk</h4>
                </div>
                <div class="card-body">
                    @if($item->gambar)
                    <img alt="gambar" src="{{ asset('storage') }}/{{ $item->gambar }}"
                        class="rounded-circle w-100 mb-3">
                    @else
                    <img alt="avatar" src="{{ asset('/assets/img/avatar/avatar-1.png') }}"
                        class="rounded-circle w-100 mb-3">
                    @endif
                    <div class="clearfix"></div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="gambar" name="gambar">
                        <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
