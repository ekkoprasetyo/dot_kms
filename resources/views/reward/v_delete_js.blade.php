@csrf
<div class="card-body">
    <input type="text" value="{{ $train->c_train_id }}" name="txt_train_id" hidden="hidden">
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Train Number</label>
        <div class="col-sm-9">
            <input type="text" class="form-control is-warning" value="{{ $train->c_train_number }}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Train Name</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" value="{{ $train->c_train_name }}" readonly>
        </div>
    </div>
</div>