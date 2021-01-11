@extends('layouts.v_base')

@section('app_style')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ URL::asset('theme/adminlte305/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('theme/adminlte305/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <!-- default css -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ URL::asset('theme/adminlte305/plugins/fontawesome-free/css/all.min.css ') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ URL::asset('theme/adminlte305/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css ') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::asset('theme/adminlte305/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ URL::asset('theme/adminlte305/plugins/overlayScrollbars/css/OverlayScrollbars.min.css ') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::asset('theme/adminlte305/dist/css/adminlte.min.css') }}">
    <!-- default css -->

@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{ $title }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">{{ $title }}</li>
                            <li class="breadcrumb-item active">{{ $subtitle }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $count_open_case }}</h3>

                                <p>Open Cases</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $count_total_knowledge_base }}</h3>

                                <p>Total K-Base Record</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $completion }}<sup style="font-size: 20px">%</sup></h3>

                                <p>Completion</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $count_total_user }}</h3>

                                <p>Total Users</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <div class="col-md-12">
                        <!-- USERS LIST -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Top 10 Receiving Points</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <ul class="users-list clearfix">
                                    @foreach($top_points as $tp)
                                        <li>
                                            <img src="{{ URL::asset('theme/adminlte305/dist/img/user1-128x128.jpg') }}" alt="User Image">
                                            <a class="users-list-name" href="#">{{ $tp->c_users_fullname }}</a>
                                            <span class="users-list-date">{{ $tp->reward_point }} Point(s)</span>
                                        </li>
                                    @endforeach
                                </ul>
                                <!-- /.users-list -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!--/.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection