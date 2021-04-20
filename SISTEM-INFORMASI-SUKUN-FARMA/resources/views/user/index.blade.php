@extends('layout', ['page' => 'user'])
@section('title','List User')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<style>

</style>
@endsection
@section('content')
<h2 class="mb-5">DATA USER</h2>
<div class="row">
    <div class="col-lg-6">
        <a href="{{ url('user/create') }}" class="mb-3 mr-2 w-50 btn btn-primary">Tambah Data User</a>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Kelola Data User</h5>
        <table id="data-user" class="mb-0 table table-sm table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>No. HP</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($user as $u)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $u->nama }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{ $u->role->nama }}</td>
                    <td>{{ $u->no_hp }}</td>
                    <td>{{ $u->alamat }}</td>
                    <td>
                        <a class="mb-1 btn-transition btn btn-outline-dark btn-sm"
                            href="{{ url('user/'.$u->id.'/edit') }}">Edit</a>
                        <form method="post" action="{{('user/'.$u->id)}}" style="display: inline">
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
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('#data-user').DataTable();
    });

</script>
@if (session('success_message'))
<script>
    Swal.fire({
        title: 'Berhasil!',
        text: '{{ session('success_message') }}',
        icon: 'success',
    })

</script>
@endif

@if (session('error_message'))
<script>
    Swal.fire({
        title: 'Gagal!',
        text: '{{ session('error_message') }}',
        icon: 'error',
    })

</script>
@endif
@endsection
