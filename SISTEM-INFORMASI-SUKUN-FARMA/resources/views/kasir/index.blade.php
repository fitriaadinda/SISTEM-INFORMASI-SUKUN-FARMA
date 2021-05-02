@extends('layout', ['page' => 'kasir'])
@section('title','Kasir')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<style>

</style>
@endsection
@section('content')
<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav pt-0">
    <li class="nav-item">
        <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
            <span>Kasir</span>
        </a>
    </li>
    <li class="nav-item">
        <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
            <span>Resep</span>
        </a>
    </li>
    <li class="nav-item">
        <a role="tab" class="nav-link" id="tab-2" data-toggle="tab" href="#tab-content-2">
            <span>Semua Produk</span>
        </a>
    </li>
    <li class="nav-item">
        <a role="tab" class="nav-link" id="tab-3" data-toggle="tab" href="#tab-content-3">
            <span>Riwayat Transaksi</span>
        </a>
    </li>
</ul>
<div class="tab-content">
    <!-- Kasir -->
    <div class="tab-pane tabs-animation fade active show" id="tab-content-0" role="tabpanel">
        <div class="main-card card">
            <div class="card-body">
                <div class="row pilihan-utama mt-3">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Kasir</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                    placeholder="" value="{{ session('nama') }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="exampleSelect" class="col-sm-3 col-form-label col-form-label-sm">Tipe
                                Transaksi</label>
                            <div class="col-sm-9">
                                <select name="select" id="tipeTransaksi" class="form-control form-control-sm">
                                    <option value="" selected disabled>-- Pilih Tipe Transaksi --</option>
                                    <option value="non_resep">Non-Resep</option>
                                    <option value="resep">Resep</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="divider divider-obat"></div>
                <h5 class="card-title float-left">Data Obat</h5>
                <button class="btn btn-primary float-right mb-3" data-toggle="modal" data-target="#tambahObat">Tambah
                    Obat</button>
                <table class="mb-0 table table-sm table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Obat</th>
                            <th>Nama Obat</th>
                            <th>Harga Satuan</th>
                            <th>Satuan</th>
                            <th>Qty</th>
                            <th>Sub Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="dataObatResep">

                    </tbody>
                </table>

                <div class="float-right mt-5 mb-3">
                    <button type="submit" class="btn btn-success pr-4 pl-4" data-toggle="modal"
                        data-target="#bayar">Prosess</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Resep -->
    <div class="tab-pane tabs-animation fade" id="tab-content-1" role="tabpanel">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Kelola Data Resep</h5>
                <table id="data-resep" class="mb-0 table table-sm table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>No. Medis</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                            <th>Nama Dokter</th>
                            <th>Nama Klinik</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($resep as $r)
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{ $r->no_rekam_medis}}</td>
                            <td>{{ $r->nama_pasien }}</td>
                            <td>{{ $r->alamat_pasien }}</td>
                            <td>{{ $r->no_telepon }}</td>
                            <td>{{ $r->nama_dokter }}</td>
                            <td>{{ $r->nama_klinik }}</td>
                            <td>
                                <a class="mb-1 btn-transition btn btn-outline-dark btn-sm"
                                    href="{{ url('resep/'.$r->id) }}">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Semua Produk -->
    <div class="tab-pane tabs-animation fade" id="tab-content-2" role="tabpanel">
        <div class="main-card card">
            <div class="card-body">
                <h5 class="card-title">Kelola Data Obat</h5>
                <table id="data-obat" class="mb-0 table table-sm table-hover">
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
                        @foreach ($obat as $o)
                        <tr>
                            <th scope="row">{{ $o->kode_obat }}</th>
                            <td>{{ $o->nama }}</td>
                            <td>{{ $o->kategori->nama }}</td>
                            <td>{{ $o->harga_jual }}</td>
                            <td>
                                <a class="mb-1 btn-transition btn btn-outline-dark btn-sm"
                                    href="{{ url('kasir/obat/'.$o->id) }}">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Data Transaksi -->
    <div class="tab-pane tabs-animation fade" id="tab-content-3" role="tabpanel">
        <div class="main-card card">
            <div class="card-body">
                <h5 class="card-title">Kelola Data Transaksi</h5>
                <table id="data-transaksi" class="mb-0 table table-sm table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Transaksi</th>
                            <th>Tanggal</th>
                            <th>Kasir</th>
                            <th>Obat</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
