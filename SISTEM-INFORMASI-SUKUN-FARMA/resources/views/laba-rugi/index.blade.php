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
<div class="card-border mb-2 card card-body border-focus">
    <div class="text-center">
        <span>Apotek Sukun Farma</span>
        <p class="font-weight-bold"> Laporan Laba Rugi </p>
        <p style="margin-top: -15px">Periode April 2021</p>
        <div class="divider mt-3" style="border: 1px solid"></div>
    </div>

    <div class="mb-3">
        <span class="font-weight-bold">Pendapatan: </span>
        <div class="row">
            <div class="col-md-6">
                <div class="pl-5">
                    Beban Gaji
                </div>
            </div>
            <div class="col-md-6 text-right font-weight-bold">
                20000
            </div>
        </div>
    </div>

    <div class="mb-3">
        <span class="font-weight-bold">Beban: </span>
        <div class="row">
            <div class="col-md-6">
                <div class="pl-5">
                    Beban Gaji
                </div>
            </div>
            <div class="col-md-6">
                20000
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="pl-5">
                    Beban Listrik
                </div>
            </div>
            <div class="col-md-6">
                20000
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="pl-5">
                    Beban Lain-lain
                </div>
            </div>
            <div class="col-md-6">
                <span style="border-bottom: 3px solid #495057;">20000</span>
            </div>
        </div>
        <div class="row pl-5">
            <div class="col-md-9">
                <div class="font-weight-bold">
                    Total Beban
                </div>
            </div>
            <div class="col-md-3 text-right font-weight-bold" style="border-bottom: 3px solid #495057;">
                (00000)
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 font-weight-bold">
            Laba/Rugi Kotor
        </div>
        <div class="col-md-6 text-right font-weight-bold">
            20000
        </div>
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
