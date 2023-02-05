<div class="box-header with-border">
    <h3 class="box-title">@lang('general.edit')</h3>
</div>
<form class="form-horizontal" action="{{url('admin/Color/update/'.$data->id)}}" method="post">
    <div class="box-body">
        @csrf
        @method("PATCH")

        <input type="hidden" name="id" value="{{$data->id}}">
        
        <div class="form-group">
            <label for="colorName" class="col-sm-2 control-label">@lang('color.colorName')</label>
            <div class="col-sm-4">
                <input type="text" name="colorName" class="form-control" id="colorName" value="{{$data->colorName}}" required>
            </div>
          
            <label for="colorNameAr" class="col-sm-2 control-label">@lang('color.colorNameAr')</label>
            <div class="col-sm-4">
                <input type="text" name="colorNameAr" class="form-control" id="colorNameAr" value="{{$data->colorNameAr}}" required>
            </div>
        </div>

        <div class="form-group">
            
            <label for="colorCode" class="col-sm-2 control-label">@lang('color.colorCode')</label>
            <div class="col-sm-4">
                <input type="color" name="colorCode" class="form-control" id="colorCode" value="{{$data->colorCode}}" required>
            </div>
        </div>
        
    </div>
    <div class="box-footer">
        <input type="submit" class="btn btn-info" value="@lang('general.edit')">
    </div>
</form>
