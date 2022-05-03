<div class="box-header with-border">
    <h3 class="box-title">@if(empty($data)) @lang('general.add') @else @lang('general.edit') @endif</h3>
</div>
<form class="form-horizontal" action="{{url('admin/Order/createOrder')}}" method="post">
    <div class="box-body">
        @csrf
        <input type="hidden" name="id" value="{{(!empty($data))?$data->id:''}}">
        

        <div class="form-group has-success">
            <label for="user_id" class="col-sm-2 control-label">@lang('order.user_id')</label>
            <div class="col-sm-4">

                <div class="input-group">
                    <select name="user_id" class="form-control input-lg select2" id="user_id" placeholder="@lang('order.user_id')" required>
                        @if(!empty($users))
                            @foreach($users as $user)
                                <option value="{{$user->id}}" {{(!empty($data)) && $data->user_id == $user->id ? 'selected' :''}}>{{$user->name}}</option>
                            @endforeach
                        @endif
                    </select>
                    <span class="input-group-addon">
                        <a href="" data-toggle="modal" data-target="#modal-default">
                            <i class="fa fa-user-plus"></i>
                        </a>
                    </span>
                </div>
                
            </div>
        </div>

        
    </div>
    <div class="box-footer">
        <input type="submit" class="btn btn-info" value="{{empty($data) ? Lang::get('general.add') : Lang::get('general.edit')}}">
    </div>
</form>

@include('Admin/layouts/Orders/createUserModal')
