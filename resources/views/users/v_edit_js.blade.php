@csrf
<div class="card-body">
    <input type="text" value="{{ $user->c_users_id }}" name="txt_users_id" hidden>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">NIP</label>
        <div class="col-sm-9">
            <input type="text" class="form-control is-warning" value="{{ $user->c_users_nip }}" name="txt_users_nip">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Fullname</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" value="{{ $user->c_users_fullname }}" name="txt_users_fullname">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">E-Mail</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" value="{{ $user->c_users_email }}" name="txt_users_email">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Position</label>
        <div class="col-sm-9">
            <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="txt_users_position">
                <option value="">-= Select =-</option>
                @if($positions->count() > 0)
                    @foreach($positions as $position)
                        <option value="{{ $position->c_position_id }}"
                                @foreach($used_position as $up)
                                @if ($up->c_users_position == $position->c_position_id)
                                    {{ $position->c_position_id == $user->c_users_position ? 'selected="selected"' : 'disabled' }} > {{ $position->c_position_name }} - {{ $position->c_position_abbr }} ( {{ $up->c_users_fullname }} - {{ $up->c_users_nip }} )</option>
                        @endif
                    @endforeach > {{ $position->c_position_name }} - {{ $position->c_position_abbr }}</option>
                    @endForeach
                @else
                    <option value="">No Data</option>
                @endif
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Role</label>
        <div class="col-sm-9">
            <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="txt_users_role" id="select-role">
                <option value="">-= Select =-</option>
                @if($roles->count() > 0)
                    @foreach($roles as $role)
                        <option value="{{ $role->c_role_id }}" {{ $user->c_users_role == $role->c_role_id ? 'selected' : '' }}>{{$role->c_role_display}} - {{$role->c_role_name}}</option>
                    @endForeach
                @else
                    <option value="">No Data</option>
                @endif
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Status</label>
        <div class="col-sm-9">
            <select class="form-control select2" name="txt_users_status">
                <option value="">-= Select =-</option>
                <option value="1" {{ $user->c_users_status == "1" ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $user->c_users_status == "0" ? 'selected' : '' }}>Inactive</option>
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