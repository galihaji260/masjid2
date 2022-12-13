@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Tambah Anggota</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Tambah Anggota</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <form action="{{ route('anggota.store') }}" method="POST">
    @csrf
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Tambah Anggota</h3>

            <div class="card-tools">
            </div>
          </div>
          @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
          @endif
          <div class="card-body">
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" required>
              <input type="hidden" name="tipe" class="form-control" value="internal">
              @error('nama')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="nama">Divisi</label>
              {!! Form::select('divisi', $divisi, '', ['class' => 'form-control']) !!}
              @error('divisi')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="nama">No WA</label>
              <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="No WA" required>
              @error('no_hp')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="nama">Username</label>
              <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
              @error('username')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="Password">Password</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
              @error('password')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="password">Konfirmasi Password</label>
              <input type="password" name="password_confirm" class="form-control" id="password_confirm" placeholder="Konfirmasi Password">
              @error('password')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="nama">Role</label>
              {!! Form::select('role', $role, '', ['class' => 'form-control']) !!}
              @error('role')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="card-footer">
            <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Back</a>
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