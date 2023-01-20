<div class="box-header with-border">
    <h3 class="box-title">@lang('general.add')</h3>
</div>
<form class="form-horizontal" action="{{url('admin/Role/store')}}" method="post" enctype="multipart/form-data">
    <div class="box-body">
      @csrf
      <div class="form-group">
          <label for="roleName" class="col-sm-2 control-label">@lang('role.roleName')</label>
          <div class="col-sm-4">
              <input type="text" name="roleName" class="form-control input-lg" id="roleName" placeholder="@lang('role.roleName')" required>
          </div>
        
          <label for="roleNameAr" class="col-sm-2 control-label">@lang('role.roleNameAr')</label>
          <div class="col-sm-4">
              <input type="text" name="roleNameAr" class="form-control input-lg" placeholder="@lang('role.roleNameAr')" required id="roleNameAr">
          </div>
      </div>
    </div>
    <div class="box-footer">
        <input type="submit" class="btn btn-info" value="@lang('general.add')">
    </div>
</form>
  