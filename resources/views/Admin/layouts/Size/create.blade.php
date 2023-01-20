<div class="box-header with-border">
    <h3 class="box-title">@lang('general.add')</h3>
</div>
<form class="form-horizontal" action="{{url('admin/Size/store')}}" method="post">
    <div class="box-body">
        @csrf
        <div class="form-group">
            <label for="sizeName" class="col-sm-2 control-label">@lang('size.sizeName')</label>
            <div class="col-sm-4">
                <input type="text" name="sizeName" class="form-control" id="sizeName" placeholder="@lang('size.sizeName')" required>
            </div>
          
            <label for="sizeNameAr" class="col-sm-2 control-label">@lang('size.sizeNameAr')</label>
            <div class="col-sm-4">
                <input type="text" name="sizeNameAr" class="form-control" placeholder="@lang('size.sizeNameAr')" required id="sizeNameAr">
            </div>

        </div>
        <div class="form-group">
            <label for="sizeValue" class="col-sm-2 control-label">@lang('size.sizeValue')</label>
            <div class="col-sm-4">
                <input type="text" name="sizeValue" class="form-control" id="sizeValue" placeholder="@lang('size.sizeValue')" required>
            </div>
            
            <label for="type_id" class="col-sm-2 control-label">@lang('size.type_id')</label>
            <div class="col-sm-4">
                <select name="type_id" class="form-control select2" required id="type_id">
                    <option value="">@lang('general.choose')</option>
                    @if(!empty($types))
                      @foreach($types as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                      @endforeach
                    @endif
                </select>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <input type="submit" class="btn btn-info" value="@lang('general.add')">
    </div>
</form>
