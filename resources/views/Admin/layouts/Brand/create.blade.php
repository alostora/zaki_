<div class="box-header with-border">
    <h3 class="box-title">@lang('general.add')</h3>
</div>
<form class="form-horizontal" action="{{url('admin/Brand/store')}}" method="post" enctype="multipart/form-data">
    <div class="box-body">
      @csrf
      <div class="form-group">
          <label for="brandName" class="col-sm-2 control-label">@lang('brand.brandName')</label>
          <div class="col-sm-4">
              <input type="text" name="brandName" class="form-control" id="brandName" placeholder="@lang('brand.brandName')" required>
          </div>
        
          <label for="brandNameAr" class="col-sm-2 control-label">@lang('brand.brandNameAr')</label>
          <div class="col-sm-4">
              <input type="text" name="brandNameAr" class="form-control" id="brandNameAr" placeholder="@lang('brand.brandNameAr')" required>
          </div>
      </div>
      <div class="form-group">
          <label for="brandImage" class="col-sm-2 control-label">@lang('brand.brandImage')</label>
          <div class="col-sm-4">
              <input type="file" name="brandImage" class="form-control" placeholder="@lang('brand.brandImage')" >
          </div>
      </div>
    </div>
    <div class="box-footer">
        <input type="submit" class="btn btn-info" value="@lang('general.add')">
    </div>
</form>
  