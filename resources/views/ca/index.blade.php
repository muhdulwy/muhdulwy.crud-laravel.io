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
      
        var table = $('#datatable-car').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('data.ca') }}",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'Nama', name: 'Nama'},
              {data: 'Harga', name: 'Harga'},
              {data: 'Stok', name: 'Stok'},
              {data: 'NamaSiswa', name: 'siswa.NamaSiswa'},
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
                $('#datatable-car').DataTable().draw(false);
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
                <a class="btn btn-success" href="{{ route('ca.create') }}"> Input Mobil</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('succes'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Data Mobil</h1>
        <table id="datatable-car" class="table table-bordered">
            <thead>
                <tr>
                    <th width="20px" class="text-center">No</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Nama Siswa</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
@endsection



{{-- 
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

    {!! $ca->links() !!} --}}
