<div class="box-header with-border">
  <h3 class="box-title">@lang('general.edit')</h3>
</div>
<form class="form-horizontal" action="{{url('admin/Category/update/'.$data->id)}}" method="post" enctype="multipart/form-data">
  <div class="box-body">
    @csrf
    @method("PATCH")
    <input type="hidden" name="id" value="{{$data->id}}">
    <div class="form-group">
      <label for="categoryName" class="col-sm-2 control-label">@lang('category.categoryName')</label>
      <div class="col-sm-4">
        <input type="text" name="categoryName" class="form-control" id="categoryName" value="{{$data->categoryName}}" required>
      </div>

      <label for="categoryNameAr" class="col-sm-2 control-label">@lang('category.categoryNameAr')</label>
      <div class="col-sm-4">
        <input type="text" name="categoryNameAr" class="form-control" id="categoryNameAr" value="{{$data->categoryNameAr}}" required>
      </div>
    </div>
    <div class="form-group">
      <label for="categoryImage" class="col-sm-2 control-label">@lang('category.categoryImage')</label>
      <div class="col-sm-4">
        <input type="file" name="categoryImage" class="form-control" placeholder="@lang('category.categoryImage')">
        @if(!empty($data) && !empty($data->categoryImage))
        {!! $data->image_url !!}
        @endif
      </div>

      <label for="type_id" class="col-sm-2 control-label">@lang('size.type_id')</label>
      <div class="col-sm-4">
        <?php $type_id = !empty($data) ? $data->type_id : ''; ?>
        <select name="type_id" class="form-control select2" required id="type_id">
          <option value="">@lang('general.choose')</option>
          @if(!empty($types))
            @foreach($types as $type)
              <option value="{{$type->id}}" {{$type_id == $type->id ? 'selected' : ''}}>{{$type->name}}</option>
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