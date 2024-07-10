@extends('layouts.app')

@section('title', 'Dashboard')
@section('desc', 'Halaman Dashboard.')

@section('content')
    @can('admin')
        <div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total User</h4>
                            </div>
                            <div class="card-body">
                                {{ App\Models\User::whereNot('role', 'admin')->count() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Produk</h4>
                            </div>
                            <div class="card-body">
                                {{ App\Models\Produk::count() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Transaksi</h4>
                            </div>
                            <div class="card-body">
                                {{ App\Models\Transaksi::count() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped w-100" id="datatable">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Pembeli</th>
                            <th class="text-center">Produk</th>
                            <th class="text-center">Pembayaran</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksis as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $item->user->name }}</td>
                                <td class="text-center">{{ $item->produk->namaProduk }}</td>
                                <td class="text-center">{{ $item->pembayaran->nama }}</td>
                                <td class="text-center">{{ $item->qty }}</td>
                                <td class="text-center">Rp {{ number_format($item->qty * $item->produk->harga, 0, ',', '.') }}</td>
                                <td class="text-center">{{ $item->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endcan

    @can('user')
        //
    @endcan
@endsection
