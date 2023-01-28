<div class="box-header with-border">
  <h3 class="box-title">@lang('general.add')</h3>
</div>
<form class="form-horizontal" action="{{url('admin/Category/store')}}" method="post" enctype="multipart/form-data">
  <div class="box-body">
    @csrf
    <div class="form-group">
      <label for="categoryName" class="col-sm-2 control-label">@lang('category.categoryName')</label>
      <div class="col-sm-4">
        <input type="text" name="categoryName" class="form-control" id="categoryName" placeholder="@lang('category.categoryName')" required>
      </div>

      <label for="categoryNameAr" class="col-sm-2 control-label">@lang('category.categoryNameAr')</label>
      <div class="col-sm-4">
        <input type="text" name="categoryNameAr" class="form-control" id="categoryNameAr" placeholder="@lang('category.categoryNameAr')" required>
      </div>
    </div>
    <div class="form-group">
      <label for="categoryImage" class="col-sm-2 control-label">@lang('category.categoryImage')</label>
      <div class="col-sm-4">
        <input type="file" name="categoryImage" class="form-control" placeholder="@lang('category.categoryImage')">
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