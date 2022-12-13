@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit Jenis Agenda</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Edit Jenis Agenda</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <form action="{{ route('jenisagenda.update', $jenis_agenda->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Jenis Agenda</h3>

            <div class="card-tools">
            </div>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="nama">Kode</label>
              <input type="text" name="kode" class="form-control" id="kode" value="{{ $jenis_agenda->kode }}" placeholder="Kode">
              @error('kode')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            
            <div class="form-group">
              <label for="nama">Jenis Agenda</label>
              <input type="text" name="nama" class="form-control" id="nama" value="{{ $jenis_agenda->nama }}" placeholder="Jenis Agenda">
              @error('nama')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            
          </div>
          <div class="card-footer">
            <a href="{{ route('jenisagenda.index') }}" class="btn btn-secondary">Back</a>
            <input type="submit" value="Save" name="submit" class="btn btn-success float-right">
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </form>
</section>
<!-- /.content -->
@stop