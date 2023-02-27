<div class="box-header with-border">
    <h3 class="box-title">@lang('general.edit')</h3>
</div>
<form class="form-horizontal" action="{{url('admin/Item/update/'.$data->id)}}" method="post">
    <div class="box-body">
        @csrf
        @method("PATCH")
        
        <input type="hidden" name="id" value="{{$data->id}}">
        <div class="form-group">

            <label for="country_id" class="col-sm-2 control-label">@lang('item.country_id')</label>
            <div class="col-sm-4">
                <select name="country_id" class="form-control select2" required id="country_id">
                    @if(!empty($countries))
                        @foreach($countries as $country)
                            <option value="{{$country->id}}" {{$country->id == $data->country_id?"selected":""}} >
                                {{$country->name}}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="sub_category_id" class="col-sm-2 control-label">@lang('item.sub_category_id')</label>
            <div class="col-sm-4">
                <select name="sub_category_id" class="form-control select2" required id="sub_category_id">
                    @if(!empty($sub_categories))
                        @foreach($sub_categories as $sub_category)
                            <option value="{{$sub_category->id}}" {{$sub_category->id == $data->sub_category_id?"selected":""}} >
                                {{$sub_category->name}}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>

        </div>

        <div class="form-group">
            <label for="itemName" class="col-sm-2 control-label">@lang('main_type.itemName')</label>
            <div class="col-sm-4">
                <input type="text" name="itemName" class="form-control" id="itemName" value="{{$data->itemName}}" required>
            </div>

            <label for="itemNameAr" class="col-sm-2 control-label">@lang('main_type.itemNameAr')</label>
            <div class="col-sm-4">
                <input type="text" name="itemNameAr" class="form-control" value="{{$data->itemNameAr}}" required id="itemNameAr">
            </div>
        </div>
        
        <div class="form-group">
            <label for="itemDesc" class="col-sm-2 control-label">@lang('item.itemDesc')</label>
            <div class="col-sm-4">
                <input type="text" name="itemDesc" class="form-control" id="itemDesc" value="{{$data->itemDesc}}" required>
            </div>

            <label for="itemDescAr" class="col-sm-2 control-label">@lang('item.itemDescAr')</label>
            <div class="col-sm-4">
                <input type="text" name="itemDescAr" class="form-control" id="itemDescAr" value="{{$data->itemDescAr}}" required>
            </div>
        </div>

        <div class="form-group">
            <label for="itemPrice" class="col-sm-2 control-label">@lang('item.itemPrice')</label>
            <div class="col-sm-4">
                <input type="text" name="itemPrice" class="form-control" id="itemPrice" value="{{$data->itemPrice}}" required>
            </div>

            <label for="itemCount" class="col-sm-2 control-label">@lang('item.itemCount')</label>
            <div class="col-sm-4">
                <input type="text" name="itemCount" class="form-control" id="itemCount" value="{{$data->itemCount}}" required>
            </div>
        </div>

        <div class="form-group">
            <label for="itemDiscount" class="col-sm-2 control-label">@lang('item.itemDiscount')</label>
            <div class="col-sm-4">
                <input type="text" name="itemDiscount" class="form-control" id="itemDiscount" value="{{$data->itemDiscount}}" required>
            </div>
        </div>

    </div>
    <div class="box-footer">
        <input type="submit" class="btn btn-info" value="@lang('general.edit')">
    </div>
</form>