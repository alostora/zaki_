<div class="modal fade" id="modal-default" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Create user</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{url('admin/Order/createUser')}}" method="post">
                    <div class="box-body">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">@lang('user.name')</label>
                            <div class="col-sm-8">
                                <input type="text" name="name" class="form-control input-lg" id="name" placeholder="@lang('user.name')" value="{{(!empty($data)) ? $data->name :''}}" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone" class="col-sm-3 control-label">@lang('user.phone')</label>
                            <div class="col-sm-8">
                                <input type="text" name="phone" class="form-control input-lg" placeholder="@lang('user.phone')" id="phone" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="city_id" class="col-sm-3 control-label">@lang('user.city_id')</label>
                            <div class="col-sm-8">
                                <select name="city_id" class="form-control input-lg select2" id="city_id" placeholder="@lang('order.city_id')" required>
                                    @if(!empty($countries))
                                        <option value="">choose</option>
                                        @foreach($countries as $country)
                                            <optgroup label="{{$country->name}}">
                                                @if(count($country->cities))
                                                    @foreach($country->cities as $city)
                                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                                    @endforeach
                                                @endif
                                            </optgroup>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="shippingAddress" class="col-sm-3 control-label">@lang('user.shippingAddress')</label>
                            <div class="col-sm-8">
                                <textarea type="text" name="shippingAddress" class="form-control" placeholder="@lang('user.shippingAddress')" id="shippingAddress" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>