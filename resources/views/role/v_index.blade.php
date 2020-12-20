@extends('layouts.v_base')

@section('app_style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ URL::asset('theme/adminlte305/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('theme/adminlte305/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ URL::asset('theme/adminlte305/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('theme/adminlte305/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ URL::asset('theme/adminlte305/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
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
                        <div class="card">
                            <div class="card-header">
                                <a type="button" onclick="addModal('{{route('role.add')}}')" class="btn btn-app">
                                    <span class="badge bg-success">Insert</span>
                                    <i class="fa fa-plus"></i> Add
                                </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped data-tables">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Display</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Display</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
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
                <form class="form-horizontal" method="post" action="{{ route('role.store') }}" id="form-add">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Role</h4>
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
                    <h4 class="modal-title">Edit Role</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" method="post" action="{{ route('role.update') }}" id="form-edit">
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
                    <h4 class="modal-title">Delete Role</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" method="post" action="{{ route('role.destroy') }}" id="form-delete">
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
    
    <!-- modal permission -->
    <div class="modal fade" id="modal-permission">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div id="overlay-permission" hidden="hidden">
                    <div class="overlay d-flex justify-content-center align-items-center">
                        <i class="fas fa-2x fa-sync fa-spin"></i>
                    </div>
                </div>
                <form class="form-horizontal" method="post" action="{{ route('role.update-permission') }}" id="form-permission">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Role Permission</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="form-permission-js"></div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="btn-submit-permission">Save !</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal permission -->
@endsection

@section('app_js')
    <!-- Select2 -->
    <script src="{{ URL::asset('theme/adminlte305/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ URL::asset('theme/adminlte305/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('theme/adminlte305/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('theme/adminlte305/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('theme/adminlte305/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ URL::asset('theme/adminlte305/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ URL::asset('theme/adminlte305/plugins/toastr/toastr.min.js') }}"></script>
    <!-- Custom -->
    <script src="{{ URL::asset('js/custom/add.js') }}"></script>
    <script src="{{ URL::asset('js/custom/edit.js') }}"></script>
    <script src="{{ URL::asset('js/custom/edit-role-permission.js') }}"></script>
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
                    url: '{{ route('role.datatables') }}',
                    method: 'POST'
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', "className": "text-center"},
                    {data: 'c_role_name', name: 'c_role_name', "className": "text-center"},
                    {data: 'c_role_display', name: 'c_role_name', "className": "text-center"},
                    {data: 'c_role_description', name: 'c_role_name', "className": "text-center"},
                    {data: 'action', name: 'action', orderable: false, searchable: false, "className": "text-center", width: '150px'}
                ],
            });
        });
    </script>
@endsection