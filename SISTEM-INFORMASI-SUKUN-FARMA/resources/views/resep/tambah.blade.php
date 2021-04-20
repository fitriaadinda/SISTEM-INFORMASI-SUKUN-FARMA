@extends('layout', ['page' => 'resep'])
@section('title','Tambah Resep')
@section('css')
<style>

</style>
@endsection
@section('content')
<form method="post" action="{{ url('resep') }}">
    @csrf
    <h5 class="mb-2">Tambah Data Resep</h5>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card-border mb-3 card card-body border-warning">
        <div class="card-body">
            <div class="position-relative form-group">
                <label for="no_rekam_medis" class="font-weight-bold">No. Medis</label>
                <input name="no_rekam_medis" id="no_rekam_medis" type="text" placeholder="Masukkan No. Rekam Medis"
                    class="form-control" value="">
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="nama_pasien" class="font-weight-bold">Nama Pasien</label>
                        <input name="nama_pasien" id="nama_pasien" type="text" placeholder="Masukkan Nama Pasien"
                            class="form-control" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="no_telepon" class="font-weight-bold">No. Telepon</label>
                        <input name="no_telepon" id="no_telepon" type="text" placeholder="Masukkan No.Telepon"
                            class="form-control" value="">
                    </div>
                </div>
            </div>
            <div class="position-relative form-group">
                <label for="alamat" class="font-weight-bold">Alamat</label>
                <textarea name="alamat" id="alamat" type="text" placeholder="Masukkan Alamat" class="form-control"
                    value=""></textarea>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="nama_dokter" class="font-weight-bold">Nama Dokter</label>
                        <input name="nama_dokter" id="nama_dokter" type="text" placeholder="Masukkan Nama Dokter"
                            class="form-control" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="nama_klinik" class="font-weight-bold">Nama Klinik</label>
                        <input name="nama_klinik" id="nama_klinik" type="text" placeholder="Masukkan Nama Klinik (Jika Ada)"
                            class="form-control" value="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-obat-wrapper">
        <div class="main-card mb-3 card form-obat-content">
            <div class="card-body">
                <div class="position-relative form-group">
                    <label for="nama" class="font-weight-bold">Obat</label>
                    <select name="nama[]" id="nama" class="form-control">
                        <option value="selected disable">-- Pilih --</option>
                        @foreach ($obat as $o)
                        <option value="{{ $o->id }}">{{ $o->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="satuan" class="font-weight-bold">Satuan</label>
                            <select name="satuan[]" id="satuan" class="form-control">
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
                            <input name="qty[]" id="qty" type="text" placeholder="Masukkan Jumlah" class="form-control"
                                value="">
                        </div>
                    </div>
                </div>
                <div class="float-right">
                    <button type="button" id="tambah" class="btn btn-success btn-tambah-obat">Tambah</button>
                </div>
            </div>
        </div>
    </div>

    <div class="float-right mb-3">
        <a class="btn btn-danger" href="{{ url('resep') }}">Close</a>
        <button type="submit" class="btn btn-success ">Save changes</button>
    </div>
</form>
@endsection
@section('js')
<script>
    const obatWrapper = $('.form-obat-wrapper');
    
    obatWrapper.on('click', '.btn-tambah-obat', function () {
        const html = `<div class="main-card mb-3 card form-obat-content">
            <div class="card-body">
                <div class="position-relative form-group">
                    <label for="nama" class="font-weight-bold">Obat</label>
                    <select name="nama[]" id="nama" class="form-control">
                        <option value="selected disable">-- Pilih --</option>
                        @foreach ($obat as $o)
                        <option value="{{ $o->id }}">{{ $o->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="satuan" class="font-weight-bold">Satuan</label>
                            <select name="satuan[]" id="satuan" class="form-control">
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
                            <input name="qty[]" id="qty" type="text" placeholder="Masukkan Jumlah" class="form-control"
                                value="">
                        </div>
                    </div>
                </div>
                <div class="float-right">
                    <button class="btn btn-danger btn-hapus-obat">Hapus</button>
                    <button type="button" id="tambah" class="btn btn-success btn-tambah-obat">Tambah</button>
                </div>
            </div>
        </div>`;

        obatWrapper.append(html);
    });

    obatWrapper.on('click', '.btn-hapus-obat', function () {
        // DOM Traversal
        $(this).closest('.form-obat-content').remove();
    })
</script>
@endsection