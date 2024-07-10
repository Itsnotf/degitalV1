@extends('layouts.app')

@section('title', 'Kelola Transaksi')
@section('desc', ' Dihalaman ini anda bisa kelola transaksi. ')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>List Transaksi</h4>
            {{-- <div class="card-header-action">
            <a href="{{ route('transaksi.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i>
                Tambah
            </a>
        </div> --}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped w-100" id="datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Bukti Pembayaran</th>
                            <th>Pembeli</th>
                            <th>Produk</th>
                            <th>Pembayaran</th>
                            <th>Jumlah</th>
                            <th>Catatan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            var datatable = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ordering: true,
                ajax: {
                    url: "{!! url()->current() !!}"
                },
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, 'ALL']
                ],
                responsive: true,
                order: [
                    [0, 'desc'],
                ],
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'bukti',
                        name: 'bukti'
                    },
                    {
                        data: 'user',
                        name: 'user'
                    },
                    {
                        data: 'produk',
                        name: 'produk'
                    },
                    {
                        data: 'pembayaran',
                        name: 'pembayaran'
                    },
                    {
                        data: 'qty',
                        name: 'qty'
                    },
                    {
                        data: 'catatan',
                        name: 'catatan'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        render: function(data, type, row, meta) {
                            if (data === 'Belum selesai') {
                                return `
                                <form method="POST" action="{{ route('transaksi.updateStatus', '') }}/${row.id}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="Selesai">
                                    <button type="submit" class="btn btn-primary">${data}</button>
                                </form>
                            `;
                            } else if (data === 'Selesai') {
                                return `<span class="badge badge-success">${data}</span>`;
                            }
                            return data;
                        }


                    },
                ],
                columnDefs: [{
                    "targets": 1,
                    "render": function(data, type, row, meta) {
                        let img = `assets/img/avatar/avatar-1.png`;
                        if (data) {
                            img = `storage/${data}`;
                        }

                        let fullImgPath = `{{ asset('/') }}${img}`;

                        return `<a href="${fullImgPath}" target="_blank">
                                <img alt="avatar" src="${fullImgPath}" class="" width="35">
                            </a>`;
                    }
                }],
                rowId: function(a) {
                    return a;
                },
                rowCallback: function(row, data, iDisplayIndex) {
                    var info = this.fnPagingInfo();
                    var page = info.iPage;
                    var length = info.iLength;
                    var index = page * length + (iDisplayIndex + 1);
                    $('td:eq(0)', row).html(index);
                },
            });
        });
    </script>
@endpush()
