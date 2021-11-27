@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2> Show Car</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('ca.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Car:</strong>
                {{ $ca->Nama }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga Car:</strong>
                {{ $ca->Harga }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Stok Car:</strong>
                {{ $ca->Stok }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Siswa:</strong>
                {{ $ca->siswa->NamaSiswa }}
            </div>
        </div>
        
    </div>
@endsection