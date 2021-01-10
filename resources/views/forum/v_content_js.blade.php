<div class="card-header p-2">
    <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link active" href="#open-thread" data-toggle="tab">Open Thread</a></li>
        <li class="nav-item"><a class="nav-link" href="#closed-thread" data-toggle="tab">Closed Thread</a></li>
    </ul>
</div><!-- /.card-header -->
<div class="card-body">
    <div class="tab-content">
        <div class="active tab-pane" id="open-thread">
        @foreach($forums_open as $fo)
            <!-- Post -->
                <div class="post">
                    <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ URL::asset('theme/adminlte305/dist/img/user1-128x128.jpg') }}" alt="user image">
                        <span class="username">
                                                      <a href="#">{{ $fo->c_users_fullname }}</a>
                                                    </span>
                        <span class="description">{{ $fo->c_branch_name }} {{ $fo->c_forum_update_time }}</span>
                    </div>
                    <!-- /.user-block -->
                    <p>
                        {{ $fo->c_forum_issue }}
                    </p>
                    <p>
                        <span class="badge bg-info">{{ $fo->c_forum_tags }}</span>
                    </p>

                    <p>
                        <a class="link-black text-sm mr-2"><i class="fas fa-arrow-alt-circle-right"></i></a>

                        <span class="float-right">
                            @if( $fo->c_forum_update_by == UserAuth::getUserID()) <button type="button" onclick="editModal('{{ $fo->c_forum_id }}','{{ route('forum.edit') }}')" class="btn btn-info btn-sm text-sm"> <i class="fas fa-pencil-alt mr-1"></i> Edit</button> @endif
                            @if( $fo->c_forum_update_by == UserAuth::getUserID()) <button type="button" onclick="deleteModal('{{ $fo->c_forum_id }}','{{ route('forum.delete') }}')" class="btn btn-danger btn-sm text-sm"> <i class="fas fa-trash-alt mr-1"></i> Delete</button> @endif
                            <button type="button" onclick="closeThread('{{ $fo->c_forum_id }}','{{ route('forum.close-thread') }}')" class="btn btn-success btn-sm text-sm"> <i class="fas fa-check-double mr-1"></i> Close This Thread</button>
                            <button type="button" onclick="showComment('{{ $fo->c_forum_id }}','{{ route('forum.comment') }}')" class="btn btn-info btn-sm text-sm"> <i class="far fa-comments mr-1"></i> Comments ({{ $fo->comments_count }})</button>
                        </span>
                        </p>

                    </div>
                    <!-- /.post -->
                @endforeach
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="closed-thread">
            @foreach($forums_close as $fc)
                <!-- Post -->
                    <div class="post">
                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="{{ URL::asset('theme/adminlte305/dist/img/user1-128x128.jpg') }}" alt="user image">
                            <span class="username">
                              <a href="#">{{ $fc->c_users_fullname }}</a>
                            </span>
                            <span class="description">{{ $fc->c_branch_name }} {{ $fc->c_forum_update_time }}</span>
                        </div>
                        <!-- /.user-block -->
                        <p>
                            {{ $fc->c_forum_issue }}
                        </p>
                        <p>
                            <span class="badge bg-info">{{ $fc->c_forum_tags }}</span>
                        </p>

                        <p>
                            <a class="link-black text-sm mr-2"><i class="fas fa-arrow-alt-circle-right"></i></a>

                            <span class="float-right">
                                <button type="button" onclick="showComment('{{ $fc->c_forum_id }}','{{ route('forum.comment') }}')" class="btn btn-info btn-sm text-sm"> <i class="far fa-comments mr-1"></i> Comments ({{ $fc->comments_count }})</button>
                            </span>
                        </p>

                    </div>
                    <!-- /.post -->
                @endforeach
            </div>
            <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
    </div><!-- /.card-body -->