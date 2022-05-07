<div class="box-header with-border">
    <h3 class="box-title">@if(empty($data)) @lang('general.add') @else @lang('general.edit') @endif</h3>
</div>
<form class="form-horizontal" action="{{url('admin/Order/createOrder')}}" method="post" id="form">
    <div class="box-body">
        @csrf
        <input type="hidden" name="id" value="{{!empty($data)?$data->id:''}}">

        <div class="form-group">
            <label for="user_id" class="col-sm-2 control-label">@lang('order.user_id')</label>
            <div class="col-sm-4">
                <div class="input-group">
                    <select name="user_id" class="form-control input-lg select2" id="user_id" placeholder="@lang('order.user_id')" required onchange="return userInfo(this.value);">
                        @if(!empty($users))
                            @foreach($users as $user)
                                <option value="{{$user->id}}" {{(!empty($data)) && $data->user_id == $user->id ? 'selected' :''}}>{{$user->name}}</option>
                            @endforeach
                        @endif
                    </select>
                    <span class="input-group-addon">
                        <a href="" data-toggle="modal" data-target="#modal-default" onclick="return emptyModal();">
                            <i class="fa fa-user-plus"></i>
                        </a>
                    </span>
                </div>
            </div>

            <label for="user_id" class="col-sm-2 control-label">@lang('order.paymentMethod')</label>
            <div class="col-sm-4">
                <select name="paymentMethod" class="form-control input-lg select2" id="paymentMethod" required>
                    @if(!empty($data) && $data->paymentMethod == 'online')
                        <option value="cash">cash</option>
                        <option value="online" selected>online</option>
                    @else
                        <option value="cash">cash</option>
                        <option value="online">online</option>
                    @endif
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="discountCopon" class="col-sm-2 control-label">@lang('order.discountCopon')</label>
            <div class="col-sm-4">
                <input type="number" name="discountCopon" class="form-control" id="discountCopon" placeholder="@lang('order.discountCopon')" value="{{!empty($data)?$data->discountCopon:''}}">
            </div>

            <label for="shippingValue" class="col-sm-2 control-label">@lang('order.shippingValue')</label>
            <div class="col-sm-4">
                <input type="number" name="shippingValue" class="form-control" id="shippingValue" placeholder="@lang('order.shippingValue')" required value="{{!empty($data)?$data->shippingValue:'1'}}" onkeyup="return shippingValuee(this);">
            </div>
        </div>

        <div class="form-group">
            <label for="shippingDetails" class="col-sm-2 control-label">@lang('order.shippingDetails')</label>
            <div class="col-sm-4">
                <textarea name="shippingDetails" class="form-control" id="shippingDetails" placeholder="@lang('order.shippingDetails')">{{!empty($data)?$data->shippingDetails:''}}</textarea>
            </div>

            <label for="notes" class="col-sm-2 control-label">@lang('order.notes')</label>
            <div class="col-sm-4">
                <textarea name="notes" class="form-control" id="notes" placeholder="@lang('order.notes')">{{!empty($data)?$data->notes:''}}</textarea>
            </div>
        </div>

        @include('Admin/layouts/Orders/orderItems')
    </div>

    <div class="box-footer">
        <input type="submit" class="btn btn-info" value="{{empty($data) ? Lang::get('general.add') : Lang::get('general.edit')}}">
    </div>
</form>

@include('Admin/layouts/Orders/createUserModal')
@include('Admin/layouts/Orders/orderScripts')



