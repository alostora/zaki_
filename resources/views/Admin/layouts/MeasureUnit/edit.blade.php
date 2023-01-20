<div class="box-header with-border">
    <h3 class="box-title">@lang('general.edit')</h3>
</div>
<form class="form-horizontal" action="{{url('admin/MeasureUnit/update/'.$data->id)}}" method="post">
    <div class="box-body">
        @csrf
        @method("PATCH")

        <input type="hidden" name="id" value="{{$data->id}}">

        <div class="form-group">
            <label for="unitName" class="col-sm-2 control-label">@lang('measureUnit.unitName')</label>
            <div class="col-sm-4">
                <input type="text" name="unitName" class="form-control" id="unitName" placeholder="@lang('measureUnit.unitName')" value="{{$data->unitName}}" required>
            </div>
            <label for="unitNameAr" class="col-sm-2 control-label">@lang('measureUnit.unitNameAr')</label>
            <div class="col-sm-4">
                <input type="text" name="unitNameAr" class="form-control" placeholder="@lang('measureUnit.unitNameAr')" value="{{$data->unitNameAr}}" required id="unitNameAr">
            </div>
        </div>
        <div class="form-group">
            <label for="unitCode" class="col-sm-2 control-label">@lang('measureUnit.unitCode')</label>
            <div class="col-sm-4">
                <input type="text" name="unitCode" class="form-control" id="unitCode" placeholder="@lang('measureUnit.unitCode')" value="{{$data->unitCode}}" required>
            </div>
            
            <?php $unitType = !empty($data) ? $data->unitType :''; ?>

            <label for="unitType" class="col-sm-2 control-label">@lang('measureUnit.unitType')</label>
            <div class="col-sm-4">
                <select name="unitType" class="form-control select2" required id="unitType">
                    <option value="">@lang('general.choose')</option>
                    <option value="tall" {{$unitType == 'tall' ? 'selected' : ''}}>@lang('general.tall')</option>
                    <option value="weight" {{$unitType == 'weight' ? 'selected' : ''}}>@lang('general.weight')</option>
                    <option value="liquid" {{$unitType == 'liquid' ? 'selected' : ''}}>@lang('general.liquid')</option>
                </select>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <input type="submit" class="btn btn-info" value="@lang('general.edit')">
    </div>
</form>
