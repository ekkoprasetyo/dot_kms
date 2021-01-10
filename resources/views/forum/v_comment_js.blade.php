@csrf
<!-- Box Comment -->
<div class="card card-widget">
    <input type="text" value="{{ $thread->c_forum_id }}" name="txt_forum_id" hidden>
    <div class="card-header">
        <div class="user-block">
            <img class="img-circle" src="{{ URL::asset('theme/adminlte305/dist/img/user1-128x128.jpg ') }}" alt="User Image">
            <span class="username"><a href="#">{{ $thread->c_users_fullname }}</a></span>
            <span class="description">{{ $thread->c_forum_update_time }}</span>
        </div>
        <!-- /.user-block -->
{{--        <div class="card-tools">--}}
{{--            <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Mark as read">--}}
{{--                <i class="far fa-circle"></i></button>--}}
{{--            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>--}}
{{--            </button>--}}
{{--            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>--}}
{{--            </button>--}}
{{--        </div>--}}
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
{{--        <img class="img-fluid pad" src="{{ URL::asset('theme/adminlte305/dist/img/photo2.png ') }}" alt="Photo">--}}

        <p>{{ $thread->c_forum_issue }}</p>
        <span class="float-right text-muted">{{ $thread->comments_count }} comments</span>
    </div>
    <!-- /.card-body -->
    <div class="card-footer card-comments">
        @foreach($comments as $c)
            <div class="card-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="{{ URL::asset('theme/adminlte305/dist/img/user3-128x128.jpg ') }}" alt="User Image">

                <div class="comment-text">
                        <span class="username">
                          {{ $c->c_users_fullname }}
                          <span class="text-muted float-right">{{ $c->c_comment_update_time }}</span>
                        </span><!-- /.username -->
                    {{ $c->c_comment_comment }}
                </div>
                <!-- /.comment-text -->
            </div>
            <!-- /.card-comment -->
        @endforeach
    </div>
    <!-- /.card-footer -->
    <div class="card-footer">
        <form action="#" method="post">
            <img class="img-fluid img-circle img-sm" src="{{ URL::asset('theme/adminlte305/dist/img/user4-128x128.jpg ') }}" alt="Alt Text">
            <!-- .img-push is used to add margin to elements next to floating images -->
            <div class="img-push">
                <input type="text" class="form-control form-control-sm" placeholder="Press enter to post comment" name="txt_comment">
            </div>
        </form>
    </div>
    <!-- /.card-footer -->
</div>
<!-- /.card -->