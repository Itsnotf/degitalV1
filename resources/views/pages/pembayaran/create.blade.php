@extends('layouts.app')

@section('title', 'Buat Pembayaran')
@section('desc', ' Dihalaman ini anda bisa membuat pembayaran. ')

@section('content')
<form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Buat Pembayaran</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nama" class="col-sm-3 col-form-label">Nama  </label>
                        <div class="col-sm-9">
                            <input value="{{ old('nama') }}" type="text"
                                class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama"
                                placeholder="Nama Produk">
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nomer" class="col-sm-3 col-form-label">Nomer</label>
                        <div class="col-sm-9">
                            <input value="{{ old('nomer') }}" type="number"
                                class="form-control @error('nomer') is-invalid @enderror" name="nomer" id="nomer"
                                placeholder="Nomer ">
                            @error('nomer')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="an" class="col-sm-3 col-form-label">Atas Nama</label>
                        <div class="col-sm-9">
                            <input value="{{ old('an') }}" type="text"
                                class="form-control @error('an') is-invalid @enderror" name="an" id="an"
                                placeholder="Atas Nama ">
                            @error('an')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenis" class="col-sm-3 col-form-label">Jenis</label>
                        <div class="col-sm-9">
                            <select class="form-control @error('jenis') is-invalid @enderror" name="jenis" id="jenis">
                                <option value="BANK" {{ old('jenis') == 'BANK' ? 'selected' : '' }}>BANK</option>
                                <option value="E-Wallet" {{ old('jenis') == 'E-Wallet' ? 'selected' : '' }}>E-Wallet</option>
                                <option value="Tunai" {{ old('jenis') == 'Tunai' ? 'selected' : '' }}>Tunai</option>
                            </select>
                            @error('jenis')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>

    </div>
</form>
@endsection
