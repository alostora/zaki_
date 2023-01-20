<div class="box-header with-border">
    <h3 class="box-title">@lang('general.edit')</h3>
</div>
<form class="form-horizontal" action="{{url('admin/Role/update/'.$data->id)}}" method="post" enctype="multipart/form-data">
    <div class="box-body">
        @csrf
        @method('PATCH')
        <input type="hidden" name="id" value="{{$data->id}}">
        <div class="form-group">
            <label for="roleName" class="col-sm-2 control-label">@lang('role.roleName')</label>
            <div class="col-sm-4">
                <input type="text" name="roleName" class="form-control input-lg" id="roleName" placeholder="@lang('role.roleName')" value="{{$data->roleName}}" required>
            </div>

            <label for="roleNameAr" class="col-sm-2 control-label">@lang('role.roleNameAr')</label>
            <div class="col-sm-4">
                <input type="text" name="roleNameAr" class="form-control input-lg" placeholder="@lang('role.roleNameAr')" value="{{$data->roleNameAr}}" required id="roleNameAr">
            </div>
        </div>
    </div>
    <div class="box-footer">
        <input type="submit" class="btn btn-info" value="@lang('general.edit')">
    </div>
</form>