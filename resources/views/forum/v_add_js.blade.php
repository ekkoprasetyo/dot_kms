@csrf
<div class="card-body">
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Problems or Issue</label>
        <div class="col-sm-9">
            <input type="text" class="form-control is-warning" placeholder="say something .." name="txt_train_number">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Tags</label>
        <div class="col-sm-9">
            <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="txt_users_position">
                <option value="">-= Select =-</option>
                <option value="">Head</option>
                <option value="">Body</option>
                <option value="">Torso</option>
            </select>
        </div>
    </div>
</div>
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2();
    });
</script>