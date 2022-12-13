@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Generate</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Generate</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <form action="" method="GET">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Generate</h3>

            <div class="card-tools">
            </div>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="inputTahun">Tahun</label>
              <select id="inputTahun" name="tahun" class="form-control custom-select" required>
                <option value="" selected disabled>Pilih Tahun</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
              </select>
            </div>
            <div class="form-group">
              <label for="inputHari">Hari</label>
              <select id="inputHari" name="hari" class="form-control custom-select" required>
                <option value="" selected disabled>Pilih Hari</option>
                <option value="Monday">Senin</option>
                <option value="Tuesday">Selasa</option>
                <option value="Wednesday">Rabu</option>
                <option value="Thursday">Kamis</option>
                <option value="Friday">Jum'at</option>
                <option value="Saturday">Sabtu</option>
                <option value="Sunday">Minggu</option>
              </select>
            </div>
            <div class="form-group">
              <label for="inputPasar">Pasar</label>
              <select id="inputPasar" name="pasar" class="form-control custom-select" required>
                <option value="" selected disabled>Pilih Pasar</option>
                <option value="pon">Pon</option>
                <option value="wage">Wage</option>
                <option value="kliwon">Kliwon</option>
                <option value="legi">Legi</option>
                <option value="pahing">Pahing</option>
              </select>
            </div>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <div class="row">
      <div class="col-6">
        <input type="submit" value="Generate" name="submit" class="btn btn-success float-right">
      </div>
    </div>
  </form>
</section>
<!-- /.content -->
@stop