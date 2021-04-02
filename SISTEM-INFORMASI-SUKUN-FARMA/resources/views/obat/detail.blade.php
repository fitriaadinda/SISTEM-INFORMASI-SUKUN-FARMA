@extends('layout')
@section('title','Detail Obat')
@section('css')
<style>
    .btn-aksi {
        font-size: 12px;
        padding: 5px;
    }

</style>
@endsection
@section('content')
<h2 class="mb-4">Detail Obat {{ $obat->nama }}</h2>
<div class="card-border mb-5 card card-body border-warning">
    <form class="">
        <div class="position-relative form-group">
            <label for="nama" class="font-weight-bold">Nama Obat</label>
            <input name="nama" id="nama" type="text" class="form-control" value="{{ $obat->nama }}" disabled>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <div class="position-relative form-group">
                    <label for="harga_jual" class="font-weight-bold">Harga Jual</label>
                    <input name="harga_jual" id="harga_jual" type="text" class="form-control"
                        value="{{ $obat->harga_jual }}" disabled>
                </div>
            </div>
            <div class="col-md-6">
                <div class="position-relative form-group">
                    <label for="kategori" class="font-weight-bold">Kategori</label>
                    <input name="kategori" id="kategori" type="text" class="form-control"
                        value="{{ $obat->kategori->nama }}" disabled>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Data Batch -->
<div class="row">
    <div class="col-md-6">
        <h5>Data Batch {{ $obat->nama }}</h5>
    </div>
    <div class="col-md-6">
        <button class="mb-3 mr-2 btn btn-primary float-right" data-toggle="modal" data-target="#tambahBatch">Tambah
            Data</button>
    </div>
</div>
<div class="main-card mb-5 card">
    <div class="card-body">
        <table class="mb-0 table table-sm table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor Batch</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($obat->batchObat as $key => $batch)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $batch->kode_batch }}</td>
                    <td>
                        <div class="row">
                            <div class="col-sm-1">
                                <button class="mb-1 btn-transition btn btn-outline-dark btn-aksi" data-toggle="modal"
                                    data-target="#editData-{{$batch->id}}">Edit</button>
                            </div>
                            <div class="col-sm-2">
                                <form method="post" action="{{ url('batch/'.$batch->id) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="mb-1 btn-transition btn btn-outline-dark btn-aksi"
                                        style="display: block">Delete</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Data Rincian -->
<div class="row">
    <div class="col-md-6">
        <h5>Data Rincian {{ $obat->nama }}</h5>
    </div>
    <div class="col-md-6">
        <a class="mb-3 mr-2 btn btn-primary float-right" href="{{ url('obat/' .$obat->id. '/detail/create') }}">Tambah
            Data</a>
    </div>
</div>
<div class="card-border mb-3 card card-body border-secondary">
    <div class="card-body">
        <table class="mb-0 table table-sm table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Expired</th>
                    <th>No. Batch</th>
                    <th>Harga Beli</th>
                    <th>Stock</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($obat->detailObat as $key => $detail)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $detail->waktu_expired }}</td>
                    <td>{{ $detail->batch->kode_batch}}</td>
                    <td>{{ $detail->harga_beli }}</td>
                    <td>{{ $detail->stock }}</td>
                    <td>
                        <div class="row">
                            <div class="col-sm-2">
                            <a class="mb-1 btn-transition btn btn-outline-dark btn-aksi" href="{{ url('detail/' .$detail->id. '/edit') }}">Edit</a>
                            </div>
                            <div class="col-sm-2">
                                <form method="post" action="{{ url('detail/'.$detail->id) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="mb-1 btn-transition btn btn-outline-dark btn-aksi"
                                        style="display: block">Delete</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('modal')
<!-- Tambah Batch -->
<div class="modal fade bd-example-modal-lg" id="tambahBatch" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="title-title" id="exampleModalLabel">Tambah No.Batch Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="" method="post" action="{{url('obat/'.$obat->id.'/batch')}}">
                        @csrf
                        <div class="position-relative form-group">
                            <label for="kode_batch" class="font-weight-bold">No.Batch Obat</label>
                            <input name="kode_batch" id="kode_batch" type="text" placeholder="Masukkan No.Batch Obat"
                                class="form-control" value="" required>
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

<!-- Edit Batch -->
@foreach ($obat->batchObat as $key => $batch)
<div class="modal fade bd-example-modal-lg" id="editData-{{$batch->id}}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="title-title" id="exampleModalLabel">Edit No.Batch Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="" method="post" action="{{url('batch/'.$batch->id)}}">
                    @method('PUT')
                        @csrf
                        <div class="position-relative form-group">
                            <label for="kode_batch" class="font-weight-bold">No.Batch Obat</label>
                            <input name="kode_batch" id="kode_batch" type="text" class="form-control" value="{{$batch->kode_batch}}">
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

@section('js')
<script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })

</script>
@endsection
