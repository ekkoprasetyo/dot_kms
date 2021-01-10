@extends('layouts.v_base')

@section('app_style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ URL::asset('theme/adminlte305/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('theme/adminlte305/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ URL::asset('theme/adminlte305/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('theme/adminlte305/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ URL::asset('theme/adminlte305/plugins/summernote/summernote-bs4.css') }}">
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
                <div class="row">
                    <a type="button" onclick="addModal('{{ route('forum.add') }}')" class="btn btn-app">
                        <span class="badge bg-info">Insert</span>
                        <i class="fa fa-plus"></i> Add
                    </a>
                    <div class="col-12">
                        <div class="card">
                            <div id="content-forum"></div>
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- modal add -->
    <div class="modal fade" id="modal-add">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div id="overlay-add" hidden="hidden">
                    <div class="overlay d-flex justify-content-center align-items-center">
                        <i class="fas fa-2x fa-sync fa-spin"></i>
                    </div>
                </div>
                <form class="form-horizontal" method="post" action="{{ route('forum.store') }}" id="form-add">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Forum Thread</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="form-add-js"></div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="btn-submit-add">Save !</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal add -->

    <!-- modal edit -->
    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div id="overlay-edit" hidden="hidden">
                    <div class="overlay d-flex justify-content-center align-items-center">
                        <i class="fas fa-2x fa-sync fa-spin"></i>
                    </div>
                </div>
                <div class="modal-header">
                    <h4 class="modal-title">Edit Forum</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" method="post" action="{{ route('forum.update') }}" id="form-edit">
                    <div class="modal-body">
                        <div id="form-edit-js"></div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="btn-submit-edit">Update !</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal edit -->

    <!-- modal comment -->
    <div class="modal fade" id="modal-comment">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div id="overlay-comment" hidden="hidden">
                    <div class="overlay d-flex justify-content-center align-items-center">
                        <i class="fas fa-2x fa-sync fa-spin"></i>
                    </div>
                </div>
                <div class="modal-header">
                    <h4 class="modal-title">Show Comment</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" method="post" action="{{ route('forum.store-comment') }}" id="form-comment">
                    <div class="modal-body">
                        <div id="form-comment-js"></div>
                    </div>
                    <div class="modal-footer justify-content-between" hidden>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="btn-comment-add">Save !</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal comment -->

    <!-- modal close thread -->
    <div class="modal fade" id="modal-close-thread">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div id="overlay-close-thread" hidden="hidden">
                    <div class="overlay d-flex justify-content-center align-items-center">
                        <i class="fas fa-2x fa-sync fa-spin"></i>
                    </div>
                </div>
                <div class="modal-header">
                    <h4 class="modal-title">Close Thread</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" method="post" action="{{ route('kbase.store-forum') }}" id="form-close-thread">
                    <div class="modal-body">
                        <div id="form-close-thread-js"></div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="btn-submit-add">Save !</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal close thread -->

    <!-- modal delete -->
    <div class="modal fade" id="modal-delete">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div id="overlay-delete" hidden="hidden">
                    <div class="overlay d-flex justify-content-center align-items-center">
                        <i class="fas fa-2x fa-sync fa-spin"></i>
                    </div>
                </div>
                <div class="modal-header">
                    <h4 class="modal-title">Delete Forum</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" method="post" action="{{ route('forum.destroy') }}" id="form-delete">
                    <div class="modal-body">
                        <div id="form-delete-js"></div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" id="btn-submit-delete">Delete !</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal delete -->
@endsection

@section('app_js')
    <!-- Select2 -->
    <script src="{{ URL::asset('theme/adminlte305/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ URL::asset('theme/adminlte305/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('theme/adminlte305/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('theme/adminlte305/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('theme/adminlte305/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ URL::asset('theme/adminlte305/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ URL::asset('theme/adminlte305/plugins/toastr/toastr.min.js') }}"></script>
    <!-- Custom -->
    <script src="{{ URL::asset('js/custom/add.js') }}"></script>
    <script src="{{ URL::asset('js/custom/edit.js') }}"></script>
    <script src="{{ URL::asset('js/custom/delete.js') }}"></script>

    <script type="text/javascript">
        $(function () {
            loadContent();

            setInterval(function(){
                loadContent();
                }, 60000);
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function loadContent() {
            $("#form-comment-js").html('');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : '{{ route('forum.content') }}',
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
                            $("#content-forum").html(data.data);
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

        function showComment(forum_id, url_comment) {
            $("#form-comment-js").html('');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : url_comment,
                type : 'POST',
                data: {
                    forum_id: forum_id,
                },
                beforeSend : function () {
                    // comment overlay
                    $("#overlay-comment").removeAttr("hidden");
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
                            $("#overlay-comment").attr("hidden",true);
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
                            $("#overlay-comment").attr("hidden",true);
                            $('#modal-comment').modal('hide');
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
                            $("#overlay-comment").attr("hidden",true);
                            $("#form-comment-js").html(data.data);
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
                    $("#overlay-comment").attr("hidden",true);
                    $('#modal-comment').modal('hide');
                }
            });
            $('#modal-comment').modal('show');
        }

        function closeThread(forum_id, url_close) {
            $("#form-close-thread-js").html('');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : url_close,
                type : 'POST',
                data: {
                    forum_id: forum_id,
                },
                beforeSend : function () {
                    // close-thread overlay
                    $("#overlay-close-thread").removeAttr("hidden");
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
                            $("#overlay-close-thread").attr("hidden",true);
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
                            $("#overlay-close-thread").attr("hidden",true);
                            $('#modal-close-thread').modal('hide');
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
                            $("#overlay-close-thread").attr("hidden",true);
                            $("#form-close-thread-js").html(data.data);
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
                    $("#overlay-close-thread").attr("hidden",true);
                    $('#modal-close-thread').modal('hide');
                }
            });
            $('#modal-close-thread').modal('show');
        }
    </script>
@endsection