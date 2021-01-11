@csrf
<div class="card-body">
    <div class="form-group row">
        <input type="text" hidden name="txt_knowledge_base_id" value="{{ $knowledge_base->c_knowledge_base_id }}">
        <label class="col-sm-3 col-form-label">Tags</label>
        <div class="col-sm-9">
            <input type="text" class="form-control is-warning" readonly value="{{ $knowledge_base->c_knowledge_base_tags }}">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Title</label>
        <div class="col-sm-9">
            <input type="text" class="form-control is-warning" value="{{ $knowledge_base->c_knowledge_base_title }}" readonly>
        </div>
    </div>
</div>