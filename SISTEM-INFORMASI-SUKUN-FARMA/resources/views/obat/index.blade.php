@extends('layout', ['page' => 'obat'])
@section('title','List Obat')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<style>

</style>
@endsection
@section('content')
<h2 class="mb-5">DATA OBAT</h2>
<div class="row">
    <div class="col-lg-6">
        <a href="{{ url('obat/create') }}" class="mb-3 mr-2 w-50 btn btn-primary">Tambah Data Obat</a>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Kelola Data Obat</h5>
        <table id="data-obat" class="mb-0 table table-sm table-hover">
            <thead>
                <tr>
                    <th>Kode Obat</th>
                    <th>Nama Obat</th>
                    <th>Kategori</th>
                    <th>Harga Jual</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($obat as $o)
                <tr>
                    <th scope="row">{{ $o->kode_obat }}</th>
                    <td>{{ $o->nama }}</td>
                    <td>{{ $o->kategori->nama }}</td>
                    <td>{{ $o->harga_jual }}</td>
                    <td>
                        <a class="mb-1 btn-transition btn btn-outline-dark btn-sm"
                            href="{{ url('obat/'.$o->id) }}">Detail</a>
                        <a class="mb-1 btn-transition btn btn-outline-dark btn-sm"
                            href="{{ url('obat/'.$o->id.'/edit') }}">Edit</a>
                        <form method="post" action="{{('obat/'.$o->id)}}" style="display: inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit"
                                class="mb-1 btn-transition btn btn-outline-dark btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('#data-obat').DataTable();
    });

</script>
@if (session('success_message'))
<script>
    Swal.fire({
        title: 'Berhasil!',
        text: '{{ session('success_message') }}',
        icon: 'success',
    })

</script>
@endif

@if (session('error_message'))
<script>
    Swal.fire({
        title: 'Gagal!',
        text: '{{ session('error_message') }}',
        icon: 'error',
    })

</script>
@endif
@endsection
