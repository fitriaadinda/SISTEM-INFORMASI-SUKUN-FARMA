@extends('layout')
@section('title','List Obat')
@section('css')
<style>
    .btn-aksi {
        font-size: 12px;
        padding: 5px;
    }

</style>
@endsection
@section('content')
<h2 class="mb-5">DATA OBAT</h2>
<div class="row">
    <div class="col-lg-6">
        <button class="mb-3 mr-2 w-50 btn btn-primary" data-toggle="modal" data-target="#tambahData">Tambah Data
            Obat</button>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Kelola Data Obat</h5>
        <table class="mb-0 table table-sm table-hover">
            <thead>
                <tr>
                    <th>Kode Obat</th>
                    <th>Nama Obat</th>
                    <th>Kategori</th>
                    <th>Harga Jual</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">PRMX2567</th>
                    <td>Paramex hvdrdeesxdhgy</td>
                    <td>Kapsul</td>
                    <td>Rp. 3000000</td>
                    <td>
                        <button class="mb-1 btn-transition btn btn-outline-dark btn-aksi">Detail</button>
                        <button class="mb-1 btn-transition btn btn-outline-dark btn-aksi" data-toggle="modal" data-target="#editData">Edit</button>
                        <button class="mb-1 btn-transition btn btn-outline-dark btn-aksi">Delete</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">PRMX2567</th>
                    <td>Paramex</td>
                    <td>Kapsul</td>
                    <td>Rp. 3000</td>
                    <td>
                        <button class="mb-1 btn-transition btn btn-outline-dark btn-aksi">Detail</button>
                        <button class="mb-1 btn-transition btn btn-outline-dark btn-aksi">Edit</button>
                        <button class="mb-1 btn-transition btn btn-outline-dark btn-aksi">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('modal')
<!-- Modal Tambah Data -->
<div class="modal fade bd-example-modal-lg" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-content">
            <div class="modal-header">
                <h5 class="title-title" id="exampleModalLabel">Tambah Data Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="">
                    <div class="position-relative form-group">
                        <label for="nama" class="font-weight-bold">Kode Obat</label>
                        <input name="nama" id="nama" type="text" placeholder="Kode Obat" class="form-control" value="">
                    </div>
                    <div class="position-relative form-group">
                        <label for="nama" class="font-weight-bold">Nama Obat</label>
                        <input name="nama" id="nama" type="text" placeholder="Nama Obat" class="form-control" value="">
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="harga_jual" class="font-weight-bold">Harga Jual</label>
                                <input name="harga_jual" id="harga_jual" placeholder="Harga Jual" type="text"
                                    class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="kategori" class="">Kategori</label>
                                <select name="kategori" id="kategori" class="form-control">
                                    <option>Kapsul</option>
                                    <option>Sirup</option>
                                    <option>Tetes Mata</option>
                                    <option>Tetes Telinga</option>
                                </select>
                            </div>
                        </div>
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

<!-- Modal Edit Data -->
<div class="modal fade bd-example-modal-lg" id="editData" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                <form class="">
                    <div class="position-relative form-group">
                        <label for="nama" class="font-weight-bold">Kode Obat</label>
                        <input name="nama" id="nama" type="text" placeholder="Kode Obat" class="form-control" value="PRMX2567">
                    </div>
                    <div class="position-relative form-group">
                        <label for="nama" class="font-weight-bold">Nama Obat</label>
                        <input name="nama" id="nama" type="text" placeholder="Nama Obat" class="form-control" value="Paramex hvdrdeesxdhgy">
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="harga_jual" class="font-weight-bold">Harga Jual</label>
                                <input name="harga_jual" id="harga_jual" placeholder="Harga Jual" type="text"
                                    class="form-control" value="Rp. 3000000">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="kategori" class="">Kategori</label>
                                <select name="kategori" id="kategori" class="form-control">
                                    <option>Kapsul</option>
                                    <option>Sirup</option>
                                    <option>Tetes Mata</option>
                                    <option>Tetes Telinga</option>
                                </select>
                            </div>
                        </div>
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
@endsection

@section('js')
<script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })

</script>
@endsection
