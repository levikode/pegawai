@extends('layouts.template')

@section('title', 'Data Pegawai')

@section('tambahanCSS')
<!-- DataTables -->
<!-- DataTables CSS -->
<link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css" rel="stylesheet">


<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<!-- Toastr -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection

@section('judulh1', 'Pegawai')

@section('konten')
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h4 class="m-0 font-weight-bold text-secondary">Data Pegawai</h4>


                    <a href="{{ route('pegawai.create') }}" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Pegawai</span>
                    </a>
                </div>
                <div class="card-body">
                    <div class="input-group">
                        <form action="{{ route('pegawai.index') }}" method="GET">
                            <input type="text" name="search" placeholder="Cari NIP pegawai" value="{{ request('search') }}">
                            <button class="btn btn-primary mb-3 btn-sm mt-3" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>Jabatan</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Ttl</th>
                                    <th>Usia</th>
                                    <th>tmt</th>
                                    <th>Masa Kerja</th>
                                    <th>Status Keluarga</th>
                                    <th>Golongan Darah</th>
                                    <th>Agama</th>
                                    <th>Unit Kerja</th>
                                    <th>Alamat</th>
                                    <th>Petugas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $dt)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if ($dt->foto)
                                        <img src="{{ asset('storage/' . $dt->foto) }}" alt="Foto {{ $dt->nama }}" width="100">
                                        @else
                                        Tidak ada foto
                                        @endif
                                    </td>
                                    <td>{{ $dt->nama }}</td>
                                    <td>{{ $dt->nip }}</td>
                                    <td>{{ $dt->jabatan->nama}}</td>
                                    <td>{{ $dt->jeniskelamin }}</td>
                                    <td>{{ $dt->ttl }}</td>
                                    <td>{{ $dt->usia }}</td>
                                    <td>{{ $dt->tmt }}</td>
                                    <td>{{ $dt->masakerja }}</td>
                                    <td>{{ $dt->statuskeluarga}}</td>
                                    <td>{{ $dt->golongandarah }}</td>
                                    <td>{{ $dt->agama}}</td>
                                    <td>{{ $dt->unitkerja->nama }}</td>
                                    <td>{{ $dt->alamat }}</td>
                                    <td>{{ $dt->user->name}}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <form action="{{ route('pegawai.destroy', $dt->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            <a href="{{ route('pegawai.edit', $dt->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ route('pegawai.show', $dt->id) }}" class="btn btn-success btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between">
                            <!-- Tombol Previous -->
                            @if ($pegawai->onFirstPage())
                            <span class="btn btn-secondary disabled">Previous</span>
                            @else
                            <a href="{{ $pegawai->previousPageUrl() }}" class="btn btn-primary">Previous</a>
                            @endif

                            <!-- Tombol Next -->
                            @if ($pegawai->hasMorePages())
                            <a href="{{ $pegawai->nextPageUrl() }}" class="btn btn-primary">Next</a>
                            @else
                            <span class="btn btn-secondary disabled">Next</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('tambahanCSS')
    <!-- DataTables -->
     
<!-- DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>

    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <!-- Toastr -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <style>
    .table-responsive {
        overflow-x: auto !important;
        -webkit-overflow-scrolling: touch; /* Smooth scrolling on mobile */
    }

    table {
        width: 100% !important;
        table-layout: fixed; /* Ensure columns resize properly */
    }

    th, td {
        word-wrap: break-word; /* Prevent text from overflowing */
        white-space: normal; /* Allow text wrapping */
    }
</style>

    @endsection

    @section('tambahScript')
    <script>
    $(document).ready(function() {
        $('#example1').DataTable({
            responsive: true,        // Aktifkan responsivitas
            scrollX: true,           // Tambahkan scroll horizontal jika kolom terlalu banyak
            autoWidth: false,        // Matikan autoWidth agar tidak mengganggu
            pagingType: "simple",    // Navigasi sederhana
            lengthChange: true,
            pageLength: 5,
            lengthMenu: [5, 10, 25, 50],
            searching: true,
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data per halaman",
                zeroRecords: "Tidak ada data yang ditemukan",
                info: "Menampilkan _START_ hingga _END_ dari _TOTAL_ data",
                infoEmpty: "Tidak ada data tersedia",
                infoFiltered: "(disaring dari _MAX_ total data)",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Berikutnya",
                    previous: "Sebelumnya"
                }
            }
        });
    });
</script>


    @endsection