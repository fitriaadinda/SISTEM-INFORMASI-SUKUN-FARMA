@extends('layout', ['page' => 'obat'])
@section('title','Tambah Detail')
@section('css')
<style>
    
</style>
@endsection
@section('content')
<form method="post" action="{{ url('obat/'.$obat->id.'/detail') }}">
    @csrf
    <h5 class="mb-2">Tambah Detail Obat</h5>
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
                <input name="nama" id="nama" type="text" placeholder="" class="form-control" value="{{$obat->nama}}" disabled>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="waktu_expired" class="font-weight-bold">Expired Date</label>
                        <input name="waktu_expired" id="waktu_expired" type="date" class="form-control" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="kode_batch" class="">No. Batch</label>
                        <select name="kode_batch" id="kode_batch" class="form-control">
                        @foreach ($obat->batchObat as $key => $batch)
                                <option value="{{$batch->id}}">{{$batch->kode_batch}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-8">
                    <div class="position-relative form-group">
                        <label for="harga_beli" class="font-weight-bold">Harga Beli</label>
                        <input name="harga_beli" id="harga_beli" placeholder="Harga Beli" type="text"
                            class="form-control" value="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="position-relative form-group">
                        <label for="stock" class="font-weight-bold">Stock</label>
                        <input name="stock" id="stock" placeholder="Stock" type="text" class="form-control" value="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- -->
    <div class="float-right">
        <a class="btn btn-danger" href="{{ url('obat/'.$obat->id) }}">Close</a>
        <button type="submit" class="btn btn-success ">Save changes</button>
    </div>
</form>
@endsection
