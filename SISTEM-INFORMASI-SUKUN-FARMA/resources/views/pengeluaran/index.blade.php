@extends('layout', ['page' => 'pengeluaran'])
@section('title','List Pengeluaran')
@section('css')
<style>
    .btn-aksi {
        font-size: 12px;
        padding: 5px;
    }

</style>
@endsection
@section('content')
<h2 class="mb-5">DATA PENGELUARAN</h2>
<div class="row">
    <div class="col-lg-6">
        <a class="mb-3 mr-2 w-50 btn btn-primary" href="{{url('pengeluaran/create')}}">Tambah Pengeluaran</a>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <table id="data-pengeluaran" class="mb-0 table table-sm table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Pengeluaran</th>
                    <th>Waktu Pengeluaran</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($pengeluaran as $p)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $p->jenisPengeluaran->jenis_pengeluaran }}</td>
                    <td>{{$p->waktu_pengeluaran}}</td>
                    <td>{{$p->jumlah_pengeluaran}}</td>
                    <td>{{$p->keterangan}}</td>
                    <td>
                        <a class="mb-1 btn-transition btn btn-outline-dark btn-aksi"
                            href="{{ url('pengeluaran/'.$p->id.'/edit') }}">Edit</a>
                        <form method="post" action="{{('pengeluaran/'.$p->id)}}" style="display: inline">
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
        $('#data-pengeluaran').DataTable();
    });

</script>

@if (session('success_message'))
<script>
    Swal.fire({
        title: 'Berhasil!',
        text: '{{ session('
        success_message ') }}',
        icon: 'success',
    })

</script>
@endif

@if (session('error_message'))
<script>
    Swal.fire({
        title: 'Gagal!',
        text: '{{ session('
        error_message ') }}',
        icon: 'error',
    })

</script>
@endif
@endsection
