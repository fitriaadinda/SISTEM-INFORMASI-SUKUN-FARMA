@extends('layout', ['page' => 'resep'])
@section('title','Detail Resep')
@section('css')
<style>

</style>
@endsection

@section('content')
<h5 class="mb-3">Data Resep {{ $resep->nama_pasien }}</h5>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="card-border mb-5 card card-body border-warning">
    <div class="card-body">
        <div class="position-relative form-group">
            <label for="no_rekam_medis" class="font-weight-bold">No. Medis</label>
            <input name="no_rekam_medis" id="no_rekam_medis" type="text" placeholder="Masukkan No. Rekam Medis"
                class="form-control" value="{{ $resep->no_rekam_medis }}" disabled>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <div class="position-relative form-group">
                    <label for="nama_pasien" class="font-weight-bold">Nama Pasien</label>
                    <input name="nama_pasien" id="nama_pasien" type="text" placeholder="Masukkan Nama Pasien"
                        class="form-control" value="{{ $resep->nama_pasien }}" disabled>
                </div>
            </div>
            <div class="col-md-6">
                <div class="position-relative form-group">
                    <label for="no_telepon" class="font-weight-bold">No. Telepon</label>
                    <input name="no_telepon" id="no_telepon" type="text" placeholder="Masukkan No.Telepon"
                        class="form-control" value="{{ $resep->no_telepon }}" disabled>
                </div>
            </div>
        </div>
        <div class="position-relative form-group">
            <label for="alamat" class="font-weight-bold">Alamat</label>
            <textarea name="alamat" id="alamat" type="text" placeholder="Masukkan Alamat" class="form-control"
                value="" disabled>{{ $resep->alamat_pasien }}</textarea>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <div class="position-relative form-group">
                    <label for="nama_dokter" class="font-weight-bold">Nama Dokter</label>
                    <input name="nama_dokter" id="nama_dokter" type="text" placeholder="Masukkan Nama Dokter"
                        class="form-control" value="{{ $resep->nama_dokter }}" disabled>
                </div>
            </div>
            <div class="col-md-6">
                <div class="position-relative form-group">
                    <label for="nama_klinik" class="font-weight-bold">Nama Klinik</label>
                    <input name="nama_klinik" id="nama_klinik" type="text" placeholder="Masukkan Nama Klinik"
                        class="form-control" value="{{ $resep->nama_klinik }}" disabled>
                </div>
            </div>
        </div>
        <a class="btn-transition btn btn-success btn-sm float-right mt-2"
            href="{{ url('resep/'.$resep->id.'/edit') }}">Edit Data
            Pasien</a>
    </div>
</div>

<!-- Data Obat -->
<div class="row">
    <div class="col-md-6">
        <h5>Data Obat Resep</h5>
    </div>
    <div class="col-md-6">
        <button class="mb-3 mr-2 btn btn-primary float-right" data-toggle="modal" data-target="#tambahData">Tambah
            Data</button>
    </div>
</div>
<div class="main-card mb-5 card">
    <div class="card-body">
        <table class="mb-0 table table-sm table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Obat</th>
                    <th>Satuan</th>
                    <th>Qty</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($resep->obat as $key => $r)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $r->nama }}</td>
                    <td>{{ $r->pivot->satuanObat->nama }}</td>
                    <td>{{ $r->pivot->qty }}</td>
                    <td>
                        <button class="mb-1 btn-transition btn btn-outline-dark btn-sm" data-toggle="modal"
                            data-target="#editData-{{$r->id}}">Edit</button>
                        <form method="post" action="{{ url('resep/'.$resep->id.'/obat/'.$r->id) }}"
                            style="display: inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit"
                                class="mb-1 btn-transition btn btn-outline-dark btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Data Riwayat Pengambilan Resep -->
<div class="row">
    <div class="col-md-6">
        <h5>Data Riwayat Pengambilan Resep</h5>
    </div>
</div>
<div class="main-card mb-5 card">
    <div class="card-body">
        <table class="mb-0 table table-sm table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Obat</th>
                    <th>Satuan</th>
                    <th>Qty</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Paracetamol</td>
                    <td>Tablet</td>
                    <td>10</td>
                    <td>
                        <button class="mb-1 btn-transition btn btn-outline-dark btn-sm" data-toggle="modal"
                            data-target="#editData">Edit</button>
                        <form method="" action="" style="display: inline">
                            @csrf
                            <button type="submit"
                                class="mb-1 btn-transition btn btn-outline-dark btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('modal')
<!-- Tambah Obat -->
<div class="modal fade bd-example-modal-lg" id="tambahData" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="title-title" id="exampleModalLabel">Tambah Data Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" method="post" action="{{url('resep/'.$resep->id.'/obat')}}">
                    @csrf
                    <div class="position-relative form-group">
                        <label for="nama" class="font-weight-bold">Obat</label>
                        <select name="nama" id="nama" class="form-control">
                            <option value="selected disabled">-- Pilih --</option>
                            @foreach ($obat as $o)
                            <option value="{{ $o->id }}">{{ $o->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="satuan" class="font-weight-bold">Satuan</label>
                                <select name="satuan" id="satuan" class="form-control">
                                    <option value="selected disabled">-- Pilih --</option>
                                    @foreach ($satuan as $s)
                                    <option value="{{ $s->id }}">{{ $s->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="qty" class="font-weight-bold">QTY</label>
                                <input name="qty" id="qty" type="text" placeholder="Masukkan Jumlah"
                                    class="form-control" value="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Obat -->
@foreach ($resep->obat as $key => $obat)
<div class="modal fade bd-example-modal-lg" id="editData-{{$obat->id}}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="title-title" id="exampleModalLabel">Edit Data Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="" method="post" action="{{ url('resep/'.$resep->id.'/obat/'.$obat->id.'/edit') }}">
                    @method('PUT')
                        @csrf
                        <div class="position-relative form-group">
                            <label for="nama" class="font-weight-bold">Obat</label>
                            <input name="nama" id="nama" type="text" placeholder="Masukkan Nama Pasien"
                                        class="form-control" value="{{ $obat->nama }}" disabled>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="satuan" class="">Satuan</label>
                                    <select name="satuan" id="satuan" class="form-control">
                                        @foreach ($satuan as $s)
                                        <option value="{{ $s->id }}" @if ($s->id == $resep->satuan_obat_id) selected @endif
                                            >{{ $s->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="qty" class="font-weight-bold">QTY</label>
                                    <input name="qty" id="qty" type="text" placeholder="Masukkan Nama Pasien"
                                        class="form-control" value="{{ $obat->pivot->qty }}">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
