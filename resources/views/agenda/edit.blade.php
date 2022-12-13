@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit Agenda</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Edit Agenda</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <form action="{{ route('agenda.update', $agenda->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Agenda</h3>

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
              <input type="text" name="nama_kegiatan" class="form-control" id="nama" value="{{ $agenda->nama_kegiatan }}"
                placeholder="Nama Kegiatan">
              @error('nama')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="nama">Jenis Agenda</label>
              {!! Form::select('jenisagenda', $jenisagenda, $agenda->jenis_agenda, ['class' => 'form-control']) !!}
              @error('jenis_agenda')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="tanggal">Tanggal Agenda</label>
              <input type="text" name="tanggal" class="form-control" id="tanggal" value="{{ $agenda->tanggal }}" placeholder="Tanggal Agenda">
              @error('tanggal')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="waktu">Waktu</label>
              <input type="text" name="waktu" class="form-control" id="waktu" value="{{ $agenda->waktu }}" placeholder="Waktu">
              @error('waktu')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="tempat">Tempat</label>
              <input type="text" name="tempat" class="form-control" id="tempat" value="{{ $agenda->tempat }}" placeholder="Tempat">
              @error('tempat')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="divisi">Divisi</label>
              {!! Form::select('divisi', $divisi, $agenda->divisi, ['class' => 'form-control']) !!}
              @error('divisi')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="penanggung_jawab">Penanggung Jawab</label>
              {!! Form::select('penanggung_jawab', $penanggungjawab, $agenda->penanggung_jawab, ['class' => 'form-control']) !!}
              @error('penanggung_jawab')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="pengisi">Pengisi</label>
              {!! Form::select('pengisi', $pengisi, $agenda->pengisi, ['class' => 'form-control']) !!}
              @error('penanggung_jawab')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="deskripsi_kegiatan">Deskripsi Kegiatan</label>
              <input type="text" name="deskripsi_kegiatan" class="form-control" id="deskripsi_kegiatan" value="{{ $agenda->deskripsi_kegiatan }}"  placeholder="Deskripsi Kegiatan">
              @error('deskripsi_kegiatan')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            </div>
            <div class="col-6">
            <div class="form-group">
              <label for="anggaran">Anggaran</label>
              <input type="text" name="anggaran" class="form-control" id="anggaran" value="{{ $agenda->anggaran }}" placeholder="Anggaran">
              @error('anggaran')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="status_kegiatan">Status Kegiatan</label>
              {!! Form::select('statuskegiatan', $statuskegiatan, $agenda->status_kegiatan, ['class' => 'form-control']) !!}
              @error('deskripsi_kegiatan')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
             </div>
            <div class="form-group">
              <label for="realisasi_anggaran">Realisasi Anggaran</label>
              <input type="text" name="realisasi_anggaran" class="form-control" id="realisasi_anggaran" value="{{ $agenda->realisasi_anggaran }}" placeholder="Realisasi Anggaran">
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