@section('modal')
<!-- Modal Prosess -->
<div class="modal fade" id="bayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Total Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="colFormLabelSm"
                        class="col-sm-4 col-form-label col-form-label-sm font-weight-bold">Total</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabelSm"
                        class="col-sm-4 col-form-label col-form-label-sm font-weight-bold">Bayar</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabelSm"
                        class="col-sm-4 col-form-label col-form-label-sm font-weight-bold">Kembali</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <a class="btn btn-success" href="{{url ('/kasir/invoice')}}">Selesai</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="obatDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Detail Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <table id="detailTable" class="mb-0 table table-sm table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Expired</th>
                                <th>No. Batch</th>
                                <th>Harga Beli</th>
                                <th>Stock</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Obat -->
<div class="modal fade" id="tambahObat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Kode
                        Obat</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" id="kodeObatPencarian" placeholder="">
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-primary form-control form-control-sm" id="cariDataObat"><i
                                class="metismenu-icon pe-7s-search">
                            </i></button>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control form-control-sm" name="nama_obat" id="namaObat" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Satuan</label>
                    <div class="col-sm-9">
                        <select name="satuan" id="satuan" class="form-control">
                            <option value="selected disabled">-- Pilih --</option>
                            @foreach ($satuan as $s)
                            <option value="{{ $s->id }}" data-nama="{{ $s->nama }}">{{ $s->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Jumlah</label>
                    <div class="col-sm-9">
                        <input type="text" name="jumlah" id="jumlah" class="form-control form-control-sm"
                            id="colFormLabelSm" placeholder="">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success" id="prosesTambahObat">Selesai</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Resep -->
<div class="modal fade bd-example-modal-lg" id="dataResep" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="main-card card">
                    <div class="card-body">
                        <h5 class="card-title">Data Resep</h5>
                        <table id="data-resep" class="mb-0 table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>No. Medis</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No. Telepon</th>
                                    <th>Nama Dokter</th>
                                    <th>Nama Klinik</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($resep as $r)
                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td>{{ $r->no_rekam_medis}}</td>
                                    <td>{{ $r->nama_pasien }}</td>
                                    <td>{{ $r->alamat_pasien }}</td>
                                    <td>{{ $r->no_telepon }}</td>
                                    <td>{{ $r->nama_dokter }}</td>
                                    <td>{{ $r->nama_klinik }}</td>
                                    <td>
                                        <button class="mb-1 btn-transition btn btn-outline-dark btn-sm pilih-resep"
                                            data-id="{{ $r->id }}" data-nama="{{ $r->nama_pasien }}"
                                            data-alamat="{{ $r->alamat_pasien }}" data-telepon="{{ $r->no_telepon }}">
                                            Pilih
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success">Selesai</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script>
    $(document).ready(function () {
        let obat;
        /*
        1. pindah data total menjadi global variabel
        2. buat rumus menghitung harga berdasarkan satuan yang dipilih, contoh milih satuan box
        3. buat fungsi tersendiri untuk menampilkan baris yang menampilkan total harga
        4. pecahkan masalah di onchange tipe transaksi agar bisa mengambil variabel global meski tidak memakai callback
        */

        $('#data-resep').DataTable();
        $('#data-transaksi').DataTable();
        $('#data-obat').DataTable();

        $('#tipeTransaksi').change((function ()) {
            let selected = $(this).find(":selected").val();
            if (selected == 'resep') {
                $('.divider-obat').remove()
                $('#dataResep').modal('toggle');
                let html = `<div class="divider divider-resep"></div>
                <div class="form-row data-resep">
                    <input type="hidden" name="id_resep" id="id_resep" value="">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="nama_pasien" class="font-weight-bold">Nama Pasien</label>
                            <input name="nama_pasien" id="nama_pasien" type="text" placeholder="Masukkan Nama Pasien"
                                class="form-control" value="" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="no_telepon" class="font-weight-bold">No. Telepon</label>
                            <input name="no_telepon" id="no_telepon" type="text" placeholder="Masukkan No.Telepon"
                                class="form-control" value="" readonly>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="position-relative form-group">
                            <label for="alamat" class="font-weight-bold">Alamat</label>
                            <textarea name="alamat" id="alamat" type="text" placeholder="Masukkan Alamat"
                                class="form-control" value="" readonly></textarea>
                        </div>
                    </div>
                </div>
                    <button class="btn btn-warning ubah-resep float-right">Ganti Resep</button>
                    <div class="divider divider-data mt-5"></div>`;

                $(html).insertAfter('.pilihan-utama');
            } else if (selected == 'non_resep') {
                $('.ubah-resep').remove()
                $('.divider-data').remove()
                $('.divider-resep').remove()
                $('.data-resep').remove()
            }
        });

        $(document).on('click', '.ubah-resep', () => {
            $('#dataResep').modal('toggle');
        });

        $('.pilih-resep').click(() => {
            const pasien = {
                id: $(this).data('id'),
                nama: $(this).data('nama'),
                alamat: $(this).data('alamat'),
                telepon: $(this).data('telepon'),
            }

            fetch(`http://localhost:8000/api/resep/${pasien.id}/obat`)
                .then(response => response.json())
                .then(data => {

                    $('#id_resep').val(pasien.id);
                    $('#nama_pasien').val(pasien.nama);
                    $('#alamat').val(pasien.alamat);
                    $('#no_telepon').val(pasien.telepon);
                    $('#dataObatResep').html("");

                    if (data.success == true) {
                        let obat = data.obat
                        let count = 1;
                        let totalBiaya = 0;
                        let totalQty = 0;
                        obat.forEach(data => {
                            totalBiaya += data.harga_total;
                            totalQty += data.qty;
                            let html = `<tr>
                            <th scope="row">${count}</th>
                            <td>${data.kode_obat}</td>
                            <td>${data.nama}</td>
                            <td>${data.harga_jual}</td>
                            <td>${data.satuan}</td>
                            <td>${data.qty}</td>
                            <td>${data.harga_total}</td>
                            <td>
                                <form method="post" action="" style="display: inline">
                                    <button type="submit" class="mb-1 btn btn-danger"><i
                                            class="metismenu-icon pe-7s-trash">
                                        </i></button>
                                </form>
                            </td>
                        </tr>`;

                            $('#dataObatResep').append(html);
                            count++;
                        })

                        let totalAkhirHtml = `<tr>
                        <td colspan="4" class="text-right"></td>
                        <td style="background: #212529; color: #fff;">TOTAL</td>
                        <td style="background: #212529; color: #fff;">${totalQty}</td>
                        <td style="background: #212529; color: #fff;">${totalBiaya}</td>
                        <td style="background: #212529; color: #fff;"><td>
                    </tr>`

                        $('#dataObatResep').append(totalAkhirHtml);
                    }

                    $('#dataResep').modal('toggle');
                });
        });

        $('#cariDataObat').click(() => {
            let kodeObat = $('#kodeObatPencarian').val();
            fetch(`http://localhost:8000/api/obat/${kodeObat}`)
                .then(response => response.json())
                .then(data => {
                    if (!data.success) {
                        return Swal.fire({
                            title: 'Gagal!',
                            text: 'Data Obat Tidak Ditemukan',
                            icon: 'error',
                        })
                    }

                    this.obat = data.obat;
                    console.log(this.obat);
                    $('#namaObat').val(data.obat.nama);
                });
        });

        $('#prosesTambahObat').click(() => {
            console.log(this.obat);
        });
    });
</script>
@endsection