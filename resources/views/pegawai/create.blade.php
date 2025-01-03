@extends('layouts.template')
@section('judulh1','Admin - Tambah Pegawai')

@section('konten')
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card shadow-lg">
        <div class="card-header bg-success text-white">
            <h3 class="card-title">Tambah Data Pegawai</h3>
        </div>
        <!-- Form Start -->
        <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <!-- Kolom Kiri -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama Pegawai</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Pegawai" required>
                        </div>
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="number" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP" required>
                        </div>
                        <div class="form-group">
                            <label for="jeniskelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jeniskelamin" name="jeniskelamin" required>
                                <option value="Laki-laki" {{ old('jeniskelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jeniskelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tempatlahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" placeholder="Masukkan Tempat Lahir">
                        </div>
                        <div class="form-group">
                            <label for="tanggallahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggallahir" name="tanggallahir">
                        </div>
                        <div class="form-group">
                            <label for="usia">Usia</label>
                            <input type="number" class="form-control" id="usia" name="usia" placeholder="Masukkan Usia">
                        </div>
                        <div class="form-group">
                            <label for="masakerja">Masa Kerja</label>
                            <input type="number" class="form-control" id="masakerja" name="masakerja" placeholder="Masukkan Masa Kerja">
                        </div>
                    
                    </div>
                    <!-- Kolom Kanan -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>User</label>
                            <select class="form-control" name="user_id">
                                @foreach($user as $dt)
                                <option value="{{ $dt->id }}">{{ $dt->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Keluarga</label>
                            <select class="form-control" name="keluarga_id">
                                @foreach($keluarga as $dt)
                                <option value="{{ $dt->id }}">{{ $dt->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Golongan</label>
                            <select class="form-control" name="golongan_id">
                                @foreach($golongan as $dt)
                                <option value="{{ $dt->id }}">{{ $dt->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Agama</label>
                            <select class="form-control" name="agama_id">
                                @foreach($agama as $dt)
                                <option value="{{ $dt->id }}">{{ $dt->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Unit Kerja</label>
                            <select class="form-control" name="unitkerja_id">
                                @foreach($unitkerja as $dt)
                                <option value="{{ $dt->id }}">{{ $dt->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                    <label>Jabatan</label>
                    <select class="form-control" name="jabatan_id">
                        @foreach($jabatan as $dt )
                        <option value="{{ $dt->id }}">{{ $dt->nama }}</option>
                        @endforeach
                    </select>
                </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan Alamat"></textarea>
                        </div>
                     
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control-file" id="foto" name="foto">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card Footer -->
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                <a href="{{ route('pegawai.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
