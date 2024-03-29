<div class="box-header with-border">
    <h3 class="box-title">@lang('general.edit')</h3>
</div>
<form class="form-horizontal" action="{{url('admin/Permission/update/'.$data->id)}}" method="post">
    <div class="box-body">
        @csrf
        @method('PATCH')

        <input type="hidden" name="id" value="{{(!empty($data))?$data->id:''}}">

        <div class="form-group">
            
            <label for="permissionName" class="col-sm-2 control-label">@lang('permission.permissionName')</label>
            <div class="col-sm-4">
                <input type="text" name="permissionName" class="form-control" id="permissionName" placeholder="@lang('permission.permissionName')" value="{{$data->permissionName}}" required>
            </div>
          
            <label for="permissionNameAr" class="col-sm-2 control-label">@lang('permission.permissionNameAr')</label>
            <div class="col-sm-4">
                <input type="text" name="permissionNameAr" class="form-control" placeholder="@lang('permission.permissionNameAr')" value="{{$data->permissionNameAr}}" required id="permissionNameAr">
            </div>

        </div>

        <hr>
        <div class="box-header">
            <h3 class="box-title">permissions</h3>
        </div>
        <hr>

        @if(!empty($migrations))
            @foreach($migrations as $migrate)
                @if(!in_array($migrate->name,['password_resets','failed_jobs','personal_access_tokens']))
                    <div class="form-group">
                        <label for="{{$migrate->id}}" class="col-sm-2 control-label">{{$migrate->name}}</label>
                        <div class="col-sm-10">
                            <select name="permissions[]" class="form-control select2" id="{{$migrate->id}}" multiple>
                                @if(!empty($roles))
                                    @foreach($roles as $role)
                                      
                                        <option value="{{$migrate->id}}:{{$role->id}}" {{isset($selected[$migrate->name][$role->id]) ? $selected[$migrate->name][$role->id] : false}}>
                                            {{$role->name}}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
        
    </div>
    <div class="box-footer">
        <input type="submit" class="btn btn-info" value="@lang('general.edit')">
    </div>
</form>
