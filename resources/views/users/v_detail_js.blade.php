@csrf
<div class="card-body">
    <input type="text" value="{{ $user->c_users_id }}" name="txt_users_id" hidden="hidden">
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">NIP</label>
        <div class="col-sm-9">
            <input type="text" class="form-control is-warning" value="{{ $user->c_users_nip }}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Fullname</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" value="{{ $user->c_users_fullname }}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">E-Mail</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" value="{{ $user->c_users_email }}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Role</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" value="{{ $user->c_role_display }}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Position</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" value="{{ $user->c_position_name }} - {{ $user->c_position_abbr }}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Branch</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" value="{{ $user->c_branch_name }} - {{ $user->c_branch_code }}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Status</label>
        <div class="col-sm-9">
            {!! $user->c_users_status == 1 ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-warning">Inactive</span>' !!}
        </div>
    </div>
</div>
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2();
    });
</script>