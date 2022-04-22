<div class="box-header with-border">
    <h3 class="box-title">@if(empty($data)) @lang('general.add') @else @lang('general.edit') @endif</h3>
</div>
<form class="form-horizontal" action="{{url('admin/Admin/createAdmin')}}" method="post">
    <div class="box-body">
        @csrf
        <input type="hidden" name="id" value="{{(!empty($data))?$data->id:''}}">
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">@lang('admin.name')</label>
            <div class="col-sm-4">
                <input type="text" name="name" class="form-control input-lg" id="name" placeholder="@lang('admin.name')" value="{{(!empty($data)) ? $data->name :''}}" required>
            </div>
          
            <label for="email" class="col-sm-2 control-label">@lang('admin.email')</label>
            <div class="col-sm-4">
                <input type="email" name="email" class="form-control input-lg" placeholder="@lang('admin.email')" value="{{(!empty($data)) ? $data->email :''}}" required id="email">
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">@lang('admin.password')</label>
            <div class="col-sm-4">
                <input type="password" name="password" class="form-control input-lg" placeholder="@lang('admin.password')" @if(empty($data)) required @endif id="password">
            </div>
            <label for="confirmPassword" class="col-sm-2 control-label">@lang('admin.confirm_password')</label>
            <div class="col-sm-4">
                <input type="password" name="confirmPassword" class="form-control input-lg" placeholder="@lang('admin.confirm_password')" @if(empty($data)) required @endif id="confirmPassword">
            </div>
        </div>
    </div>
    <div class="box-footer">
        <input type="submit" class="btn btn-info" value="{{empty($data) ? Lang::get('general.add') : Lang::get('general.edit')}}">
    </div>
</form>
