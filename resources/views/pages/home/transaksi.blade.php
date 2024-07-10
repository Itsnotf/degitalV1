@extends('layouts.user')

<style>
    .list-group-item .d-flex>span:first-child {
        min-width: 150px;
        /* Adjust this width according to your needs */
    }
</style>

@section('content')
    <section class="py-4" style="height: 100vh">
        <div class="container px-4 px-lg-5 ">
            @foreach ($transaksis as $transaksi)
                <div class="card">
                    <div class="card-header d-flex justify-content-between" data-toggle="collapse"
                        data-target="#collapse-{{ $transaksi->id }}" aria-expanded="false"
                        aria-controls="collapse-{{ $transaksi->id }}" style="cursor: pointer;">
                        <div>Nota</div>
                        <div>No Transaksi: {{ $transaksi->id }}</div>
                    </div>
                    <div id="collapse-{{ $transaksi->id }}" class="collapse">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between">
                                    <div class="d-flex flex-grow-1">
                                        <b class="w-25">Status Transaksi</b>
                                        <span>:</span>
                                        <span class="ml-2">{{ $transaksi->status }}</span>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <div class="d-flex flex-grow-1">
                                        <b class="w-25">Atas Nama</b>
                                        <span>:</span>
                                        <span class="ml-2">{{ $transaksi->user->name }}</span>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <div class="d-flex flex-grow-1">
                                        <b class="w-25">Nama Produk</b>
                                        <span>:</span>
                                        <span class="ml-2">{{ $transaksi->produk->namaProduk }}</span>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <div class="d-flex flex-grow-1">
                                        <b class="w-25">Pembayaran</b>
                                        <span>:</span>
                                        <span class="ml-2">{{ $transaksi->pembayaran->nama }}</span>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <div class="d-flex flex-grow-1">
                                        <b class="w-25">Jumlah</b>
                                        <span>:</span>
                                        <span class="ml-2">{{ $transaksi->qty }}</span>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <div class="d-flex flex-grow-1">
                                        <b class="w-25">Catatan</b>
                                        <span>:</span>
                                        <span class="ml-2">{{ $transaksi->catatan }}</span>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <div class="d-flex flex-grow-1">
                                        <b class="w-25">Total Pembayaran</b>
                                        <span>:</span>
                                        <span class="ml-2">Rp {{ number_format($transaksi->qty * $transaksi->produk->harga, 0, ',', '.') }}</span>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <div class="d-flex flex-grow-1">
                                        <b class="w-25">Waktu Order</b>
                                        <span>:</span>
                                        <span class="ml-2">{{ $transaksi->created_at }}</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
@endsection
