@extends('layout', ['page' => 'resep'])
@section('title','Edit Resep')
@section('css')
<style>

</style>
@endsection
@section('content')
<form method="post" action="{{ url('resep/'.$resep->id) }}">
@method('PUT')
    @csrf
    <h5 class="mb-2">Edit Data Resep</h5>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card-border mb-2 card card-body border-warning">
        <div class="card-body">
            <div class="position-relative form-group">
                <label for="no_rekam_medis" class="font-weight-bold">No. Medis</label>
                <input name="no_rekam_medis" id="no_rekam_medis" type="text" placeholder="Masukkan No. Rekam Medis"
                    class="form-control" value="{{ $resep->no_rekam_medis }}">
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="nama_pasien" class="font-weight-bold">Nama Pasien</label>
                        <input name="nama_pasien" id="nama_pasien" type="text" placeholder="Masukkan Nama Pasien"
                            class="form-control" value="{{ $resep->nama_pasien }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="no_telepon" class="font-weight-bold">No. Telepon</label>
                        <input name="no_telepon" id="no_telepon" type="text" placeholder="Masukkan No.Telepon"
                            class="form-control" value="{{ $resep->no_telepon }}">
                    </div>
                </div>
            </div>
            <div class="position-relative form-group">
                <label for="alamat" class="font-weight-bold">Alamat</label>
                <textarea name="alamat" id="alamat" type="text" placeholder="Masukkan Alamat"
                    class="form-control" value="">{{ $resep->alamat_pasien }}</textarea>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="nama_dokter" class="font-weight-bold">Nama Dokter</label>
                        <input name="nama_dokter" id="nama_dokter" type="text" placeholder="Masukkan Nama Dokter"
                            class="form-control" value="{{ $resep->nama_dokter }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="nama_klinik" class="font-weight-bold">Nama Klinik</label>
                        <input name="nama_klinik" id="nama_klinik" type="text" placeholder="Masukkan Nama Klinik"
                            class="form-control" value="{{ $resep->nama_klinik }}">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="float-right">
        <a class="btn btn-danger" href="{{ url('resep') }}">Close</a>
        <button type="submit" class="btn btn-success ">Save changes</button>
    </div>
</form>
@endsection

