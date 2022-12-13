@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit Pengisi Yasinan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Edit Pengisi Yasinan</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <form action="{{ route('pengisiyasinan.update', $pengisi_yasinan->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Pengisi Yasinan</h3>

            <div class="card-tools">
            </div>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="pasaran">Pasaran</label>
              <input type="text" name="pasaran" class="form-control" id="pasaran" value="{{ $pengisi_yasinan->pasaran }}" placeholder="Pasaran">
              @error('pasaran')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            
            <div class="form-group">
              <label for="pengisi">Pengisi Yasinan</label>
              {!! Form::select('pengisi', $personalData, $pengisi_yasinan->pengisi, ['class' => 'form-control']) !!}
              @error('pengisi')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            
          </div>
          <div class="card-footer">
            <a href="{{ route('pengisiyasinan.index') }}" class="btn btn-secondary">Back</a>
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