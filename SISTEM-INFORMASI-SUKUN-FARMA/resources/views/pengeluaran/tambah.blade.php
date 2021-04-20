@extends('layout', ['page' => 'pengeluaran'])
@section('title','Tambah Pengeluaran')
@section('css')
<style>
    .btn-aksi {
        font-size: 12px;
        padding: 5px;
    }

</style>
@endsection
@section('content')
<form method="post" action="{{ url('pengeluaran') }}">
@csrf
    <h5 class="mb-3">Tambah Data Pengeluaran</h5>
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
            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="jenis_pengeluaran" class="font-weight-bold">jenis Pengeluaran</label>
                        <select name="jenis_pengeluaran" id="jenis_pengeluaran" class="form-control">
                            <option value="selected disabled">-- Pilih --</option>
                            @foreach ($jenis as $j)
                                <option value="{{ $j->id }}">{{ $j->jenis_pengeluaran }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="waktu_pengeluaran" class="font-weight-bold">Waktu Pengeluaran</label>
                        <input name="waktu_pengeluaran" id="waktu_pengeluaran" type="date" placeholder="Masukkan Waktu Pengeluaran" class="form-control" value="">
                    </div>
                </div>
            </div>
            <div class="position-relative form-group">
                <label for="jumlah" class="font-weight-bold">Jumlah</label>
                <input name="jumlah" id="jumlah" type="text" placeholder="Masukkan Jumlah" class="form-control" value="">
            </div>
            <div class="position-relative form-group">
                <label for="keterangan" class="font-weight-bold">Keterangan</label>
                <textarea name="keterangan" id="keterangan" type="text" placeholder="Masukkan Keterangan" class="form-control" value="Gaji karyawan bulan januari"></textarea>
            </div>
        </div>
    </div>
    <div class="float-right">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success ">Save changes</button>
    </div>
</form>
@endsection
