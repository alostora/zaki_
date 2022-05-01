<div class="tab-pane {{empty($data)?'active':''}}" id="itemMainInfoTab">
    
    <form class="form-horizontal" action="{{url('admin/Item/createItem')}}" method="post" >
        <div class="box-body">
            @csrf
            <input type="hidden" name="id" value="{{(!empty($data))?$data->id:''}}">

            <div class="form-group">
                <div class="country_id">
                    <label for="country_id" class="col-sm-2 control-label">@lang('item.country_id')</label>
                    <div class="col-sm-4">
                        <select name="country_id" class="form-control input-lg select2" id="country_id">
                            @if(!empty($countries))
                                @foreach($countries as $country)
                                    <option value="{{$country->id}}" {{!empty($data) && $data->country_id == $country->id ? 'selected':''}} >{{$country->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        <span class="help-block country_id" style="display:none;"></span>
                    </div>
                </div>

                <div class="itemName">
                    <label for="itemName" class="col-sm-2 control-label">@lang('item.itemName')</label>
                    <div class="col-sm-4">
                        <input type="text" name="itemName" class="form-control input-lg" id="itemName" placeholder="@lang('item.itemName')" value="{{(!empty($data)) ? $data->itemName :''}}" required>
                        <span class="help-block itemName" style="display:none;"></span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                
                <div class="sub_cat_id">
                    <label for="sub_cat_id" class="col-sm-2 control-label">@lang('item.sub_cat_id')</label>
                    <div class="col-sm-4">
                        <select name="sub_cat_id" class="form-control input-lg select2" placeholder="@lang('s_category.sub_cat_id')" required id="sub_cat_id" onchange="return getSizes(this.value)">
                            <option value="">@lang('general.choose')</option>
                            @if(!empty($s_categories))
                              @foreach($s_categories as $cat)
                                <option value="{{$cat->id}}" {{!empty($data) && $data->sub_cat_id == $cat->id ? 'selected':''}}>
                                    {{$cat->name}}
                                </option>
                              @endforeach
                            @endif
                        </select>
                        <span class="help-block sub_cat_id" style="display:none;"></span>
                    </div>
                </div>

                <!-- <div class="size_id">
                    <label for="size_id" class="col-sm-2 control-label">@lang('item.size_id')</label>
                    <div class="col-sm-4">
                        <option value="">@lang('general.choose')</option>
                        <select name="size_id[]" class="form-control input-lg select2" id="size_id" multiple>
                            @if(!empty($sizes))
                                @foreach($sizes as $size)
                                    <option value="{{$size->id}}" {{!empty($data) && !empty($selectedSizes) && in_array($size->id, $selectedSizes) ? 'selected' : ''}}>
                                        {{$size->name}}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                        <span class="help-block size_id" style="display:none;"></span>
                    </div>
                </div> -->
            </div>

            <div class="form-group">
                
                <div class="itemPrice">
                    <label for="itemPrice" class="col-sm-2 control-label">@lang('item.itemPrice')</label>
                    <div class="col-sm-4">
                        <input type="number" name="itemPrice" class="form-control input-lg" id="itemPrice" placeholder="@lang('item.itemPrice')" value="{{(!empty($data)) ? $data->itemPrice :''}}" required>
                        <span class="help-block itemPrice" style="display:none;"></span>
                    </div>
                </div>
            

                <div class="itemDiscount">
                    <label for="itemDiscount" class="col-sm-2 control-label">@lang('item.itemDiscount')</label>
                    <div class="col-sm-4">
                        <input type="number" name="itemDiscount" class="form-control input-lg" id="itemDiscount" placeholder="@lang('item.itemDiscount')" value="{{(!empty($data)) ? $data->itemDiscount :''}}">
                        <span class="help-block itemDiscount" style="display:none;"></span>
                    </div>
                </div>
            </div>
                   
            <div class="form-group">

                <div class="color_id">
                    <div class="">
                        @if(!empty($colors))
                            <div id="size_id">
                                @foreach($colors as $color)
                                    @if(!empty($sizes))


                                        <div class="col-md-2">
                                            <div class="box box-default collapsed-box" style="border-top-color: {{$color->colorCode}}">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title"> {{$color->name}}</h3>

                                                    <div class="box-tools pull-right">
                                                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="box-body">
                                                    @foreach($sizes as $size)

                                                        <?php $value = 0; ?>
                                                        @if(!empty($selectedColors))
                                                            @foreach($selectedColors as $selected)
                                                                @if($selected->color_id == $color->id && $selected->size_id ==  $size->id)
                                                                    <?php $value = $selected->qty; ?>
                                                                @endif
                                                            @endforeach
                                                        @endif

                                                    <div class="form-group" style="color: {{$color->colorCode}}">
                                                        <label class="control-label" for="{{$color->id}}"><i class="fa fa-check"></i> {{$size->name}}</label>
                                                        <input type="number" id="{{$color->id}}" class="form-control" name="color_id[{{$color->id}}][{{$size->id}}]" value="{{$value}}">
                                                    </div>

                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

            </div>

            <div class="form-group">
                <div class="itemDesc">
                    <label for="itemDesc" class="col-sm-2 control-label">@lang('item.itemDesc')</label>
                    <div class="col-sm-10">
                        <textarea type="text" name="itemDesc" class="form-control input-lg textarea" placeholder="@lang('item.itemDesc')" required id="itemDesc">{{!empty($data) ? $data->itemDesc : ''}}</textarea>
                        <span class="help-block itemDesc" style="display:none;"></span>
                    </div>
                </div>
            </div>

        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">
                {{empty($data) ? Lang::get('general.add') : Lang::get('general.edit')}}
            </button>
        </div>
    </form>
</div>




<script type="text/javascript">


  function getSizes(sub_cat_id){

    if (sub_cat_id == '') {
        $('#size_id').html('');
        return false;
    }
    $.ajax({
      url:"{{url('admin/Item/getSizes')}}/"+sub_cat_id,
      type:"get",
      success : function(res){
        if (res.status){
          if(res.sizes.length > 0){
            $('#size_id').html('');

            @if(!empty($colors))
                    dropDown = "";

                @foreach($colors as $color)
                    dropDown += 
                    "<div class='col-md-2'>"+
                        "<div class='box box-default collapsed-box color-{{$color->id}}' style='border-top-color: {{$color->colorCode}}'>"+
                            "<div class='box-header with-border'>"+
                                "<h3 class='box-title'> {{$color->name}}</h3>"+

                                "<div class='box-tools pull-right'>"+
                                    "<button type='button' class='btn btn-box-tool' data-widget='collapse' onclick='return openMenu({{$color->id}})'>"+
                                        "<i class='fa fa-plus'></i>"+
                                    "</button>"+
                                "</div>"+
                            "</div>"+
                            "<div class='box-body'>";

                            for (var i =0; i< res.sizes.length; i++) {

                                dropDown += 
                                "<div class='form-group' style='color: {{$color->colorCode}}'>"+
                                    "<label class='control-label' for='{{$color->id}}'><i class='fa fa-check'></i> "+res.sizes[i].name+"</label>"+
                                    "<input type='number' id='{{$color->id}}' class='form-control' name='color_id[{{$color->id}}]["+res.sizes[i].id+"]' value='0'>"+
                                "</div>";
                            }

                    dropDown += "</div></div></div>";
                @endforeach
                $('#size_id').append(dropDown);
            @endif

            //console.log(res);
          }
        }/*else{
          location.href = "{{url('admin/viewCreateSize')}}";
        }*/
      }
    });
}



function openMenu(className){

    if($(".color-"+className).hasClass('collapsed-box')){
        $(".color-"+className).removeClass('collapsed-box');
    }else{
        $(".color-"+className).addClass('collapsed-box');
    }

}


</script>
