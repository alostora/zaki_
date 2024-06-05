@if(!empty($data))
    <!-- edit -->
    @if(!empty($order_itemss))
        @foreach($order_itemss as $key=>$orderItem)
            <div>
                <div class="box box-primary direct-chat direct-chat-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang("order.addToCart")</h3>
                        <div class="box-tools pull-right">
                            <a type="button" class="btn btn-box-tool btn-success btn-sm" onclick="return newItem();"><i class="fa fa-cart-plus"></i></a>
                            @if($key>0)
                            <button type="button" id="{{$orderItem->id.$key}}" onclick="return removeItem(this.id);" class="btn btn-box-tool btn-warning btn-sm"><i class="fa fa-trash"></i>
                            </button>
                            @endif
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="item_color_id{{$orderItem->id}}" class="col-sm-2 control-label">
                                @lang('order.item_color_id')
                            </label>
                            <div class="col-sm-4">
                                <select id="item_color_id{{$orderItem->id.$key}}" type="text" name="item_color_id[]" class="form-control itemPrice{{$orderItem->id.$key}} item_count{{$orderItem->id.$key}} totalPrice{{$orderItem->id.$key}} select2" onchange="return getPriceAppended(this.value,this.className);">
                                    <option value="">choose item</option>
                                    @if(!empty($items))
                                        @foreach($items as $item)
                                            <optgroup label="{{$item->name}}">
                                                @if(count($item->itemProperties))
                                                    @foreach($item->itemProperties as $property)
                                                        <?php
                                                            $selected = $orderItem->property == $property->id ? 'selected' : ''; 
                                                        ?>
                                                        <option value="{{$property->id}}" {{$selected}}>
                                                            {{$item->name}} {{$property->size->name}} {{$property->color->name}}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </optgroup>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <label for="itemPrice" class="col-sm-2 control-label">
                                @lang('order.itemPrice')
                            </label>
                            <div class="col-sm-4">
                                <input id="itemPrice{{$orderItem->id.$key}}" type="number" class="form-control" placeholder="@lang('order.itemPrice')" value="" required readonly>
                            </div>

                        </div>
                        
                        <div class="form-group">
                            <label for="item_count{{$orderItem->id.$key}}" class="col-sm-2 control-label">
                                @lang("order.item_count")
                            </label>
                            <div class="col-sm-4">
                            <input id="item_count{{$orderItem->id.$key}}" class="form-control totalPrice{{$orderItem->id.$key}} itemPrice{{$orderItem->id.$key}} item_color_id{{$orderItem->id.$key}}" onkeyup="return totalPriceeAppended(this.value,this.className,this.id);" type="number" name="item_count[]" placeholder="@lang('order.item_count')" required value="{{$orderItem->item_count}}">
                            </div>

                            <label for="totalPrice{{$orderItem->id.$key}}" class="col-sm-2 control-label">
                                @lang('order.totalPrice')
                            </label>
                            <div class="col-sm-4">
                                <input id="totalPrice{{$orderItem->id.$key}}" type="number" class="form-control totalPrice" placeholder="@lang('order.totalPrice')" readonly value="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    <!-- edit -->
@else
<!-- add -->
    <div>
        <div class="box box-primary direct-chat direct-chat-primary">
            <div class="box-header with-border">
                <h3 class="box-title">@lang("order.addToCart")</h3>
                <div class="box-tools pull-right">
                    <a type="button" class="btn btn-box-tool btn-success btn-sm" onclick="return newItem();">
                        <i class="fa fa-cart-plus"></i>
                    </a>
                </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="item_color_id" class="col-sm-2 control-label">
                        @lang('order.item_color_id')
                    </label>
                    <div class="col-sm-4">
                        <select id="item_color_id" type="text" name="item_color_id[]" class="form-control select2" onchange="return getPrice(this);" required>
                            <option value="">choose item</option>
                            @if(!empty($items))
                                @foreach($items as $item)
                                    <optgroup label="{{$item->name}}">
                                        @if(count($item->itemProperties))
                                            @foreach($item->itemProperties as $item_color_id)
                                                <option value="{{$item_color_id->id}}">
                                                    {{$item->name}} {{$item_color_id->size->name}} {{$item_color_id->color->name}}
                                                </option>
                                            @endforeach
                                        @endif
                                    </optgroup>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <label for="itemPrice" class="col-sm-2 control-label">
                        @lang('order.itemPrice')
                    </label>
                    <div class="col-sm-4">
                        <input id="itemPrice" type="number" class="form-control" placeholder="@lang('order.itemPrice')" value="" required readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="item_count" class="col-sm-2 control-label">
                        @lang('order.item_count')
                    </label>
                    <div class="col-sm-4">
                        <input id="item_count" onkeyup="return totalPricee(this.value);" type="number" name="item_count[]" class="form-control" placeholder="@lang('order.item_count')" value="" required>
                    </div>


                    <label for="totalPrice" class="col-sm-2 control-label">
                        @lang('order.totalPrice')
                    </label>
                    <div class="col-sm-4">
                        <input id="totalPrice" type="number" class="form-control totalPrice" placeholder="@lang('order.totalPrice')" readonly >
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- add -->
@endif
<div id="addNewItem"></div>
<div class="form-group">
    <div class="col-sm-6">
        <label for="totalAllPrice" class="col-sm-4 control-label">
          @lang('order.totalAllPrice')
        </label>
        <div class="col-sm-8">
          <input id="totalAllPrice" name="total_price" type="number" class="form-control" placeholder="@lang('order.totalAllPrice')" readonly>
        </div>
    </div>
</div>