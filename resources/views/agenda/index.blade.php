@extends('layouts.master')

@section('content')
@inject('pasaran', 'App\Lib\PasaranHelper')
 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Agenda</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Agenda</li>
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
                <h3 class="card-title">Agenda</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="" method="POST">
                  @csrf
                  <div class="row">
                  <div class="col-lg-4 mb-2">
                  {!! Form::select('tahun', $tahun, $request->tahun, ['class' => 'form-control']) !!}
                  </div>
                  <div class="col-lg-4 mb-2">
                  {!! Form::select('bulan', $bulan, $request->bulan, ['class' => 'form-control']) !!}
                  </div>
                  <div class="col-lg-4 mb-2">
                  {!! Form::select('divisi', $divisi, $request->divisi, ['class' => 'form-control']) !!}
                  </div>
                  <div class="col-lg-4 mb-2">
                  {!! Form::select('jenis', $jenis, $request->jenis, ['class' => 'form-control']) !!}
                  </div>
                  <div class="col-lg-4 mb-2">
                  <input type="text" class="form-control" name="keyword" value="{{ $request->keyword }}">
                  </div>
                  <div class="col-lg-4 mb-2">
                  <input type="submit" value="Cari" class="btn btn-primary">
                  <a href="{{ route('agenda.index') }}" class="btn btn-danger">Reset</a>
                  </div>
                  </div>
                </form>
                <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nama Kegiatan</th>
                    <th>Hari</th>
                    <th>Pasaran</th>
                    <th>Tanggal</th>
                    <th>Penanggung Jawab</th>
                    <th>Pengisi</th>
                    <th>Jenis</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($agendas as $agenda)
                  <tr>
                    <td>{{$agenda->nama_kegiatan}}</td>
                    <td>{{ $pasaran->getHari($agenda->tanggal) }}</td>
                    <td>{{ $pasaran->getPasaran($agenda->tanggal) }}</td>
                    <td>{{$agenda->tanggal}}</td>
                    <td>{{$agenda->penanggung_jawab}}</td>
                    <td>{{$agenda->pengisi}}</td>
                    <td>{{$agenda->jenis}}</td>
                    <td><span style="background-color: {{ $color[$agenda->status] ?? '#ffffff' }}; color:#ffffff; padding: 0.375rem 0.75rem;">{{$agenda->status}}</span></td>
                    <td>
                      <form action="{{ route('agenda.destroy', $agenda->id) }}" method="POST">
                        <a class="" href="{{ route('agenda.edit', $agenda->id) }}">
                        <i class="fa fa-pen" aria-hidden="true"></i>
                        </a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn">
                          <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                        </button>
                        <a class="" href="{{ route('penilaiankegiatan.edit', $agenda->id) }}">
                          <i class="fa fa-tasks" aria-hidden="true" title="Nilai"></i>
                        </a>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                  </tfoot>
                </table>
                </div>
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