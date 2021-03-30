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
<h2 class="mb-4">Detail Obat Paramex</h2>
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
        <h5>Data Batch Paramex</h5>
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
                        <button class="mb-1 btn-transition btn btn-outline-dark btn-aksi" data-toggle="modal"
                            data-target="#editBatch">Edit</button>
                        <button class="mb-1 btn-transition btn btn-outline-dark btn-aksi">Delete</button>
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
        <h5>Data Rincian Paramex</h5>
    </div>
    <div class="col-md-6">
        <button class="mb-3 mr-2 btn btn-primary float-right" data-toggle="modal" data-target="#tambahDetail">Tambah
            Data</button>
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
                        <button class="mb-1 btn-transition btn btn-outline-dark btn-aksi" data-toggle="modal"
                            data-target="#editDetail">Edit</button>
                        <button class="mb-1 btn-transition btn btn-outline-dark btn-aksi">Delete</button>
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
                    <form class="">
                        <div class="position-relative form-group">
                            <label for="nama" class="font-weight-bold">No.Batch Obat</label>
                            <input name="nama" id="nama" type="text" placeholder="Masukkan No.Batch Obat"
                                class="form-control" value="">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Batch -->
<div class="modal fade bd-example-modal-lg" id="editBatch" tabindex="-1" role="dialog"
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
                    <form class="">
                        <div class="position-relative form-group">
                            <label for="nama" class="font-weight-bold">No.Batch Obat</label>
                            <input name="nama" id="nama" type="text" class="form-control" value="PRMX310620204">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Edit Detail Obat -->
    <div class="modal fade bd-example-modal-lg" id="editDetail" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="title-title" id="exampleModalLabel">Edit Detail Obat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="">
                            <div class="position-relative form-group disabled">
                                <label for="nama" class="font-weight-bold">Nama Obat</label>
                                <input name="nama" id="nama" type="text" placeholder="" class="form-control"
                                    value="Paramex">
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="expired_date" class="font-weight-bold">Expired Date</label>
                                        <input name="expired_date" id="expired_date" type="date" class="form-control"
                                            value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="no_batch" class="">No. Batch</label>
                                        <select name="no_batch" id="no_batch" class="form-control">
                                            <option>PRMX310620204</option>
                                            <option>PRMX310620205</option>
                                            <option>PRMX310620206</option>
                                            <option>PRMX310620207</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="form-row">
                            <div class="col-md-8">
                                <div class="position-relative form-group">
                                    <label for="harga_beli" class="font-weight-bold">Harga Beli</label>
                                    <input name="harga_beli" id="harga_beli" placeholder="Harga Beli" type="text"
                                        class="form-control" value="Rp. 2500">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="stock" class="font-weight-bold">Stock</label>
                                    <input name="stock" id="stock" placeholder="Stock" type="text" class="form-control"
                                        value="300">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('js')
    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })

    </script>
    @endsection
