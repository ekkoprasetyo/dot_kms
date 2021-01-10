@csrf
<div class="card-body">
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Abbr</label>
        <div class="col-sm-9">
            <input type="text" class="form-control is-warning" placeholder="DRSP1" name="txt_position_abbr">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Name</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="Dokter RS Pusat 1" name="txt_position_name">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Branch</label>
        <div class="col-sm-9">
            <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="txt_position_branch">
                <option value="">-= Select =-</option>
                @if($branchs->count() > 0)
                    @foreach($branchs as $branch)
                        <option value="{{$branch->c_branch_id}}">{{$branch->c_branch_name}} - ( {{$branch->c_branch_code}} )</option>
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