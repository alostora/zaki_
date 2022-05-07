<div class="modal fade" id="items{{$dat->id}}" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">@lang('items.items_details')</h4>
            </div>
            <div class="modal-body">
                @if( isset($dat->order_items) && count($dat->order_items))
                    @foreach($dat->order_items as $item)
                        
                        <div class="box box-solid box-info">
                            <div class="box-header with-border">
                                <i class="fa fa-cart-plus text-default"></i>
                                <h3 class="box-title">
                                    {{$item->item_colors_sizes->name}}
                                    {{$item->item_colors_sizes->color}}
                                    {{$item->item_colors_sizes->size}}
                                </h3>
                            </div>
                            <div class="box-body">
                                <dl class="dl-horizontal">

                                    <dt style="font-size:18px;">@lang('item.item_count')</dt>
                                    <dd style="font-size:18px;">
                                        {{$item->item_count}}
                                    </dd>

                                    <dt style="font-size:18px;">@lang('item.itemPrice')</dt>
                                    <dd style="font-size:18px;">
                                        {{$item->item_colors_sizes->itemPrice}}
                                    </dd>
                                    <hr>
                                    <dt style="font-size:18px;">@lang('item.totalPrice')</dt>
                                    <dd style="font-size:18px;font-weight: bold;">
                                        {{$item->item_colors_sizes->itemPrice * $item->item_count}}
                                    </dd>

                                </dl>
                            </div>
                        </div>
                    @endforeach
                @endif
                <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>