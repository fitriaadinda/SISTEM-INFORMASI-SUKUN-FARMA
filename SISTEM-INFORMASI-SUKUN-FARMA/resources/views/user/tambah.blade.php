@extends('layout', ['page' => 'user'])
@section('title','Tambah User')
@section('css')
<style>

</style>
@endsection
@section('content')
<form method="post" action="{{ url('user') }}">
    @csrf
    <h5 class="mb-2">Tambah Data User</h5>
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
                        <label for="nama" class="font-weight-bold">Nama</label>
                        <input name="nama" id="nama" placeholder="Masukkan Nama" type="text"
                            class="form-control" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="no_hp" class="font-weight-bold">No. Telepon</label>
                        <input name="no_hp" id="no_hp" type="text" placeholder="Masukkan No. Telepon" class="form-control" value="">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="email" class="font-weight-bold">Email</label>
                        <input name="email" id="email" type="email" placeholder="Masukkan Email" class="form-control" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="password" class="font-weight-bold">Password</label>
                        <input name="password" id="password" placeholder="Masukkan Password" type="password"
                            class="form-control" value="">
                    </div>
                </div>
            </div>
            <div class="position-relative form-group">
                <label for="role" class="">Role</label>
                <select name="role" id="role" class="form-control">
                    <option value="" selected disabled>-- Pilih --</option>
                    @foreach ($role as $r)
                    <option value="{{ $r->id }}">{{ $r->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="position-relative form-group">
                <label for="alamat" class="font-weight-bold">Alamat</label>
                <textarea name="alamat" id="alamat" placeholder="Masukkan Alamat" class="form-control" value=""></textarea>
            </div>
        </div>
    </div>
    <div class="float-right">
        <a class="btn btn-danger" href="{{ url('obat') }}">Close</a>
        <button type="submit" class="btn btn-success ">Save changes</button>
    </div>
</form>
@endsection
