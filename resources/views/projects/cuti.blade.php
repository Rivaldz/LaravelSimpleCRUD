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
        <a href="cuti" class="btn btn-success">Daftar Cuti</a>
        <a href="cutibanyak" class="btn btn-success">Cuti Lebih 2 Hari</a>
        <a href="totalcuti" class="btn btn-success">Total Cuti Karyawan</a>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('cuti.create') }}" title="Create a project"> <i class="fas fa-plus-circle"></i>
            </a>
        </div>
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
    </tr>
    @foreach ($data as $karyawan)
    <tr>
        <td scope="row">{{ $loop->iteration }}</td>
        <td>{{ $karyawan->no_induk }}</td>
        <td>{{ $karyawan->nama }}</td>
        <td>{{ $karyawan->tanggal_cuti }}</td>
        <td>{{ $karyawan->keterangan}}</td>
        <td>

            <form action="{{ route('cuti.destroy', $karyawan->id_tipecuti)}}" method="post">
                @csrf
                @method('DELETE')
                <a href="{{ route('cuti.show',$karyawan->no_induk) }}" title="show">
                    <i class="fas fa-eye text-success  fa-lg"></i>
                </a>
                <a href="{{ route('cuti.edit',$karyawan->id_tipecuti) }}">
                    <i class="fas fa-edit  fa-lg"></i>
                </a>
                <!-- <a href="hapusCuti/{{$karyawan->id_tipecuti}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> -->
                <button type="submit" class="btn btn-danger"> <i class="fa fa-trash"> </i></button>

            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection