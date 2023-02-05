<div class="box-header with-border">
    <h3 class="box-title">@lang('general.edit')</h3>
</div>
<form class="form-horizontal" action="{{url('admin/Brand/update/'.$data->id)}}" method="post" enctype="multipart/form-data">
    <div class="box-body">
      @csrf
      @method("PATCH")
      <input type="hidden" name="id" value="{{$data->id}}">
      <div class="form-group">
          <label for="brandName" class="col-sm-2 control-label">@lang('brand.brandName')</label>
          <div class="col-sm-4">
              <input type="text" name="brandName" class="form-control" id="brandName" value="{{$data->brandName}}" required>
          </div>
        
          <label for="brandNameAr" class="col-sm-2 control-label">@lang('brand.brandNameAr')</label>
          <div class="col-sm-4">
              <input type="text" name="brandNameAr" class="form-control" id="brandNameAr" value="{{$data->brandNameAr}}" required>
          </div>
      </div>
      <div class="form-group">
          <label for="brandImage" class="col-sm-2 control-label">@lang('brand.brandImage')</label>
          <div class="col-sm-4">
              <input type="file" name="brandImage" class="form-control" placeholder="@lang('brand.brandImage')" >
              @if(!empty($data) && !empty($data->brandImage)) 
                <img src="{{url('Admin_uploads/brands/'.$data->brandImage)}}" style="height:100px;width:100px"> 
              @endif
          </div>
      </div>
    </div>
    <div class="box-footer">
        <input type="submit" class="btn btn-info" value="@lang('general.edit')">
    </div>
</form>
  