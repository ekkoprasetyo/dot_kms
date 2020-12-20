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
                    <div class="col-12">
                        <!-- Box Comment -->
                        <div class="card card-widget">
                            <div class="card-header">
                                <div class="user-block">
                                    <img class="img-circle" src="{{ URL::asset('theme/adminlte305/dist/img/user1-128x128.jpg') }}" alt="User Image">
                                    <span class="username"><a href="#">Roy Suryo</a></span>
                                    <span class="description">RS. Sehat Selalu - 7:30 PM Today</span>
                                </div>
                                <!-- /.user-block -->
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Mark as read">
                                        <i class="far fa-circle"></i></button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- post text -->
                                <p>Bagaimana cara ampuh menyembuhkan koreng akibat kecelakaan kerja ya ?

                                </p>

                                <!-- Social sharing buttons -->
                                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
                                <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
                                <span class="float-right text-muted">69 likes - 1 comment(s)</span>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer card-comments">
                                <div class="card-comment">
                                    <!-- User image -->
                                    <img class="img-circle img-sm" src="{{ URL::asset('theme/adminlte305/dist/img/user3-128x128.jpg') }}" alt="User Image">

                                    <div class="comment-text">
                                        <span class="username">
                                          Dukun Gonzales
                                          <span class="text-muted float-right">8:03 PM Today</span>
                                        </span><!-- /.username -->
                                        Diberi sedikit bensin terus dikeruk ..
                                    </div>
                                    <!-- /.comment-text -->
                                </div>
                                <!-- /.card-comment -->
                            </div>
                            <!-- /.card-footer -->
                            <div class="card-footer">
                                <form action="#" method="post">
                                    <img class="img-fluid img-circle img-sm" src="{{ URL::asset('theme/adminlte305/dist/img/user4-128x128.jpg') }}" alt="Alt Text">
                                    <!-- .img-push is used to add margin to elements next to floating images -->
                                    <div class="img-push">
                                        <input type="text" class="form-control form-control-sm" placeholder="Press enter to post comment">
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-footer -->
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
                        <h4 class="modal-title">Add Train</h4>
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