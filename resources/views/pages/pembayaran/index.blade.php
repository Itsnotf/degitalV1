@extends('layouts.app')

@section('title', 'Kelola Pembayaran')
@section('desc', ' Dihalaman ini anda bisa kelola pembayaran. ')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>List Pembayaran</h4>
        <div class="card-header-action">
            <a href="{{ route('pembayaran.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i>
                Tambah
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped w-100" id="datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Nomer</th>
                        <th>Atas Nama</th>
                        <th>Jenis</th>
                        <th>Aksi</th>
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
            columns: [
                {data: 'id', name: 'id'},
                {data: 'nama', name: 'nama'},
                {data: 'nomer', name: 'nomer'},
                {data: 'an', name: 'an'},
                {data: 'jenis', name: 'jenis'},
                {data: 'aksi', name: 'aksi'},
            ],
            columnDefs: [{
                "targets": -1,
                "render": function(data, type, row, meta) {
                    return `
                        <form action="{{ url('/pembayaran') }}/${row.id}" method="POST" class="d-flex">
                            @method('DELETE')
                            @csrf
                            <a
                                href="{{ url('/pembayaran') }}/${row.id}/edit"
                                class="btn btn-sm btn-warning mr-2"
                            >
                                Edit
                            </a>
                            <button
                                type="submit"
                                class="btn-delete btn btn-sm btn-danger"
                            >
                                Delete
                            </button>
                        </form>
                    `;
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
