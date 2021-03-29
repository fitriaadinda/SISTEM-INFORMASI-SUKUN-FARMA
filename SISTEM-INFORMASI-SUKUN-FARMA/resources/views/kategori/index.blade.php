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
<h2 class="mb-5">DATA KATEGORI</h2>
<div class="row">
    <div class="col-lg-6">
        <button class="mb-3 mr-2 w-50 btn btn-primary" data-toggle="modal" data-target="#tambahData">Tambah Kategori</button>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <table class="mb-0 table table-sm table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Kapsul</td>
                    <td>
                        <button class="mb-1 btn-transition btn btn-outline-dark btn-aksi" data-toggle="modal" data-target="#editData">Edit</button>
                        <button class="mb-1 btn-transition btn btn-outline-dark btn-aksi">Delete</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Sirup</td>
                    <td>
                        <button class="mb-1 btn-transition btn btn-outline-dark btn-aksi" data-toggle="modal" data-target="#editData">Edit</button>
                        <button class="mb-1 btn-transition btn btn-outline-dark btn-aksi">Delete</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Tetes Mata</td>
                    <td>
                        <button class="mb-1 btn-transition btn btn-outline-dark btn-aksi" data-toggle="modal" data-target="#editData">Edit</button>
                        <button class="mb-1 btn-transition btn btn-outline-dark btn-aksi">Delete</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>Tetes Telinga</td>
                    <td>
                        <button class="mb-1 btn-transition btn btn-outline-dark btn-aksi" data-toggle="modal" data-target="#editData">Edit</button>
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
                        <label for="nama" class="font-weight-bold">Kategori</label>
                        <input name="nama" id="nama" type="text" placeholder="Kategori" class="form-control" value="">
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
                <h5 class="title-title" id="exampleModalLabel">Edit Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="">
                    <div class="position-relative form-group">
                        <label for="nama" class="font-weight-bold">Kategori</label>
                        <input name="nama" id="nama" type="text" placeholder="Kode Obat" class="form-control" value="Kapsul">
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
