@csrf
<div class="card-body">
    <input type="text" value="{{ $branch->c_branch_id }}" name="txt_branch_id" hidden>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Code</label>
        <div class="col-sm-9">
            <input type="text" class="form-control is-warning" value="{{ $branch->c_branch_code }}" name="txt_branch_code">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Name</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" value="{{ $branch->c_branch_name }}" name="txt_branch_name">
        </div>
    </div>
</div>