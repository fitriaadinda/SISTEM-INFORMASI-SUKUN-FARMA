@extends('layout', ['page' => 'resep'])
@section('title','List Resep')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<style>

</style>
@endsection
@section('content')
<h2 class="mb-5">DATA RESEP</h2>
<div class="row">
    <div class="col-lg-6">
        <a href="{{ url('resep/create') }}" class="mb-3 mr-2 w-50 btn btn-primary">Tambah Data Resep</a>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Kelola Data Resep</h5>
        <table id="data-resep" class="mb-0 table table-sm table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>No. Medis</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Nama Dokter</th>
                    <th>Nama Klinik</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($resep as $r)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $r->no_rekam_medis}}</td>
                    <td>{{ $r->nama_pasien }}</td>
                    <td>{{ $r->alamat_pasien }}</td>
                    <td>{{ $r->no_telepon }}</td>
                    <td>{{ $r->nama_dokter }}</td>
                    <td>{{ $r->nama_klinik }}</td>
                    <td>
                        <a class="mb-1 btn-transition btn btn-outline-dark btn-sm"
                            href="{{ url('resep/'.$r->id) }}">Detail</a>
                        <form method="post" action="{{ url('resep/'.$r->id) }}" style="display: inline">
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
        $('#data-resep').DataTable();
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
