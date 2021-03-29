@extends('layout')
@section('title','List Obat')
@section('css')
<style>

</style>
@endsection
@section('content')
<h2 class="mb-5">DATA OBAT</h2>
<div class="row">
    <div class="col-lg-6">
        <button class="mb-3 mr-2 w-50 btn btn-primary">Tambah Data Obat</button>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Kelola Data Obat</h5>
        <table class="mb-0 table table-sm table-hover">
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
                <tr>
                    <th scope="row">PRMX2567</th>
                    <td>Paramex hvdrdeesxdhgy</td>
                    <td>Kapsul</td>
                    <td>Rp. 3000</td>
                    <td>
                        <button class="mb-2 mr-2 btn-transition btn btn-outline-dark">Detail</button>
                        <button class="mb-2 mr-2 btn-transition btn btn-outline-dark">Edit</button>
                        <button class="mb-2 mr-2 btn-transition btn btn-outline-dark">Delete</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">PRMX2567</th>
                    <td>Paramex</td>
                    <td>Kapsul</td>
                    <td>Rp. 3000</td>
                    <td>
                        <button class="mb-2 mr-2 btn-transition btn btn-outline-dark">Detail</button>
                        <button class="mb-2 mr-2 btn-transition btn btn-outline-dark">Edit</button>
                        <button class="mb-2 mr-2 btn-transition btn btn-outline-dark">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('js')