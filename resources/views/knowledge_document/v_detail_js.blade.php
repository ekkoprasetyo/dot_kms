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
        <label class="col-sm-3 col-form-label">Share to</label>
        <div class="col-sm-9">
            <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;"  disabled>
                <option value="">-= Select =-</option>
                <option value="Public" {{ $knowledge_document->c_knowledge_document_share == 'Public' ? 'selected="selected"' : '' }}>Public</option>
                <option value="Professional" {{ $knowledge_document->c_knowledge_document_share == 'Professional' ? 'selected="selected"' : '' }}>Professional</option>
            </select>
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