@extends('template')

@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/plug-ins/1.11.3/features/searchHighlight/dataTables.searchHighlight.css">
@endsection

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.11.3/features/searchHighlight/dataTables.searchHighlight.min.js"></script>
<script src="https://bartaz.github.io/sandbox.js/jquery.highlight.js"></script>
<script type="text/javascript">
    $(function () {
      
        var table = $('#datatable-siswa').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('data.sisw') }}",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'NIS', name: 'NIS'},
              {data: 'NamaSiswa', name: 'NamaSiswa'},
              {data: 'Alamat', name: 'Alamat'},
              {data: 'JenisKelamin', name: 'JenisKelamin'},
              {data: 'NoTelp', name: 'NoTelp'},
              {
                  data: 'action', 
                  name: 'action', 
                  orderable: false, 
                  searchable: false
              },
          ]
        });

        table.on('draw', function(){
            var body = $(table.table().body());

            body.unhighlight();
            body.highlight( table.search() );
        });
      
    });

    $('#datatable-siswa').on('click', '.btn-delete[data-remote]', function (e) { 
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = $(this).data('remote');
        // confirm then
        if(confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            $.ajax({
                url: url,
                type: 'DELETE',
                dataType: 'json',
                data: {method: '_DELETE', submit: true}
            }).always(function (data) {
                $('#datatable-siswa').DataTable().draw(false);
            });
        }
    });
</script>
@endsection

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>CRUD LARAVEL 8</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('sisw.create') }}"> Input Siswa</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('succes'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    
    <div class="container mt-5">
        <h1 class="mb-4 text-center">How to Use Yajra DataTables in Laravel 8</h1>
        <table id="datatable-siswa" class="table table-bordered">
            <thead>
                <tr>
                    <th width="20px" class="text-center">No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>No Telp</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

    {{-- <form action="" method="GET">
        <div class="container">
            <div class="row">
                <div class="input-group col-md-2">
                    <input type="text" name="cari" class="form-control bg-light border-1 border-info small" placeholder="Cari Data" aria-level="Search" value="">
                    <div class="input-group-append">
                        <button class="btn btn-info float-right" type="submit">
                            Cari
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form> --}}

    {{-- <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>NIS</th>
            <th width="280px"class="text-center">Nama Siswa</th>
            <th width="280px"class="text-center">Alamat</th>
            <th width="280px"class="text-center">Jenis Kelamin</th>
            <th width="280px"class="text-center">No Telp</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($sisw as $siswa)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{!! $siswa->NIS !!}</td>
            <td>{!! $siswa->NamaSiswa !!}</td>
            <td>{!! $siswa->Alamat !!}</td>
            <td>{!! $siswa->JenisKelamin !!}</td>
            <td>{!! $siswa->NoTelp !!}</td>
            <td class="text-center">
                <form action="{{ route('sisw.destroy',$siswa->id) }}" method="POST">

                   <a class="btn btn-info btn-sm" href="{{ route('sisw.show',$siswa->id) }}">Show</a>

                    <a class="btn btn-primary btn-sm" href="{{ route('sisw.edit',$siswa->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $sisw->links() !!} --}}

@endsection