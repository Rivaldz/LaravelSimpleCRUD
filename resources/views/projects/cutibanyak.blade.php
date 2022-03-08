@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Daftar Cuti</h2>
        </div>
    </div>
    <br>
    <div class="col-lg-12">
        <a href="projects" class="btn btn-success">Home</a>
        <a href="daftarcuti" class="btn btn-success">Daftar Cuti</a>
        <a href="cutibanyak" class="btn btn-success">Cuti Lebih 2 Hari</a>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered table-responsive-lg">
    <tr>
        <th>No</th>
        <th>No Induk</th>
        <th>Nama</th>
        <th>Tanggal Cuti</th>
        <th>Keterangan</th>
        <th>Pengajuan</th>
    </tr>
    @foreach ($data as $karyawan)
    @if($karyawan->lama_cuti > 1)
    <tr>
        <td scope="row">{{ $loop->iteration }}</td>
        <td>{{ $karyawan->no_induk }}</td>
        <td>{{ $karyawan->nama }}</td>
        <td>{{ $karyawan->tanggal_cuti }}</td>
        <td>{{ $karyawan->keterangan}}</td>
        <td>{{ $karyawan->pengajuan}}</td>
    </tr>
    @endif
    @endforeach
</table>
@endsection