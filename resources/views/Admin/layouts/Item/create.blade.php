<div class="box-header with-border">
    <h3 class="box-title">@lang('general.add')</h3>
</div>
<form class="form-horizontal" action="{{url('admin/Item/store')}}" method="post">
    <div class="box-body">

        @csrf
            
        <div class="form-group">

            <label for="country_id" class="col-sm-2 control-label">@lang('item.country_id')</label>
            <div class="col-sm-4">
                <select name="country_id" class="form-control select2" placeholder="@lang('item.country_id')" required id="country_id">
                    @if(!empty($countries))
                        @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="sub_category_id" class="col-sm-2 control-label">@lang('item.sub_category_id')</label>
            <div class="col-sm-4">
                <select name="sub_category_id" class="form-control select2" placeholder="@lang('item.sub_category_id')" required id="sub_category_id">
                    @if(!empty($sub_categories))
                        @foreach($sub_categories as $sub_category)
                            <option value="{{$sub_category->id}}">{{$sub_category->name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

        </div>
   
        <div class="form-group">
            <label for="itemName" class="col-sm-2 control-label">@lang('item.itemName')</label>
            <div class="col-sm-4">
                <input type="text" name="itemName" class="form-control" id="itemName" placeholder="@lang('item.itemName')" required>
            </div>

            <label for="itemNameAr" class="col-sm-2 control-label">@lang('item.itemNameAr')</label>
            <div class="col-sm-4">
                <input type="text" name="itemNameAr" class="form-control" id="itemNameAr" placeholder="@lang('item.itemNameAr')" required>
            </div>
        </div>

        <div class="form-group">
            <label for="itemDesc" class="col-sm-2 control-label">@lang('item.itemDesc')</label>
            <div class="col-sm-4">
                <input type="text" name="itemDesc" class="form-control" id="itemDesc" placeholder="@lang('item.itemDesc')" required>
            </div>

            <label for="itemDescAr" class="col-sm-2 control-label">@lang('item.itemDescAr')</label>
            <div class="col-sm-4">
                <input type="text" name="itemDescAr" class="form-control" id="itemDescAr" placeholder="@lang('item.itemDescAr')" required>
            </div>
        </div>

        <div class="form-group">
            <label for="itemPrice" class="col-sm-2 control-label">@lang('item.itemPrice')</label>
            <div class="col-sm-4">
                <input type="number" name="itemPrice" class="form-control" id="itemPrice" placeholder="@lang('item.itemPrice')" required>
            </div>

            <label for="itemCount" class="col-sm-2 control-label">@lang('item.itemCount')</label>
            <div class="col-sm-4">
                <input type="number" name="itemCount" class="form-control" id="itemCount" placeholder="@lang('item.itemCount')" required>
            </div>
        </div>

        <div class="form-group">
            <label for="itemDiscount" class="col-sm-2 control-label">@lang('item.itemDiscount')</label>
            <div class="col-sm-4">
                <input type="number" name="itemDiscount" class="form-control" id="itemDiscount" placeholder="@lang('item.itemDiscount')" required>
            </div>
        </div>
        
    </div>
    <div class="box-footer">
        <input type="submit" class="btn btn-info" value="@lang('general.add')">
    </div>
</form>
