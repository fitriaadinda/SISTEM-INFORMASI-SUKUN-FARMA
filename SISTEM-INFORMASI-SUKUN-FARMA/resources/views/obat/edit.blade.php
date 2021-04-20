@extends('layout', ['page' => 'obat'])
@section('title','Edit Obat')
@section('css')
<style>
    
</style>
@endsection
@section('content')
<form action="{{ url('obat/'.$obat->id) }}" method="POST">
@method('PUT')
@csrf
    <h5 class="mb-2">Edit Data Obat</h5>
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
            <div class="position-relative form-group">
                <label for="kode_obat" class="font-weight-bold">Kode Obat</label>
                <input name="kode_obat" id="kode_obat" type="text" placeholder="Kode Obat" class="form-control" value="{{ $obat->kode_obat }}">
            </div>
            <div class="position-relative form-group">
                <label for="nama" class="font-weight-bold">Nama Obat</label>
                <input name="nama" id="nama" type="text" placeholder="Nama Obat" class="form-control" value="{{ $obat->nama }}">
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="harga_jual" class="font-weight-bold">Harga Jual</label>
                        <input name="harga_jual" id="harga_jual" placeholder="Harga Jual" type="text"
                            class="form-control" value="{{ $obat->harga_jual }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="kategori" class="">Kategori</label>
                        <select name="kategori" id="kategori" class="form-control">
                            @foreach ($kategori as $k)
                                <option 
                                    value="{{ $k->id }}"
                                    @if ($k->id == $obat->kategori_id) selected @endif
                                >{{ $k->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="float-right">
        <a class="btn btn-danger" href="{{ url('obat') }}">Close</a>
        <button type="submit" class="btn btn-success ">Save changes</button>
    </div>
</form>
@endsection
