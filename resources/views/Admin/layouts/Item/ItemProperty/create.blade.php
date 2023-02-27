<div class="box-header with-border">
    <h3 class="box-title">@lang('general.add')</h3>
</div>
<form class="form-horizontal" action="{{url('admin/Item/ItemProperty/store')}}" method="post">
    <div class="box-body">

        @csrf
   
        <input type="hidden" name="item_id" value="{{Request('item')}}">

        <div class="form-group">
            <label for="quantity" class="col-sm-2 control-label">@lang('item.quantity')</label>
            <div class="col-sm-4">
                <input type="number" class="form-control" name="quantity" id="quantity" value="1" require>
            </div>
        </div>
        
        <div class="form-group">

            <label for="size_id" class="col-sm-2 control-label">@lang('item.size_id')</label>

            <div class="col-sm-4">
                <select name="size_id" class="form-control select2" id="size_id" required>
                    @if(!empty($sizes))
                        @foreach($sizes as $size)
                            <option value="{{$size->id}}">{{$size->name}}</option>
                        @endforeach 
                    @endif
                </select>
            </div>
       
            <label for="color_id" class="col-sm-2 control-label">@lang('item.color_id')</label>
            <div class="col-sm-4">
                <select name="color_id" class="form-control select2" id="color_id" required>
                    @if(!empty($colors))
                        @foreach($colors as $color)
                            <option value="{{$color->id}}">
                                <span>{{$color->name}}</span>
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
