@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Anggota</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Anggota</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Anggota</h3>
            <div class="card-tools">
              <a class="btn btn-primary" href="{{ route('anggota.create') }}">Tambah</a>
            </div>
          </div>
          <!-- /.card-header -->
          @if (session('status'))
          <div class="alert alert-success">{{ session('status') }}</div>
          @endif
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Divisi</th>
                  <th>No WA</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($anggotas as $anggota)
                <tr>
                  <td>{{$anggota->id}}</td>
                  <td>{{$anggota->nama}}</td>
                  <td>{{$anggota->divisi}}</td>
                  <td>{{$anggota->no_hp}}</td>
                  <td>
                    <form action="{{ route('anggota.destroy', $anggota->id) }}" method="POST">
                      <a class="" href="{{ route('anggota.edit', $anggota->id) }}">
                        <i class="fa fa-pen" aria-hidden="true"></i>
                      </a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn">
                        <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->
@stop

@push('scripts')
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false
    });
  });
</script>
@endpush