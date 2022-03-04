@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Karyawan</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('projects.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('projects.update', $karyawan[0]->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input class="form-control" type="hidden" name="id" id="id" value="{{ $karyawan[0]->id}}">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No Induk:</strong>
                <input type="text" name="no_induk" value="{{ $karyawan[0]->no_induk}}" class="form-control" placeholder="No Induk">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                <input type="text" name="nama" value="{{ $karyawan[0]->nama}}" class="form-control" placeholder="Nama">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat:</strong>
                <input type="text" name="alamat" class="form-control" value="{{ $karyawan[0]->alamat }}" placeholder="Alamat">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Lahir:</strong>
                <input type="text" name="tanggal_lahir" class="form-control" data-date-format="yy/mm/dd" value="{{ $karyawan[0]->tanggal_lahir}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Gabung:</strong>
                <input type="text" name="tanggal_bergabung" class="form-control" data-date-format="yy/mm/dd" value="{{ $karyawan[0]->tanggal_bergabung}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection