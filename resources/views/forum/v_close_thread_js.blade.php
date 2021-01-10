@csrf
<!-- Box Comment -->
<div class="card card-widget">
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
</div>
<!-- /.card -->
<div class="card-body">
    <div class="form-group row">
        <input type="text" value="{{ $thread->c_forum_id}}" name="txt_forum_id" hidden>
        <input type="text" value="{{ $thread->c_forum_update_by}}" name="txt_reward_receiver" hidden>
        <label class="col-sm-3 col-form-label">Tags</label>
        <div class="col-sm-9">
            <input type="text" class="form-control is-warning" value="{{ $thread->c_forum_tags}}" name="txt_kbase_tags" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Title</label>
        <div class="col-sm-9">
            <input type="text" class="form-control is-warning" placeholder="Some Title .." name="txt_kbase_title">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Content</label>
        <div class="col-sm-9">
            <textarea class="textarea" name="txt_kbase_content" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        // Summernote
        $('.textarea').summernote()
    })
</script>