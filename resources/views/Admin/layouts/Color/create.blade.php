<div class="box-header with-border">
    <h3 class="box-title">@lang('general.add')</h3>
</div>
<form class="form-horizontal" action="{{url('admin/Color/store')}}" method="post">
    <div class="box-body">
        @csrf

        <div class="form-group">
            
            <label for="colorName" class="col-sm-2 control-label">@lang('color.colorName')</label>
            <div class="col-sm-4">
                <input type="text" name="colorName" class="form-control" id="colorName" placeholder="@lang('color.colorName')" required>
            </div>
          
            <label for="colorNameAr" class="col-sm-2 control-label">@lang('color.colorNameAr')</label>
            <div class="col-sm-4">
                <input type="text" name="colorNameAr" class="form-control" id="colorNameAr" placeholder="@lang('color.colorNameAr')" required>
            </div>

        </div>

        <div class="form-group">
            
            <label for="colorCode" class="col-sm-2 control-label">@lang('color.colorCode')</label>
            <div class="col-sm-4">
                <input type="color" name="colorCode" class="form-control" id="colorCode" placeholder="@lang('color.colorCode')" required>
            </div>
        </div>
        
    </div>
    <div class="box-footer">
        <input type="submit" class="btn btn-info" value="@lang('general.add')">
    </div>
</form>
