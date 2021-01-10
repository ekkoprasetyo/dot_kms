@csrf
<div class="card-body">
    <input type="text" value="{{ $forum->c_forum_id }}" name="txt_forum_id" hidden="hidden">
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Issue</label>
        <div class="col-sm-9">
            <input type="text" class="form-control is-warning" value="{{ $forum->c_forum_issue }}" name="txt_forum_issue">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Tags</label>
        <div class="col-sm-9">
            <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="txt_forum_tags">
                <option value="">-= Select =-</option>
                <option value="Head" {{ $forum->c_forum_tags == 'Head' ? 'selected="selected"' : '' }}>Head</option>
                <option value="Body" {{ $forum->c_forum_tags == 'Body' ? 'selected="selected"' : '' }}>Body</option>
                <option value="Torso" {{ $forum->c_forum_tags == 'Torso' ? 'selected="selected"' : '' }}>Torso</option>
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