@extends('layout', ['page' => 'riwayat_penjualan'])
@section('title','List Penjualan')
@section('css')
<style>
    .btn-aksi {
        font-size: 12px;
        padding: 5px;
    }

</style>
@endsection
@section('content')
<h2 class="mb-5">Riwayat Penjualan</h2>
<div class="main-card mb-3 card">
    <div class="card-body">
        <label for="tanggal_transaksi" class="font-weight-bold mb-3">Tanggal:&nbsp; </label>
        <input name="tanggal_transaksi" id="tanggal_transaksi" type="date" value="">
        <table id="data-penjualan" class="mb-0 table table-sm table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Transaksi</th>
                    <th>Tanggal</th>
                    <th>Kasir</th>
                    <th>Obat</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
@endsection


@section('js')
<script>
    $(document).ready(function () {
        $('#data-penjualan').DataTable();
    });

</script>

@if (session('success_message'))
<script>
    Swal.fire({
        title: 'Berhasil!',
        text: '{{ session('
        success_message ') }}',
        icon: 'success',
    })

</script>
@endif

@if (session('error_message'))
<script>
    Swal.fire({
        title: 'Gagal!',
        text: '{{ session('
        error_message ') }}',
        icon: 'error',
    })

</script>
@endif
@endsection
