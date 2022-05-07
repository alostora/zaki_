

<script type="text/javascript">

    function userInfo(user_id) {
        console.log("{{url('admin/Order/getUser')}}/"+user_id);
        $.ajax({
            url:"{{url('admin/Order/getUser')}}/"+user_id,
            type:"get",
            success : function(res){
                if (res.status){
                    console.log(res.user);
                    $("#modal-default").modal('show');
                    $("#id").val(res.user.id);
                    $("#name").val(res.user.name);
                    $("#phone").val(res.user.phone);
                    $("#city_id").select2().val(res.user.city_id).trigger("change");
                    $("#shippingAddress").text(res.user.shippingAddress);
                }
            }
        });
    }





    function emptyModal(){
        $("#id").val('');
        $("#name").val('');
        $("#phone").val('');
        $("#city_id").select2().val('').trigger("change");
        $("#shippingAddress").text('');
    }





    function getPrice(e) {
        item_id = e.value;
        if(item_id == ""){
          $("#itemPrice").val(0);
          $("#item_count").val(0);
          $("#totalPrice").val(0);
          return false;
        }
        
        $.ajax({
            url: "{{url('admin/Order/oneItemInfo')}}"+"/"+item_id,
            cache: false,
            success: function(result){
                $("#itemPrice").val(result.itemPrice);
                itemPrice = result.itemPrice;


                item_counta = $("#item_count");

                item_count = parseInt(item_counta.val());
                item_count = item_count > 0 ? item_count : 1;

                item_counta.val(item_count);

                $("#totalPrice").val(itemPrice * item_count);

                calcTotalAllPrice();

            }
        });
    }





    function totalPricee(item_count){

        if(item_count != "" && item_count != null && item_count != 0){
            item_id = $("#item_color_id").val();
            $.ajax({
                url: "{{url('admin/Order/oneItemInfo')}}"+"/"+item_id,
                cache: false,
                success: function(result){
                  if(parseInt(result.item_count) < parseInt(item_count)){

                    alert("@lang('order.stock has low value from this product') "+ result.item_count);
                    $("#totalAllPrice").val($("#totalAllPrice").val() - $('#totalPrice').val())
                    $('#item_count').val(0);
                    $('#totalPrice').val(0);
                    return false;
                  }

                }
            });

            var itemPrice = $("#itemPrice").val();
              totalPrice = item_count * itemPrice;
            $("#totalPrice").val(totalPrice);

            calcTotalAllPrice();
        }
    }





    var counter = 0;
    function newItem(){
        counter++;
        //alert(counter);
        $("#addNewItem").append(
            '<div>'+
                '<div class="box box-primary direct-chat direct-chat-primary">'+
                    '<div class="box-header with-border">'+
                        '<h3 class="box-title">@lang("order.addToCart")</h3>'+
                        '<div class="box-tools pull-right">'+
                            '<button type="button" id="'+counter+'" onclick="return removeItem(this.id);" class="btn btn-box-tool btn-warning btn-sm"><i class="fa fa-trash"></i></button>'+
                            '<button type="button" onclick="return newItem();" class="btn btn-box-tool btn-success btn-sm"><i class="fa fa-cart-plus"></i></button>'+
                        '</div>'+
                    '</div>'+
                    '<div class="box-body" style="">'+
                        '<div class="form-group">'+
                            '<label for="item_color_id" class="col-sm-2 control-label">'+
                              '@lang("order.item_color_id")'+
                            '</label>'+
                            '<div class="col-sm-4">'+
                                '<select id="item_color_id'+counter+'" type="text" name="item_color_id[]" class="form-control itemPrice'+counter+' item_count'+counter+' totalPrice'+counter+'" onchange="return getPriceAppended(this.value,this.className);" required>'+
                                    '<option value="">choose item</option>'+
                                    '@if(!empty($items))'+
                                        '@foreach($items as $item)'+
                                            '<optgroup label="{{$item->name}}">'+
                                                '@if(count($item->item_colors_sizes))'+
                                                    '@foreach($item->item_colors_sizes as $item_color_id)'+
                                                        '<option value="{{$item_color_id->id}}">'+
                                                            '{{$item->name}} {{$item_color_id->sizes->name}} {{$item_color_id->colors->name}}'+
                                                        '</option>'+
                                                    '@endforeach'+
                                               '@endif'+
                                            '</optgroup>'+
                                        '@endforeach'+
                                    '@endif'+
                                '</select>'+
                            '</div>'+
                        
                            '<label for="itemPrice" class="col-sm-2 control-label">'+
                              '@lang("order.itemPrice")'+
                            '</label>'+
                            '<div class="col-sm-4">'+
                              '<input id="itemPrice'+counter+'" type="number"class="form-control" placeholder="@lang("order.itemPrice")" value="" required readonly>'+
                            '</div>'+
                        '</div>'+

                        '<div class="form-group">'+
                            '<label for="item_count'+counter+'" class="col-sm-2 control-label">'+
                                '@lang("order.item_count")'+
                            '</label>'+
                            '<div class="col-sm-4">'+
                            '<input id="item_count'+counter+'" class="form-control totalPrice'+counter+' itemPrice'+counter+' item_color_id'+counter+'" onkeyup="return totalPriceeAppended(this.value,this.className,this.id);" type="number" name="item_count[]" placeholder="@lang("order.item_count")" required>'+
                            '</div>'+

                            '<label for="totalPrice'+counter+'" class="col-sm-2 control-label">'+
                                '@lang("order.totalPrice")'+
                            '</label>'+
                            '<div class="col-sm-4">'+
                                '<input id="totalPrice'+counter+'" type="number" class="form-control totalPrice" placeholder="@lang("order.totalPrice")" readonly>'+
                            '</div>'+
                        '</div>'+

                    '</div>'+
                '</div>'+
            '</div>'
        );

        $(document).ready(function() {
          $('#item_color_id'+counter).select2();
        });
    }





    function getPriceAppended(item_id,classs){

        var itemPriceId = classs.split(" ")[1];
            itemCountId = classs.split(" ")[2];
            totalPrice = classs.split(" ")[3];
        if(item_id == ""){
            $("#"+itemPriceId).val("");
            return false;
        }
      
        $.ajax({
            url: "{{url('admin/Order/oneItemInfo')}}"+"/"+item_id,
            cache: false,
            success: function(result){
                itemPrice = result.itemPrice;
                itemCount = parseInt($("#"+itemCountId).val());
                itemCount = itemCount > 0 ? itemCount : 1;

                $("#"+itemCountId).val(itemCount)


                $("#"+totalPrice).val(itemPrice * itemCount);
                $("#"+itemPriceId).val(itemPrice);
                
                calcTotalAllPrice();

            }
        });
    }





    function totalPriceeAppended(itemCountt,classIdApp,itemId){
        var totalPrice = classIdApp.split(" ")[1];
            itemPrice = classIdApp.split(" ")[2];
            item_id = $("#"+classIdApp.split(" ")[3]).val();
        
        if(itemCountt != "" && itemCountt != null && itemCountt != 0){


          $.ajax({
                url: "{{url('admin/Order/oneItemInfo')}}"+"/"+item_id,
                cache: false,
                success: function(result){
                    //do some thing hosam
                }
            });
          
            var itemPriceAppended = $("#"+itemPrice).val();
              totalPriceAppended = itemCountt * itemPriceAppended;

            $("#"+totalPrice).val(totalPriceAppended);

            calcTotalAllPrice(shippingValue);
        }
    }





    function shippingValuee(e) {
        shippingValue = parseInt(e.value);
        calcTotalAllPrice(shippingValue);
    }





    function removeItem(id){
        var totalAllPrice = $('#totalAllPrice').val();
            totalPrice = $('#totalPrice'+id).val();
            $('#totalAllPrice').val(totalAllPrice - totalPrice);

        $("#"+id).parent().parent().parent().parent().remove();
         calcTotalAllPrice();
    }





    function calcTotalAllPrice(shippingVal = 0) {
        inputShippingVal = parseInt($("#shippingValue").val());
        shippingValue = shippingVal != 0 ? shippingVal : inputShippingVal;
        var arrVal = [];
        for(var i=0; i< document.getElementsByClassName('totalPrice').length; i++){
          arrVal.push(parseInt(document.getElementsByClassName('totalPrice')[i].value));
        }
         
        shippingValue = parseInt($("#shippingValue").val());
        $("#totalAllPrice").val(arrVal.reduce((a, b) => a + b)+shippingValue);
    }





    $(document).ready(function() {
        $('#itemName').select2();
        calcTotalAllPrice();
    });



</script>