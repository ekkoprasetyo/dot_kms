@csrf
<div class="card-body">
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Tags</label>
        <div class="col-sm-9">
            <input type="text" class="form-control is-warning" value="{{ $knowledge_base->c_knowledge_base_tags }}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Title</label>
        <div class="col-sm-9">
            <input type="text" class="form-control is-warning" value="{{ $knowledge_base->c_knowledge_base_title }}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Content</label>
        <div class="col-sm-9">
            <textarea class="textarea" name="txt_knowledge_base_content" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $knowledge_base->c_knowledge_base_content }}</textarea>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Update By</label>
        <div class="col-sm-9">
            <input type="text" class="form-control is-warning" value="{{ $knowledge_base->c_users_fullname }}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Update Time</label>
        <div class="col-sm-9">
            <input type="text" class="form-control is-warning" value="{{ $knowledge_base->c_knowledge_base_update_time }}" readonly>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        // Summernote
        $('.textarea').summernote('disable')
    })
</script>