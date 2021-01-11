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
            <div class="row">
                <div class="col-md-3">
                    <select class="form-control select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;" name="txt_start_chat_to" id="start-chat">
                        <option value="">-= Chat to Someone =-</option>
                        @if(count($users) > 0)
                            @foreach($users as $user)
                                <option value="{{ $user->c_users_id }}">{{ $user->c_users_fullname }}</option>
                            @endforeach
                        @endif
                    </select>
                    <br>
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Recent Chats</h3>
                        </div>
                        <div id="recent-chat"></div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <form action="{{ route('chat.store') }}" method="post" id="form-direct-chat">
                        <div id="direct-chat">
                        </div>
                    </form>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2();
        });
    </script>
@endsection

@section('app_js')
    <!-- Select2 -->
    <script src="{{ URL::asset('theme/adminlte305/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ URL::asset('theme/adminlte305/plugins/toastr/toastr.min.js') }}"></script>
    <!-- Custom -->
    <script src="{{ URL::asset('js/custom/add.js') }}"></script>
    <script src="{{ URL::asset('js/custom/edit.js') }}"></script>
    <script src="{{ URL::asset('js/custom/delete.js') }}"></script>

    <script type="text/javascript">
        var to = '';

        $(function () {
            $('.select2').select2();

            loadRecentChat();

            $('#start-chat').on('change', function() {
                loadDirectChat(this.value);
                to = this.value;
            });

            setInterval(function(){
                loadRecentChat();

                loadDirectChat(to)
                }, 120000
            );

        });

        function loadRecentChat() {
            $("#recent-chat").html('');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : '{{ route('chat.recent-chat') }}',
                type : 'POST',
                success : function(data) {
                    setTimeout(function(){
                        // Button loading reset
                        var obj = jQuery.parseJSON(JSON.stringify(data));
                        if (obj.status == 'error' || obj.status == 'errors') {
                            $(document).Toasts('create', {
                                class: 'bg-danger',
                                title: obj.title,
                                position: 'bottomRight',
                                body: obj.message,
                                icon: 'fas fa-envelope fa-lg',
                                autohide: true,
                                delay: 3000,
                            });
                        }
                        else if (obj.status == 'auth') {
                            $(document).Toasts('create', {
                                class: 'bg-warning',
                                title: obj.title,
                                position: 'bottomRight',
                                body: obj.message,
                                icon: 'fas fa-envelope fa-lg',
                                autohide: true,
                                delay: 3000,
                            });
                        }
                        else {
                            $(document).Toasts('create', {
                                class: 'bg-success',
                                title: obj.title,
                                position: 'bottomRight',
                                body: obj.message,
                                icon: 'fas fa-envelope fa-lg',
                                autohide: true,
                                delay: 3000,
                            });
                            $("#recent-chat").html(data.data);
                        }
                    }, 500);
                },
                error: function(xhr) {
                    var xhr = JSON.parse(xhr.responseText);
                    var html = '';
                    for (var key in xhr.errors)
                    {
                        html += '<li>'+ xhr.errors[key][0] + '</li>'
                    }
                    $(document).Toasts('create', {
                        class: 'bg-danger',
                        title: xhr.message,
                        position: 'bottomRight',
                        body: html,
                        icon: 'fas fa-envelope fa-lg',
                        autohide: true,
                        delay: 10000,
                    });
                }
            });
        }

        function loadDirectChat(to) {
            $("#direct-chat").html('');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : '{{ route('chat.direct-chat') }}',
                type : 'POST',
                data: {
                    to: to,
                },
                success : function(data) {
                    setTimeout(function(){
                        // Button loading reset
                        var obj = jQuery.parseJSON(JSON.stringify(data));
                        if (obj.status == 'error' || obj.status == 'errors') {
                            $(document).Toasts('create', {
                                class: 'bg-danger',
                                title: obj.title,
                                position: 'bottomRight',
                                body: obj.message,
                                icon: 'fas fa-envelope fa-lg',
                                autohide: true,
                                delay: 3000,
                            });
                        }
                        else if (obj.status == 'auth') {
                            $(document).Toasts('create', {
                                class: 'bg-warning',
                                title: obj.title,
                                position: 'bottomRight',
                                body: obj.message,
                                icon: 'fas fa-envelope fa-lg',
                                autohide: true,
                                delay: 3000,
                            });
                        }
                        else {
                            $(document).Toasts('create', {
                                class: 'bg-success',
                                title: obj.title,
                                position: 'bottomRight',
                                body: obj.message,
                                icon: 'fas fa-envelope fa-lg',
                                autohide: true,
                                delay: 3000,
                            });
                            $("#direct-chat").html(data.data);
                        }
                    }, 500);
                },
                error: function(xhr) {
                    var xhr = JSON.parse(xhr.responseText);
                    var html = '';
                    for (var key in xhr.errors)
                    {
                        html += '<li>'+ xhr.errors[key][0] + '</li>'
                    }
                    $(document).Toasts('create', {
                        class: 'bg-danger',
                        title: xhr.message,
                        position: 'bottomRight',
                        body: html,
                        icon: 'fas fa-envelope fa-lg',
                        autohide: true,
                        delay: 10000,
                    });
                }
            });
        }

        $("#form-direct-chat").on("submit", function (event) {
            event.preventDefault();

            var url  = $("#form-direct-chat").attr('action');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : url,
                type : 'POST',
                data : $("#form-direct-chat").serialize(),
                success : function(data) {
                    setTimeout(function(){
                        // Button loading reset
                        var obj = jQuery.parseJSON(JSON.stringify(data));

                        if (obj.status == 'error' || obj.status == 'errors') {
                            $(document).Toasts('create', {
                                class: 'bg-danger',
                                title: obj.title,
                                position: 'bottomRight',
                                body: obj.message,
                                icon: 'fas fa-envelope fa-lg',
                                autohide: true,
                                delay: 10000,
                            });
                        }
                        else if (obj.status == 'auth') {
                            $(document).Toasts('create', {
                                class: 'bg-warning',
                                title: obj.title,
                                position: 'bottomRight',
                                body: obj.message,
                                icon: 'fas fa-envelope fa-lg',
                                autohide: true,
                                delay: 10000,
                            });
                        } else {
                            $(document).Toasts('create', {
                                class: 'bg-success',
                                title: obj.title,
                                position: 'bottomRight',
                                body: obj.message,
                                icon: 'fas fa-envelope fa-lg',
                                autohide: true,
                                delay: 10000,
                            });
                            loadDirectChat(obj.to);
                        }
                    }, 500);
                },
                error: function(xhr) {
                    var xhr = JSON.parse(xhr.responseText);
                    var html = '';
                    for (var key in xhr.errors)
                    {
                        html += '<li>'+ xhr.errors[key][0] + '</li>'
                    }
                    $(document).Toasts('create', {
                        class: 'bg-danger',
                        title: xhr.message,
                        position: 'bottomRight',
                        body: html,
                        icon: 'fas fa-envelope fa-lg',
                        autohide: true,
                        delay: 10000,
                    });
                }
            });
        });
    </script>
@endsection