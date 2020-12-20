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
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Recently Published</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Closed Thread</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
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
                                                Bagaimana cara ampuh menyembuhkan koreng akibat kecelakaan kerja ya ?
                                            </p>

                                            <p>
                                                <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                                <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                                <span class="float-right">
                                                  <a href="#" class="link-black text-sm">
                                                    <i class="far fa-comments mr-1"></i> Comments (1)
                                                  </a>
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
                                                Langkah pertama yang harus dilakukan apabila ada yang terpeleset itu apa ya ?
                                            </p>

                                            <p>
                                                <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                                <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                                <span class="float-right">
                                                  <a href="#" class="link-black text-sm">
                                                    <i class="far fa-comments mr-1"></i> Comments (7)
                                                  </a>
                                                </span>
                                            </p>
                                        </div>
                                        <!-- /.post -->

                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm" src="{{ URL::asset('theme/adminlte305/dist/img/user1-128x128.jpg') }}" alt="user image">
                                                <span class="username">
                                                  <a href="#">John Thor</a>
                                                </span>
                                                <span class="description">RS. Sari Bugar - 3:33 PM today</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <p>
                                                Jika tertusuk paku apakah akan tetanus ?
                                            </p>

                                            <p>
                                                <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                                <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                                <span class="float-right">
                                                  <a href="#" class="link-black text-sm">
                                                    <i class="far fa-comments mr-1"></i> Comments (69)
                                                  </a>
                                                </span>
                                            </p>
                                        </div>
                                        <!-- /.post -->
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="timeline">
                                        <!-- The timeline -->
                                        <div class="timeline timeline-inverse">
                                            <!-- timeline time label -->
                                            <div class="time-label">
                                                <span class="bg-danger">
                                                  10 Feb. 2014
                                                </span>
                                            </div>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-envelope bg-primary"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                                    <div class="timeline-body">
                                                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                        quora plaxo ideeli hulu weebly balihoo...
                                                    </div>
                                                    <div class="timeline-footer">
                                                        <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-user bg-info"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                                                    <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                                                    </h3>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-comments bg-warning"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                                                    <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                                    <div class="timeline-body">
                                                        Take me to your leader!
                                                        Switzerland is small and neutral!
                                                        We are more like Germany, ambitious and misunderstood!
                                                    </div>
                                                    <div class="timeline-footer">
                                                        <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline time label -->
                                            <div class="time-label">
                                                <span class="bg-success">
                                                  3 Jan. 2014
                                                </span>
                                            </div>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-camera bg-purple"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                                                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                                    <div class="timeline-body">
                                                        <img src="http://placehold.it/150x100" alt="...">
                                                        <img src="http://placehold.it/150x100" alt="...">
                                                        <img src="http://placehold.it/150x100" alt="...">
                                                        <img src="http://placehold.it/150x100" alt="...">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <div>
                                                <i class="far fa-clock bg-gray"></i>
                                            </div>
                                        </div>
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