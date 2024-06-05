<div class="box-header with-border">
    <h3 class="box-title">@lang('general.edit')</h3>
</div>
<form class="form-horizontal" action="{{url('admin/MainType/update/'.$data->id)}}" method="post">
    <div class="box-body">
        @csrf
        @method("PATCH")
        
        <input type="hidden" name="id" value="{{$data->id}}">

        <div class="form-group">
            <label for="typeName" class="col-sm-2 control-label">@lang('main_type.typeName')</label>
            <div class="col-sm-4">
                <input type="text" name="typeName" class="form-control" id="typeName" placeholder="@lang('main_type.typeName')" value="{{$data->typeName}}" required>
            </div>

            <label for="typeNameAr" class="col-sm-2 control-label">@lang('main_type.typeNameAr')</label>
            <div class="col-sm-4">
                <input type="text" name="typeNameAr" class="form-control" placeholder="@lang('main_type.typeNameAr')" value="{{$data->typeNameAr}}" required id="typeNameAr">
            </div>
        </div>

    </div>
    <div class="box-footer">
        <input type="submit" class="btn btn-info" value="@lang('general.edit')">
    </div>
</form>