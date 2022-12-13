@extends('layouts.master')

@section('content')
 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pengisi Yasinan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pengisi Yasinan</li>
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
                <h3 class="card-title">Pengisi Yasinan</h3>
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
                    <th>Pasaran</th>
                    <th>Pengisi</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($pengisi_yasinans as $pengisi_yasinan)
                  <tr>
                    <td>{{$pengisi_yasinan->id}}</td>
                    <td>{{$pengisi_yasinan->pasaran}}</td>
                    <td>{{$pengisi_yasinan->pengisi}}</td>
                    <td>
                      <form action="{{ route('pengisiyasinan.destroy', $pengisi_yasinan->id) }}" method="POST">
                        <a class="" href="{{ route('pengisiyasinan.edit', $pengisi_yasinan->id) }}">
                        <i class="fa fa-pen" aria-hidden="true"></i>
                        </a>
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