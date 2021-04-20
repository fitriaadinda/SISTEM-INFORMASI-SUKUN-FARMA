@extends('layout', ['page' => 'jenis_pengeluaran'])
@section('title','Jenis Pengeluaran')
@section('css')
<style>

</style>
@endsection
@section('content')
<h2 class="mb-5">DATA JENIS PENGELUARAN</h2>
<div class="row">
    <div class="col-lg-6">
        <button class="mb-3 mr-2 w-50 btn btn-primary" data-toggle="modal" data-target="#tambahData">Tambah
            Jenis Pengeluaran</button>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <table class="mb-0 table table-sm table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Pengeluaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($jenis as $j)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $j->jenis_pengeluaran }}</td>
                    <td>
                        <button class="mb-1 btn-transition btn btn-outline-dark btn-sm" data-toggle="modal"
                            data-target="#editData-{{$j->id}}">Edit</button>
                        <form method="post" action="{{('jenis-pengeluaran/'.$j->id)}}" style="display: inline">
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

@section('modal')
<!-- Modal Tambah Data -->
<div class="modal fade bd-example-modal-lg" id="tambahData" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="title-title" id="exampleModalLabel">Tambah Jenis Pengeluaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="" method="post" action="{{url('jenis-pengeluaran/action/tambah')}}">
                        @csrf
                        <div class="position-relative form-group">
                            <label for="jenis_pengeluaran" class="font-weight-bold">Jenis Pengeluaran</label>
                            <input name="jenis_pengeluaran" id="jenis_pengeluaran" type="text" placeholder="Jenis Pengeluaran" class="form-control"
                                value=" " required>
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

<!-- Modal Edit Data -->
@foreach($jenis as $jn)
<div class="modal fade bd-example-modal-lg" id="editData-{{$jn->id}}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="title-title" id="exampleModalLabel">Edit Jenis Pengeluaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="" method="post" action="{{url('jenis-pengeluaran/action-edit/'.$jn->id)}}">
                        @method('PUT')
                        @csrf
                        <div class="position-relative form-group">
                            <label for="jenis_pengeluaran" class="font-weight-bold">Jenis Pengeluaran</label>
                            <input name="jenis_pengeluaran" id="jenis_pengeluaran" type="text" placeholder="Jenis Pengeluaran" class="form-control"
                                value="{{ $jn->jenis_pengeluaran }}">
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