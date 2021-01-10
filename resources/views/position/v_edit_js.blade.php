@csrf
<div class="card-body">
    <input type="text" value="{{ $position->c_position_id }}" name="txt_position_id" hidden="hidden">
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Abbr</label>
        <div class="col-sm-9">
            <input type="text" class="form-control is-warning" value="{{ $position->c_position_abbr }}" name="txt_position_abbr">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Name</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" value="{{ $position->c_position_name }}" name="txt_position_name">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Branch</label>
        <div class="col-sm-9">
            <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="txt_position_branch">
                <option value="">-= Select =-</option>
                @if($branchs->count() > 0)
                    @foreach($branchs as $branch)
                        <option value="{{$branch->c_branch_id}}" {{ $position->c_position_branch == $branch->c_branch_id ? 'selected="selected"' : '' }}>{{$branch->c_branch_name}} - ( {{$branch->c_branch_code}} )</option>
                    @endForeach
                @else
                    <option value="">No Data</option>
                @endif
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