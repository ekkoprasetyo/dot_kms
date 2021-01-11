@csrf
<div class="card-body">
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Tags</label>
        <div class="col-sm-9">
            <input type="text" class="form-control is-warning" value="{{ $knowledge_document->c_knowledge_document_tags }}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Title</label>
        <div class="col-sm-9">
            <input type="text" class="form-control is-warning" value="{{ $knowledge_document->c_knowledge_document_title }}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Content</label>
        <div class="col-sm-9">
            <div id="results" class="hidden"></div>
            <div id="pdf" style="height: 400px"></div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Update By</label>
        <div class="col-sm-9">
            <input type="text" class="form-control is-warning" value="{{ $knowledge_document->c_users_fullname }}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Update Time</label>
        <div class="col-sm-9">
            <input type="text" class="form-control is-warning" value="{{ $knowledge_document->c_knowledge_document_update_time }}" readonly>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        PDFObject.embed("{{ env('PREVIEW_DOCUMENT').$knowledge_document->c_knowledge_document_document }}", "#pdf");
    })
</script>