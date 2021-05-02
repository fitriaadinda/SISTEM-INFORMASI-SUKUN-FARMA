@extends('layout', ['page' => 'kasir'])
@section('title','Invoice')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<style>

</style>
@endsection
@section('content')
<div class="card-border mb-2 card card-body border-focus">
    <div class="row">
        <div class="col-7 col-md-9">
            <span class="mx-0 font-weight-bold h5" style="border-bottom: 5px solid #495057;">Apotek Sukun Farma</span>
            <h4 class="font-weight-bold mt-4"> INVOICE </h4>
            <p style="margin-top: -8px">Nomor Invoice: 9999</p>
        </div>
        <div class="col-5 col-md-3">
            <span class="d-inline-block text-right" style="max-width: 175px;">
                Jl. S. Supriadi No.24, Sukun. Kec. Sukun, Kota Malang. Jawa Timur, 65147.
                <p>Telepon: (0341) 365277</p>
            </span>
        </div>
    </div>


    <div class="row">
        <div class="col-md-2 mt-4">
            <table class="mt-2 table table-borderless">
                <thead>
                    <tr>
                        <th>Invoice Date</th>
                    </tr>
                    <thead>
                    <tbody>
                        <tr>
                            <td>13/06/2000</td>
                        </tr>
                    </tbody>
            </table>
        </div>
        <div class="col-md-10 mt-3">
            <div class="divider"></div>
            <table class="table table-borderless">
                <thead class="thead-light">
                    <tr>
                        <th>Nama Obat</th>
                        <th>Harga Satuan</th>
                        <th>Satuan</th>
                        <th>Qty</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>Mark</td>
                        <td>Otto</td>
                    </tr>
                    <tr>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>Mark</td>
                        <td>Otto</td>
                    </tr>
                    <thead class="thead-dark">
                        <td colspan="2"></td>
                        <th colspan="2">TOTAL</th>
                        <th>67777</th>
                    </thead>
                </tbody>
            </table>
        </div>
    </div>

    <div class="text-right mt-4">
        <p class="text-right pr-5 mb-0 font-weight-bold">Apotek Sukun Farma,</p>
        <img src="{{ asset('image/paraf.jpeg') }}" class="img-images rounded float-right p-3" alt="...">
    </div>
    <p class="text-right pr-5">{{ session('nama') }}</p>

</div>
<div class="float-right mb-3">
    <a class="btn btn-success" href="{{url('/kasir')}}">Back to transaksi</a>
</div>
@endsection
