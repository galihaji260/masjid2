@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="#">Home</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Statistik Agenda</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="evalagenda" style="width:100%"></div>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
            <div class="col-md-12 col-lg-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Statistik Kontributor Pengisi</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="kontributor" style="width:100%"></div>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection

@push('scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var obj = JSON.parse(@json($data['agenda']));
            console.log(obj)
            var i;
            var parameter = [
                ['Tahun', 'Berjalan', 'Terlaksana', 'Dibatal', 'Total']
            ];
            for (i = 0; i < obj.length; i++) {
                parameter.push(obj[i]);
            }

            var data = google.visualization.arrayToDataTable(parameter);

            var options = {
                chart: {
                    title: 'Statistik Kegiatan di hitung pertahun',
                    colors: ['#007bff', '#28a745', '#dc3545', '#17a2b8']
                }
            };
            console.log(options)

            var chart = new google.charts.Bar(document.getElementById('evalagenda'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var obj = JSON.parse(@json($data['kontributor']));
            var i;
            var parameter = [
                ['Nama Pengisi', 'Jumlah Agenda']
            ];
            for (i = 0; i < obj.length; i++) {
                parameter.push(obj[i]);
            }
            var data = google.visualization.arrayToDataTable(parameter);
            var options = {
                title: 'Statistik Kontributor Pengisi'
            };

            var chart = new google.visualization.PieChart(document.getElementById('kontributor'));

            chart.draw(data, options);
        }
    </script>
@endpush
