@extends('layouts.user')

@section('content')
    <section class="py-4" style="height: 100vh;">
        <div class="container px-4 px-lg-5 ">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-start">
                @foreach ($produks as $produk)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img style="height: 50%; object-fit: cover" class="card-img-top"
                                src="{{ asset('storage/' . $produk->gambar) }}" alt="...">

                            <!-- Product details-->
                            <div class="card-body d-flex justify-content-center align-items-center  ">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $produk->namaProduk }}</h5>
                                    <!-- Product price-->
                                    {{ 'Rp ' . number_format($produk->harga, 0, ',', '.') }}
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class=" p-4 pt-0 border-top-0 bg-transparent">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#cekoutmodal"
                                    class="w-100 h-100 btn btn-outline-dark mt-auto">Cekout
                                    Sekarang</button>
                            </div>
                        </div>
                    </div>



                    <!-- Modal -->
                    <div class="modal fade" id="cekoutmodal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Form -->
                                <form action="{{ route('cekout') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id_produk" value="{{ $produk->id }}">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Display errors -->
                                        @if ($errors->any())
                                            <div class="alert alert-danger" role="alert">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <!-- Form Group for Quantity -->
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="qty" class="col-form-label">Jumlah</label>
                                                <input value="{{ old('qty') }}" type="number"
                                                    class="form-control @error('qty') is-invalid @enderror" name="qty"
                                                    id="qty" placeholder="Masukan Jumlah Barang">
                                                @error('qty')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>


                                        <input value="Belum selesai" type="text" class="form-control" name="status"
                                            id="status" hidden>

                                        <!-- Form Group for Catatan -->
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="catatan" class="col-form-label">Catatan</label>
                                                <input value="{{ old('catatan') }}" type="text"
                                                    class="form-control @error('catatan') is-invalid @enderror"
                                                    name="catatan" id="catatan" placeholder="Berikan Kami Catatan">
                                                @error('catatan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="id_pembayaran" class="col-form-label">Pembayaran</label>
                                            <div class="col-sm-12">
                                                <select
                                                    class="form-control mb-2 @error('id_pembayaran') is-invalid @enderror"
                                                    name="id_pembayaran" id="id_pembayaran" onchange="updateBukti()">
                                                    @foreach ($pembayarans as $pembayaran)
                                                        <option value="{{ $pembayaran->id }}"
                                                            data-nomer="{{ $pembayaran->nomer }}"
                                                            {{ old('id_pembayaran') == $pembayaran->id ? 'selected' : '' }}>
                                                            {{ $pembayaran->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="">Nomer Transaksi</label>
                                                <input type="number"
                                                    class="form-control @error('bukti') is-invalid @enderror" id="bukti"
                                                    disabled>
                                                @error('id_pembayaran')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="bukti" class="col-form-label">Bukti Pembayaran</label>
                                                <input type="file"
                                                    class="form-control @error('bukti') is-invalid @enderror" name="bukti"
                                                    id="bukti">
                                                @error('bukti')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <script>
        function updateBukti() {
            var pembayaranSelect = document.getElementById('id_pembayaran');
            var selectedOption = pembayaranSelect.options[pembayaranSelect.selectedIndex];
            var nomer = selectedOption.getAttribute('data-nomer');
            document.getElementById('bukti').value = nomer;
        }

        // Call updateBukti on page load to set the initial value
        document.addEventListener('DOMContentLoaded', function() {
            updateBukti();
        });
    </script>
@endsection
