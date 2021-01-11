@csrf
<div class="card-body">
    <div class="form-group row">
        <input type="text" hidden name="txt_knowledge_base_id" value="{{ $knowledge_base->c_knowledge_base_id }}">
        <label class="col-sm-3 col-form-label">Tags</label>
        <div class="col-sm-9">
            <input type="text" class="form-control is-warning" name="txt_knowledge_base_tags" value="{{ $knowledge_base->c_knowledge_base_tags }}">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Title</label>
        <div class="col-sm-9">
            <input type="text" class="form-control is-warning" value="{{ $knowledge_base->c_knowledge_base_title }}" name="txt_knowledge_base_title">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Content</label>
        <div class="col-sm-9">
            <textarea class="textarea" name="txt_knowledge_base_content" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $knowledge_base->c_knowledge_base_content }}</textarea>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        // Summernote
        $('.textarea').summernote()
    })
</script>