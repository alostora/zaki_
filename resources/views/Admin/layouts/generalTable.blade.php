<div class="box">
    <div class="box-header">
      	<div class="col-xs-6">
          	<h3 class="box-title">@lang($title.'.title')</h3>
      	</div>
      	<a href="{{$createPath}}" class="btn btn-primary col-xs-6">
      		<i class="fa fa-plus"></i>
      		@lang('general.add')
      	</a>
    </div>
    <div class="box-body table-responsive no-padding">
      	<table class="table table-hover" id="data_table">
		  	<div class="btn-group">
		  		<div class="checkbox">
		  			<label>
		  				@if(app()->getLocale() == 'ar')
		                 		@lang('general.all') <input type="checkbox" onclick="checkAll();" id="all"> 
		  				@else
		                 		<input type="checkbox" id="all" onclick="checkAll();">  @lang('general.all')
		  				@endif
		          	</label>
		          	<button disabled onclick="deleteAll()">@lang('general.delete') @lang('general.all')</button>
		  		</div>
			</div>
      		<thead>
                <tr>
                  	@if(count($data))
					@foreach($data[0]->toArray() as $keyy=>$val)
						<th style="text-align:center">@lang($title.'.'.$keyy)</th>
					@endforeach
				@endif
				<th></th>
                </tr>
      		</thead>
      		<tbody>
				@if(!empty($data))
					@foreach($data as $key=>$dat)
						<tr>
				          	@foreach($dat->toArray() as $keyy=>$val)
				          		@if($keyy != "operations" && $keyy != "id")
									<td style="text-align:center">{!! $val !!}</td>
								@elseif($keyy == "id")	
									<td style="text-align:center">{{ $key+1}}</td>
								@endif
							@endforeach
				          	<td style="text-align:center">
					          	<div class="btn-group">
				          	 		@if(isset($dat->operations['images']))
										<a class="btn btn-warning" href="{{$dat->operations['images']}}">
											<i class="fa fa-photo"></i>
										</a>
				          	 		@endif
				          	 		@if(isset($dat->operations['properties']))
										<a class="btn btn-info" href="{{$dat->operations['properties']}}">
											<i class="fa fa-info"></i>
										</a>
				          	 		@endif
									@if(isset($dat->operations['edit']))
										<a class="btn btn-success" href="{{$dat->operations['edit']}}">
											<i class="fa fa-edit"></i>
										</a>
									@endif
									@if(isset($dat->operations['delete']))
										<a class="btn btn-danger" href="{{$dat->operations['delete']}}" onclick="return confirm('Are you sure?');" >
											<i class="fa fa-trash"></i>
										</a>
									@endif
			          	 		</div>
				          	</td>
				          	<td width="10px">
			                  	<label>
				                    <input type="checkbox" name="chk[]" value="{{$dat->id}}" class="checkbox" onclick="appendValue(this)" id="{{$dat->id}}">
			                  	</label>
				          	</td>
				      	</tr>
						@include('Admin/layouts/Orders/viewOrderItemsModal')
					@endforeach
				@endif
      		</tbody>
      	</table>
    </div>
</div>

<script type="text/javascript">

	var checked = false;
	function checkAll() {
		checked = !checked;
		$(".checkbox").prop('checked',checked);
		$('button').prop("disabled", !checked)

		if($('.checkbox:checked').length == "{{count($data)}}") {
			$('#all').prop('checked',true)
			$('button').prop("disabled", false)
	    }else if($('.checkbox:checked').length == 0){
	    	$('#all').prop('checked',false)
			$('button').prop("disabled", true)
		}else{
			$('#all').prop('checked',true)
			$('button').prop("disabled", false)
		}
	}

	function appendValue(e) {
		if( $('#'+e.id).is(':checked') ){

			$('#'+e.id).prop('checked',true)
	       	$('button').prop("disabled", false)

		 	if($('.checkbox:checked').length == "{{count($data)}}") {
				$('#all').prop('checked',true)
		    }
		}else{
			$('#'+e.id).prop('checked',false)
			$('#all').prop('checked',false)
			if($('.checkbox:checked').length == 0){
				$('button').prop("disabled", true)
			}
		}
	}

	function deleteAll(){
		if (confirm('are you sure ?')){
			var selected = new Array();
		  	$(".checkbox:checked").each(function() {
		       selected.push($(this).val());
		  	});
	  		location.href = "{{$deletePath}}/" + JSON.stringify(selected);
		}
	}


	function showItems(id){
        $("#items"+id).modal('show');
	    /*if($("#items"+id).hasClass('collapse')){
	        $("#items"+id).removeClass('collapse');
	    }else{
	        $("#items"+id).addClass('collapse');
	    }*/
	}

	function changeOrderStatus(orderId){

		if (confirm('you will change order status ?')) {
			status = $("#"+orderId).val();
			$.ajax({
	      		url:"{{url('admin/Order/changeOrderStatus')}}/"+orderId+"/"+status,
		      	type:"get",
		      	success : function(res){
			        if(res.status){
			          	alert('order status changed');
			        }
		      	}
		    });
		}
	}

</script>