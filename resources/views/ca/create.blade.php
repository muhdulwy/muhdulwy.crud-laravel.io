@extends('template')

@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Create New Car</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{ route('ca.index') }}"> Kembali</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Input gagal.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('ca.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Car:</strong>
                <input type="text" name="Nama" class="form-control" placeholder="NAMA Car" value="{{ old('Nama') }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga Car:</strong>
                <input type="text" name="Harga" class="form-control" placeholder="Harga Car" value="{{ old('Harga') }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Stok Car:</strong>
                <input type="text" name="Stok" class="form-control" placeholder="Stok Car" value="{{ old('Stok') }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jenis Kelamin:</strong>
                <select name="siswa_id" class="form-control">
                    <option value="">-- pilih Siswa --</option>
                    @foreach ($sisw as $sw)
                        <option value="{{ $sw->id }}" {{ old('siswa_id') == $sw->id ? 'selected' : '' }}>{{ $sw->NamaSiswa }}</option>
                    @endforeach
                </select>
            </div>
        </div>                
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection