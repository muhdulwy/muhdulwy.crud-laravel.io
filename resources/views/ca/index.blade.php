@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>CRUD LARAVEL 8</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('ca.create') }}"> Input Car</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('succes'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th width="280px"class="text-center">Nama Car</th>
            <th width="280px"class="text-center">Harga Car</th>
            <th width="280px"class="text-center">Stok Car</th>
            <th width="280px"class="text-center">Nama Siswa</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($ca as $Car)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            
            <td>{{ $Car->Nama }}</td>
            <td>{{ $Car->Harga }}</td>
            <td>{{ $Car->Stok }}</td>
            <td>{{ $Car->siswa->NamaSiswa }}</td>
        
            <td class="text-center">
                <form action="{{ route('ca.destroy',$Car->id) }}" method="POST">

                   <a class="btn btn-info btn-sm" href="{{ route('ca.show',$Car->id) }}">Show</a>

                    <a class="btn btn-primary btn-sm" href="{{ route('ca.edit',$Car->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $ca->links() !!}

@endsection