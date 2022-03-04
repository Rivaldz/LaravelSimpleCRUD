@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Karyawan Yang Pertama Kali Gabung</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('projects.create') }}" title="Create a project"> <i class="fas fa-plus-circle"></i>
            </a>
        </div>
    </div>
    <br>
    <div class="col-lg-12">
        <a href="pertamajoin" class="btn btn-success">Lihat 3 Pertama Gabung</a>
        <a href="daftarcuti" class="btn btn-success">Daftar Cuti</a>
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
        <th>Alama</th>
        <th>Tanggal Lahir</th>
        <th>Tanggal Bergabung</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($karyawans as $karyawan)
    <tr>
        <td scope="row">{{ $loop->iteration }}</td>
        <td>{{ $karyawan->no_induk }}</td>
        <td>{{ $karyawan->nama }}</td>
        <td>{{ $karyawan->alamat }}</td>
        <td>{{ $karyawan->tanggal_lahir}}</td>
        <td>{{ $karyawan->tanggal_bergabung,'d M Y'}}</td>
        <td>
            <form action="{{ route('projects.destroy', $karyawan->id) }}" method="POST">

                <a href="{{ route('projects.show', $karyawan->id) }}" title="show">
                    <i class="fas fa-eye text-success  fa-lg"></i>
                </a>

                <a href="{{ route('projects.edit', $karyawan->id) }}">
                    <i class="fas fa-edit  fa-lg"></i>

                </a>

                @csrf
                @method('DELETE')

                <button type="submit" title="delete" style="border: none; background-color:transparent;">
                    <i class="fas fa-trash fa-lg text-danger"></i>

                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection