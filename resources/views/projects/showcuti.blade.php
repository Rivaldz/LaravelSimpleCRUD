@extends('layouts.app')

@section('content')
<h2>Lihat Detail Data</h2>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('cuti.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>No Induk:</strong>
            {{ $data[0]->no_induk}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nama:</strong>
            {{ $data[0]->nama }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Keterangan:</strong>
            {{ $data[0]->keterangan }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tanggal Cuti:</strong>
            {{ $data[0]->tanggal_cuti }}
        </div>
    </div>
</div>
@endsection