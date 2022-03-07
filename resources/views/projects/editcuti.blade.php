@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>isi edit cuti</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('cuti.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
        </div>
    </div>
</div>
<br>
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
<form  action="{{ route('cuti.update', $data[0]->id_tipecuti) }}" method="POST">
    @csrf
    @method('PUT')
    <input hidden type="text" name="id_tipecuti" value="{{$data[0]->id_tipecuti}}">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                <select name="id_karyawan" class="form-control">
                    <option value="{{$data[0]->id_karyawan}}">{{$data[0]->nama}}</option>

                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Keterangan:</strong>
                <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" value="{{$data[0]->keterangan}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Lama Cuti Hari:</strong>
                <input type="number" name="lama_cuti" class="form-control" placeholder="Lama Cuti" value="{{$data[0]->lama_cuti}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Cuti:</strong>
                <input type="date" name="tanggal_cuti" class="form-control" placeholder="Tanggal Lahir" value="{{$data[0]->tanggal_cuti}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection