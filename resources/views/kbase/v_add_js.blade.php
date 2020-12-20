@csrf
<div class="card-body">
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Code</label>
        <div class="col-sm-9">
            <input type="text" class="form-control is-warning" placeholder="TS1" name="txt_trainset_code">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Name</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="Trainset 1" name="txt_trainset_name">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Trainset Member</label>
        <div class="col-sm-9">
            <div class="select2-danger">
                <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" multiple="multiple" style="width: 100%;" data-placeholder="Select a Train Member" name="txt_trainset_member[]">
                    @if($trains->count() > 0)
                        @foreach($trains as $train)
                            <option value="{{$train->c_train_id}}">{{$train->c_train_name}} - ( {{$train->c_train_number}} )</option>
                        @endForeach
                    @else
                        <option value="">No Data</option>
                    @endif
                </select>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2();
    });
</script>