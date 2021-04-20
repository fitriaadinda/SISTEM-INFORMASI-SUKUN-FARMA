@extends('layout', ['page' => 'komparasi_satuan'])
@section('title','Komparasi Satuan Obat')
@section('css')
<style>

</style>
@endsection
@section('content')
<h2 class="mb-5">DATA KOMPARASI SATUAN OBAT</h2>
<div class="row">
    <div class="col-lg-6">
        <button class="mb-3 mr-2 w-50 btn btn-primary" data-toggle="modal" data-target="#tambahData">Tambah
            Komparasi Satuan Obat</button>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <table class="mb-0 table table-sm table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Obat</th>
                    <th>Satuan Awal</th>
                    <th>Satuan Akhir</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($komparasi as $k)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $k->obat->nama }}</td>
                    <td>{{ $k->satuanAwal->nama }}</td>
                    <td>{{ $k->satuanAkhir->nama }}</td>
                    <td>{{ $k->jumlah }}</td>
                    <td>
                        <button class="mb-1 btn-transition btn btn-outline-dark btn-sm" data-toggle="modal"
                            data-target="#editData-{{$k->id}}">Edit</button>
                        <form method="post" action="{{('komparasi/'.$k->id)}}" style="display: inline">
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
                    <h5 class="title-title" id="exampleModalLabel">Tambah Komparasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="" method="post" action="{{url('komparasi/action/tambah')}}">
                        @csrf
                        <div class="position-relative form-group">
                            <label for="nama" class="font-weight-bold">Nama Obat</label>
                            <select name="nama" id="nama" class="form-control">
                                <option value="selected disabled">-- pilih --</option>
                                @foreach ($obat as $o)
                                <option value="{{ $o->id }}">{{ $o->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="satuan_awal" class="">Satuan Awal</label>
                                    <select name="satuan_awal" id="satuan_awal" class="form-control">
                                        <option value="selected disabled">-- pilih --</option>
                                        @foreach ($satuan as $sa)
                                        <option value="{{ $sa->id }}">{{ $sa->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="satuan_akhir" class="font-weight-bold">Satuan Akhir</label>
                                    <select name="satuan_akhir" id="satuan_akhir" class="form-control">
                                        <option value="selected disabled">-- Pilih --</option>
                                        @foreach ($satuan as $sk)
                                        <option value="{{ $sk->id }}">{{ $sk->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="position-relative form-group">
                            <label for="jumlah" class="font-weight-bold">Jumlah</label>
                            <input name="jumlah" id="jumlah" type="text" placeholder="Masukkan Jumlah"
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

<!-- Modal Edit Data -->
@foreach($komparasi as $kp)
<div class="modal fade bd-example-modal-lg" id="editData-{{$kp->id}}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="title-title" id="exampleModalLabel">Edit Komparasi Satuan Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="" method="post" action="{{url('komparasi/action-edit/'.$kp->id)}}">
                        @method('PUT')
                        @csrf
                        <div class="position-relative form-group">
                            <label for="nama" class="font-weight-bold">Nama Obat</label>
                            <select name="nama" id="nama" class="form-control">
                                @foreach ($obat as $o)
                                <option value="{{ $o->id }}" @if ($o->id == $kp->obat_id) selected @endif>{{ $o->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="satuan_awal" class="">Satuan Awal</label>
                                    <select name="satuan_awal" id="satuan_awal" class="form-control">
                                    @foreach ($satuan as $s)
                                    <option value="{{ $s->id }}" @if ($s->id == $kp->satuan_awal_id) selected @endif> {{ $s->nama }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="satuan_akhir" class="font-weight-bold">Satuan Akhir</label>
                                    <select name="satuan_akhir" id="satuan_akhir" class="form-control">
                                    @foreach ($satuan as $s)
                                    <option value="{{ $s->id }}" @if ($s->id == $kp->satuan_akhir_id) selected @endif> {{ $s->nama }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="position-relative form-group">
                            <label for="jumlah" class="font-weight-bold">Jumlah</label>
                            <input name="jumlah" id="jumlah" type="text" placeholder="Jumlah" class="form-control"
                                value="{{ $kp->jumlah }}">
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
