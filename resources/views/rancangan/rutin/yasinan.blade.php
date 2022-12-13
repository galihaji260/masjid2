@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Yasinan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Yasinan</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <form action="{{ route('rancanganrutin.yasinanstore') }}" method="POST">
    @csrf
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Yasinan</h3>

            <div class="card-tools">
            </div>
          </div>
          <div class="card-body">
            <div class="row mb-3">
              <div class="col-2">Nama Kegiatan</div>
              <div class="col-2">Pasaran</div>
              <div class="col-2">Pengisi</div>
              <div class="col-2">Tanggal</div>
              <div class="col-2">Waktu</div>
              <div class="col-2">Lokasi</div>
            </div>
            @php
            $i = 0;
            @endphp
            @foreach ($dates as $date)
            @php
            $i++;
            @endphp
            <div class="row mb-3" id="data{{ $i }}">
              <div class="col-2"><input type="text" name="kegiatan[]" class="form-control" value="Yasinan" readonly required></div>
              <div class="col-1"><input type="text" name="pasaran[]" value="{{ $date['pasaran'] }}" class="form-control" readonly required></div>
              <div class="col-2">
                <input type="text" name="pengisi[]" value="{{ $pengisi[array_search($date['pasaran'], array_column($pengisi, 'pasaran'))]['pengisi'] }}" class="form-control" required>
                <input type="hidden" name="penanggungjawab[]" value="{{ $req['pic'] }}" class="form-control">
                <input type="hidden" name="divisi[]" value="{{ $req['divisi'] }}" class="form-control">
              </div>
              <div class="col-2"><input type="text" name="tanggal[]" value="{{ $date['tanggal'] }}" class="form-control" readonly></div>
              <div class="col-2"><input type="text" name="waktu[]" class="form-control" value="{{ $req['mulai'].'-'.$req['selesai']}}" required readonly></div>
              <div class="col-2"><input type="text" name="lokasi[]" value="{{ ($date['pasaran'] == 'pahing')?'masjid':'' }}" class="form-control"></div>
              <div class="col-1"><button onclick="deleteRow({{ $i}})" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></div>
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
        <a href="{{ route('rancanganrutin.index') }}" class="btn btn-secondary">Back</a>
        <input type="submit" value="Save" name="submit" class="btn btn-success float-right">
      </div>
    </div>
  </form>
</section>
<!-- /.content -->
@stop

@push('scripts')
<script>
  function deleteRow(data){
    $('#data'+data).remove();
  }
</script>
@endpush