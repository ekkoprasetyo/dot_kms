@extends('layouts.v_base')

@section('app_style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ URL::asset('theme/adminlte305/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('theme/adminlte305/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ URL::asset('theme/adminlte305/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('theme/adminlte305/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
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
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#open-thread" data-toggle="tab">Open Thread</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#closed-thread" data-toggle="tab">Closed Thread</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="open-thread">
                                        <!-- Post -->
                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm" src="{{ URL::asset('theme/adminlte305/dist/img/user1-128x128.jpg') }}" alt="user image">
                                                <span class="username">
                                                  <a href="#">Roy Suryo</a>
                                                </span>
                                                <span class="description">RS. Sehat Selalu - 7:30 PM today</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <p>
                                                Kaki keseleo sebaiknya diberikan penangan apa ?
                                            </p>

                                            <p>
                                                <a class="link-black text-sm mr-2"><i class="fas fa-arrow-alt-circle-right"></i></a>

                                                <span class="float-right">
                                                    <button type="button" onclick="showComment('{{ route('forum.comment') }}')" class="btn btn-info btn-sm text-sm"> <i class="far fa-comments mr-1"></i> Comments (7)</button>
                                                </span>
                                            </p>

                                        </div>
                                        <!-- /.post -->
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="closed-thread">
                                        <!-- Post -->
                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm" src="{{ URL::asset('theme/adminlte305/dist/img/user1-128x128.jpg') }}" alt="user image">
                                                <span class="username">
                                                  <a href="#">Roy Suryo</a>
                                                </span>
                                                <span class="description">RS. Sehat Selalu - 7:30 PM today</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <p>
                                                Bagaimana jika mulut kemasukan benda asing ?
                                            </p>

                                            <p>
                                                <a class="link-black text-sm mr-2"><i class="fas fa-arrow-alt-circle-right"></i></a>

                                                <span class="float-right">
                                                    <button type="button" onclick="showComment('{{ route('forum.comment') }}')" class="btn btn-info btn-sm text-sm"> <i class="far fa-comments mr-1"></i> Comments (3)</button>
                                                </span>
                                            </p>
                                        </div>
                                        <!-- /.post -->

                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm" src="{{ URL::asset('theme/adminlte305/dist/img/user1-128x128.jpg') }}" alt="user image">
                                                <span class="username">
                                                  <a href="#">Anita Hara</a>
                                                </span>
                                                <span class="description">RS. Sari Sehat - 5:13 PM today</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <p>
                                                Bagaimana jika kaki tertimpa sesuatu yang berat ?
                                            </p>

                                            <p>
                                                <a class="link-black text-sm mr-2"><i class="fas fa-arrow-alt-circle-right"></i></a>

                                                <span class="float-right">
                                                    <button type="button" onclick="showComment('{{ route('forum.comment') }}')" class="btn btn-info btn-sm text-sm"> <i class="far fa-comments mr-1"></i> Comments (10)</button>
                                                </span>
                                            </p>
                                        </div>
                                        <!-- /.post -->
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
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
                <form class="form-horizontal" method="post" action="{{ route('forum') }}" id="form-comment">
                    <div class="modal-body">
                        <div id="form-comment-js"></div>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal comment -->

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
                    <h4 class="modal-title">Edit Train</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" method="post" action="{{ route('forum') }}" id="form-edit">
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
                    <h4 class="modal-title">Delete Train</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" method="post" action="{{ route('forum') }}" id="form-delete">
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
    <!-- Toastr -->
    <script src="{{ URL::asset('theme/adminlte305/plugins/toastr/toastr.min.js') }}"></script>
    <!-- Custom -->
    <script src="{{ URL::asset('js/custom/add.js') }}"></script>
    <script src="{{ URL::asset('js/custom/edit.js') }}"></script>
    <script src="{{ URL::asset('js/custom/delete.js') }}"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function showComment(url_comment) {
            $("#form-comment-js").html('');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : url_comment,
                type : 'POST',
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

        $(function() {
            var table = $('.data-tables').DataTable({
                "responsive": true,
                "autoWidth": false,
                "info": true,
                "paging": true,
                "scrollX": true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('forum') }}',
                    method: 'POST'
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', "className": "text-center"},
                    {data: 'c_forum_number', name: 'c_forum_number', "className": "text-center"},
                    {data: 'c_forum_name', name: 'c_forum_name', "className": "text-center"},
                    {data: 'c_forumset_code', name: 'c_forumset_code', "className": "text-center"},
                    {data: 'action', name: 'action', orderable: false, searchable: false, "className": "text-center", width: '150px'}
                ],
            });
        });
    </script>
@endsection