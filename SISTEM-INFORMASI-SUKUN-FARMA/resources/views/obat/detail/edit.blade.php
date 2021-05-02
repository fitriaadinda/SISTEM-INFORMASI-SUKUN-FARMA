@extends('layout', ['page' => 'obat'])
@section('title','Edit Detail')
@section('css')
<style>

</style>
@endsection
@section('content')
<form method="post" action="{{ url('detail/'.$detail->id) }}">
    @method('PUT')
    @csrf
    <h5 class="mb-2">Edit Detail Obat</h5>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="position-relative form-group disabled">
                <label for="nama" class="font-weight-bold">Nama Obat</label>
                <input name="nama" id="nama" type="text" placeholder="" class="form-control"
                    value="{{ $detail->obat->nama }}" disabled>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="waktu_expired" class="font-weight-bold">Expired Date</label>
                        <input name="waktu_expired" id="waktu_expired" type="date" class="form-control"
                            value="{{ $detail->waktu_expired }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="kode_batch" class="">No. Batch</label>
                        <select name="kode_batch" id="kode_batch" class="form-control">
                            @foreach ($batch as $b)
                            <option value="{{ $b->id }}" @if ($b->id == $detail->batch_id) selected @endif
                                >{{ $b->kode_batch }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="position-relative form-group">
                <label for="nama_distributor" class="">Nama Distributor</label>
                <select name="nama_distributor" id="nama_distributor" class="form-control">
                    @foreach ($distributor as $dist)
                    <option value="{{ $dist->id }}" @if ($dist->id == $detail->distributor_id) selected @endif
                        >{{ $dist->nama_distributor }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-row">
                <div class="col-md-8">
                    <div class="position-relative form-group">
                        <label for="harga_beli" class="font-weight-bold">Harga Beli</label>
                        <input name="harga_beli" id="harga_beli" placeholder="Harga Beli" type="text"
                            class="form-control" value="{{ $detail->harga_beli }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="position-relative form-group">
                        <label for="stock" class="font-weight-bold">Stock</label>
                        <input name="stock" id="stock" placeholder="Stock" type="text" class="form-control"
                            value="{{ $detail->stock }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="float-right">
        <a class="btn btn-danger" href="{{ url('obat/'.$detail->obat->id) }}">Close</a>
        <button type="submit" class="btn btn-success ">Save changes</button>
    </div>
</form>
@endsection
