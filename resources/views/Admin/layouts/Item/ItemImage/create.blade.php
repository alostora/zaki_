<div class="box-header with-border">
    <h3 class="box-title">@lang('general.add')</h3>
</div>
<form class="form-horizontal" action="{{url('admin/Item/ItemImage/store')}}" method="post" enctype="multipart/form-data">
    <div class="box-body">

        @csrf
   
        <input type="hidden" name="item_id" value="{{Request('item')}}">
        
        <div class="form-group">
            <label for="images" class="col-sm-2 control-label">@lang('item_image.images')</label>
            <div class="col-sm-4">
                <input type="file" name="images[]" class="form-control" id="images" placeholder="@lang('item_image.images')" required multiple>
            </div>
        </div>
        
    </div>
    <div class="box-footer">
        <input type="submit" class="btn btn-info" value="@lang('general.add')">
    </div>
</form>
