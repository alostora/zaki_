<div class="box-header with-border">
    <h3 class="box-title">@lang('general.edit')</h3>
</div>
<form class="form-horizontal" action="{{url('admin/Size/update/'.$data->id)}}" method="post">
    
<div class="box-body">
        @csrf
        @method("PATCH")
        <input type="hidden" name="id" value="{{$data->id}}">
        <div class="form-group">
            <label for="sizeName" class="col-sm-2 control-label">@lang('size.sizeName')</label>
            <div class="col-sm-4">
                <input type="text" name="sizeName" class="form-control" id="sizeName" placeholder="@lang('size.sizeName')" value="{{$data->sizeName}}" required>
            </div>
            <label for="sizeNameAr" class="col-sm-2 control-label">@lang('size.sizeNameAr')</label>
            <div class="col-sm-4">
                <input type="text" name="sizeNameAr" class="form-control" placeholder="@lang('size.sizeNameAr')" value="{{$data->sizeNameAr}}" required id="sizeNameAr">
            </div>
        </div>
        <div class="form-group">
            <label for="sizeValue" class="col-sm-2 control-label">@lang('size.sizeValue')</label>
            <div class="col-sm-4">
                <input type="text" name="sizeValue" class="form-control" id="sizeValue" placeholder="@lang('size.sizeValue')" value="{{$data->sizeValue}}" required>
            </div>
            <label for="main_type_id" class="col-sm-2 control-label">@lang('size.main_type_id')</label>
            <div class="col-sm-4">
                <?php $main_type_id = !empty($data) ? $data->main_type_id : ''; ?>
                <select name="main_type_id" class="form-control select2" required id="main_type_id">
                    <option value="">@lang('general.choose')</option>
                    @if(!empty($types))
                        @foreach($types as $type)
                            <option value="{{$type->id}}" {{$main_type_id == $type->id ? 'selected' : ''}}>{{$type->name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <input type="submit" class="btn btn-info" value="@lang('general.edit')">
    </div>
</form>