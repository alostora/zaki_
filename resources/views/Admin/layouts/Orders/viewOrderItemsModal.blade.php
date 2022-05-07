<div class="modal fade" id="items{{$dat->id}}" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Order items details</h4>
            </div>
            <div class="modal-body">
                <div class="box-body" id="box-body">


                    @if( isset($dat->order_items) && count($dat->order_items))
                        
                        @foreach($dat->order_items as $item)
                            <div class="alert alert-default">
                                <div class="alert col-md-4">
                                    @lang('item.itemName')
                                </div>
                                <div class="alert col-md-8">
                                    {{$item->item_colors_sizes->name}}
                                    {{$item->item_colors_sizes->color}}
                                    {{$item->item_colors_sizes->size}}
                                </div>
                            
                                <div class="alert col-md-4">
                                    @lang('item.item_count')
                                </div>
                                <div class="alert col-md-8">
                                    {{$item->item_count}}
                                </div>
                            
                                <div class="alert col-md-4">
                                    @lang('item.itemPrice')
                                </div>
                                <div class="alert col-md-8">
                                    {{$item->item_colors_sizes->itemPrice}}
                                </div>
                           
                                <div class="alert col-md-4">
                                    @lang('item.totalPrice')
                                </div>
                                <div class="alert col-md-8">
                                    {{$item->item_colors_sizes->itemPrice * $item->item_count}}
                                </div>
                            </div>
                        @endforeach
                    @endif





                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
                </div>

            </div>
        </div>
    </div>
</div>