@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Jenis Agenda</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Jenis Agenda</li>
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
            <h3 class="card-title">Jenis Agenda</h3>
            <div class="card-tools">
              <a class="btn btn-primary" href="{{ route('jenisagenda.create') }}">Tambah</a>
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
                  <th>Kode</th>
                  <th>Nama</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($jenis_agendas as $jenis_agenda)
                <tr>
                  <td>{{$jenis_agenda->id}}</td>
                  <td>{{$jenis_agenda->kode}}</td>
                  <td>{{$jenis_agenda->nama}}</td>
                  <td>
                    <form action="{{ route('jenisagenda.destroy', $jenis_agenda->id) }}" method="POST">
                      <a class="" href="{{ route('jenisagenda.edit', $jenis_agenda->id) }}">
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