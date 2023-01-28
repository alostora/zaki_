<div class="box-header with-border">
    <h3 class="box-title">@lang('general.add')</h3>
</div>
<form class="form-horizontal" action="{{url('admin/SubCategory/store')}}" method="post" enctype="multipart/form-data">
    <div class="box-body">
      @csrf
      <div class="form-group">
          <label for="subCategoryName" class="col-sm-2 control-label">@lang('subCategory.subCategoryName')</label>
          <div class="col-sm-4">
              <input type="text" name="subCategoryName" class="form-control" id="subCategoryName" placeholder="@lang('subCategory.subCategoryName')" required>
          </div>
        
          <label for="subCategoryNameAr" class="col-sm-2 control-label">@lang('subCategory.subCategoryNameAr')</label>
          <div class="col-sm-4">
              <input type="text" name="subCategoryNameAr" class="form-control" id="subCategoryNameAr" placeholder="@lang('subCategory.subCategoryNameAr')" required>
          </div>
      </div>
      <div class="form-group">
          <label for="subCategoryImage" class="col-sm-2 control-label">@lang('subCategory.subCategoryImage')</label>
          <div class="col-sm-4">
              <input type="file" name="subCategoryImage" class="form-control" placeholder="@lang('subCategory.subCategoryImage')" >
          </div>

          <label for="category_id" class="col-sm-2 control-label">@lang('subCategory.category_id')</label>
          <div class="col-sm-4">
              <select name="category_id" class="form-control select2" placeholder="@lang('subCategory.category_id')" required id="category_id">
                @if(!empty($categories))
                  @foreach($categories as $category)
                    <option value="{{$category->id}}">
                      {{$category->name}}
                    </option>
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
  