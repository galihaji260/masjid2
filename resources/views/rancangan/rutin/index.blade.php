@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Rancangan Rutin</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Rancangan Rutin</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Rancangan Rutin</h3>
                    <div class="card-tools">
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('rancanganrutin.yasinan') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-2">
                                <label>Yasinan</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2 mb-2">
                                <select id="inputTahun" name="tahun" class="form-control custom-select" required>
                                    <option value="" selected disabled>Pilih Tahun</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                </select>
                            </div>
                            <div class="col-2 mb-2">
                                {!! Form::select('divisi', $divisi, '', ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-2 mb-2">
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
                            <div class="col-2 mb-2">
                                <input type="text" name="nama_kegiatan" value="Yasinan" class="form-control">
                            </div>
                            <div class="col-2 mb-2">
                                <input type="time" name="mulai" value="" placeholder="Mulai" class="form-control">
                            </div>
                            <div class="col-2 mb-2">
                                <input type="time" name="selesai" value="" placeholder="Selesai" class="form-control">
                            </div>
                            <div class="col-2 mb-2">
                                {!! Form::select('pic', $pic, '', ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-12">
                                <input type="submit" value="Generate" name="submit" class="btn btn-success">
                            </div>
                        </div>
                    </form>
                    <form action="{{ route('rancanganrutin.lainnya') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-2 mt-5">
                                <label>Kegiatan Rutin Lain</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2 mb-2">
                                <select id="inputTahun" name="tahun" class="form-control custom-select" required>
                                    <option value="" selected disabled>Pilih Tahun</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                </select>
                            </div>
                            <div class="col-2 mb-2">
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
                            <div class="col-2 mb-2">
                                <select id="inputPasar" name="pasar" class="form-control custom-select" required>
                                    <option value="" selected disabled>Pilih Pasar</option>
                                    <option value="pon">Pon</option>
                                    <option value="wage">Wage</option>
                                    <option value="kliwon">Kliwon</option>
                                    <option value="legi">Legi</option>
                                    <option value="pahing">Pahing</option>
                                </select>
                            </div>
                            <div class="col-2 mb-2">
                                <input type="time" name="mulai" value="" placeholder="Mulai" class="form-control">
                            </div>
                            <div class="col-2 mb-2">
                                <input type="time" name="selesai" value="" placeholder="Selesai" class="form-control">
                            </div>
                            <div class="col-2 mb-2">
                                <input type="text" name="tempat" value="" placeholder="Tempat" class="form-control">
                            </div>
                            <div class="col-2 mb-2">
                                <input type="text" name="nama_kegiatan" placeholder="Kegiatan" class="form-control">
                            </div>
                            <div class="col-2 mb-2">
                                {!! Form::select('divisi', $divisi, '', ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-2 mb-2">
                                {!! Form::select('pic', $pic, '', ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-2 mb-2">
                                {!! Form::select('pengisi', $personalData, '', ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-12">
                                <input type="submit" value="Generate" name="submit" class="btn btn-success">
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</section>
<!-- /.content -->
@stop