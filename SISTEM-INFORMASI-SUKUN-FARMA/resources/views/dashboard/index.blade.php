@extends('layout', ['page' => 'dashboard'])
@section('title','Dashboard')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<style>

</style>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-6 col-xl-4">
        <div class="card-border mb-3 card card-body bg-primary widget-content">
            <div class="widget-content-wrapper">
                <div class="widget-content-left">
                    <div class="widget-heading text-white">Penjualan Mingguan</div>
                    <div class="widget-subheading text-white">Total Penjualan minggu ini</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-success"><span>1896</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-xl-4">
        <div class="card-border mb-3 card card-body bg-warning widget-content">
            <div class="widget-content-wrapper">
                <div class="widget-content-left">
                    <div class="widget-heading text-white">Penjualan Bulanan</div>
                    <div class="widget-subheading text-white">Total Penjualan bulan ini</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-primary"><span>568</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-xl-4">
        <div class="card-border mb-3 card card-body bg-success widget-content">
            <div class="widget-content-wrapper">
                <div class="widget-content-left">
                    <div class="widget-heading text-white">Penjualan Tahunan</div>
                    <div class="widget-subheading text-white">Total Penjualan tahun ini</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-warning"><span>14000</span></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-card mb-4 card">
    <div class="no-gutters row">
        <div class="col-md-4 border-right">
            <div class="pt-0 pb-0 card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="widget-content p-0">
                            <div class="widget-content-outer">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Total produk yang akan kadaluawarsa</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-success">5</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="widget-content p-0">
                            <div class="widget-content-outer">
                                <div class="row mb-2">
                                    <div class="col-10">akan kadaluwarsa Bulan ini
                                    </div>
                                    <div class="col-2">
                                        <span class=" badge badge-pill badge-warning">2</span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-10">kadaluwarsa 3 Bulan kedepan
                                    </div>
                                    <div class="col-2">
                                        <span class=" badge badge-pill badge-danger">2</span>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content-wrapper">
                                <table class="mb-0 table table-sm table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Obat</th>
                                            <th>Nama Obat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>PRCTML776</td>
                                            <td>Paracetamol</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-4 border-right">
            <div class="pt-0 pb-0 card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="widget-content p-0">
                            <div class="widget-content-outer">
                                <div class="widget-content-wrapper mb-3">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Stok Minimal</div>
                                        <div class="widget-subheading">stok tinggal 15</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-danger">2</div>
                                    </div>
                                </div>
                                <div class="widget-content-wrapper">
                                    <table class="mb-0 table table-sm table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Obat</th>
                                                <th>Nama Obat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>PRCTML776</td>
                                                <td>Paracetamol</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="widget-content p-0">
                            <div class="widget-content-outer">
                                <div class="widget-content-wrapper mb-3">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Stok Habis</div>
                                        <div class="widget-subheading">stoknya habis</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-warning">0</div>
                                    </div>
                                </div>
                                <div class="widget-content-wrapper">
                                    <table class="mb-0 table table-sm table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Obat</th>
                                                <th>Nama Obat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>PRCTML776</td>
                                                <td>Paracetamol</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-4">
            <div class="pt-0 pb-0 card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="widget-content p-0">
                            <div class="widget-content-outer">
                                <div class="widget-content-wrapper mb-3">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Total Karyawan</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-primary">10</div>
                                    </div>
                                </div>
                                <div class="widget-content-wrapper">
                                    <table class="mb-0 table table-sm table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>No. Telepon</th>
                                                <th>Role</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Dindaaa</td>
                                                <td>082233669635</td>
                                                <td>Kasir</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
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
