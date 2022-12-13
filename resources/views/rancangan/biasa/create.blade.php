@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Rancangan Agenda Biasa</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Rancangan Agenda Biasa</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <form action="{{ route('rancanganbiasa.store') }}" method="POST">
    @csrf
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Rancangan Agenda Biasa</h3>

            <div class="card-tools">
            </div>
          </div>
          @if (session('status'))
          <div class="alert alert-success">{{ session('status') }}</div>
          @endif
          <div class="card-body">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="nama">Nama Agenda</label>
                  <input type="text" name="nama_kegiatan" class="form-control" id="nama" value="" placeholder="Nama Kegiatan" required>
                  @error('nama')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="nama">Jenis Agenda</label>
                  {!! Form::select('jenis', $jenisagenda, '', ['class' => 'form-control','required']) !!}
                  @error('jenis_agenda')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="tanggal">Tanggal Agenda</label>
                  <input type="date" name="tanggal" class="form-control" id="tanggal" value="" placeholder="Tanggal Agenda" required>
                  @error('tanggal')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="waktu">Waktu</label>
                  <input type="text" name="waktu" class="form-control" id="waktu" value="" placeholder="Waktu">
                  @error('waktu')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="tempat">Tempat</label>
                  <input type="text" name="tempat" class="form-control" id="tempat" value="" placeholder="Tempat">
                  @error('tempat')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="divisi">Divisi</label>
                  {!! Form::select('divisi', $divisi, '', ['class' => 'form-control']) !!}
                  @error('divisi')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="penanggung_jawab">Penanggung Jawab</label>
                  {!! Form::select('penanggung_jawab', $penanggungjawab, '', ['class' => 'form-control']) !!}
                  @error('penanggung_jawab')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="pengisi">Pengisi</label>
                  {!! Form::select('pengisi', $pengisi, '', ['class' => 'form-control']) !!}
                  @error('penanggung_jawab')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="anggaran">Anggaran</label>
                  <input type="text" name="anggaran" class="form-control" id="anggaran" value="" placeholder="Anggaran">
                  @error('anggaran')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="deskripsi_kegiatan">Deskripsi Kegiatan</label>
                  <input type="text" name="deskripsi_kegiatan" class="form-control" id="deskripsi_kegiatan" value="" placeholder="Deskripsi Kegiatan">
                  <input type="hidden" name="status" value="1">
                  @error('deskripsi_kegiatan')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
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