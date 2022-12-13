@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Input</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Input</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <form action="{{ route('pasaran.store') }}" method="POST">
    @csrf
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Input</h3>

            <div class="card-tools">
            </div>
          </div>
          <div class="card-body">
            <div class="row mb-3">
              <div class="col-4">Tanggal {{ date('l') }}</div>
              <div class="col-4">Nama Kegiatan</div>
              <div class="col-4">Penanggung Jawab</div>
            </div>
            @foreach ($dates as $date)
            <div class="row mb-3">
              <div class="col-4"><input type="text" name="tanggal[]" value="{{ $date }}" class="form-control" readonly></div>
              <div class="col-4"><input type="text" name="kegiatan[]" class="form-control" required></div>
              <div class="col-4"><input type="text" name="penanggungjawab[]" class="form-control" required></div>
            </div>
            @endforeach
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <a href="{{ route('pasaran.index') }}" class="btn btn-secondary">Back</a>
        <input type="submit" value="Save" name="submit" class="btn btn-success float-right">
      </div>
    </div>
  </form>
</section>
<!-- /.content -->
@stop