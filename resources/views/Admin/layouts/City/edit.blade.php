<div class="box-header with-border">
    <h3 class="box-title">@lang('general.edit')</h3>
</div>
<form class="form-horizontal" action="{{url('admin/City/update/'.$data->id)}}" method="post">
    <div class="box-body">
        @csrf
        @method("PATCH")
        <input type="hidden" name="id" value="{{$data->id}}">
        <div class="form-group">
            <label for="cityName" class="col-sm-2 control-label">@lang('city.cityName')</label>
            <div class="col-sm-4">
                <input type="text" name="cityName" class="form-control" id="cityName" value="{{$data->cityName}}" required>
            </div>
          
            <label for="cityNameAr" class="col-sm-2 control-label">@lang('city.cityNameAr')</label>
            <div class="col-sm-4">
                <input type="text" name="cityNameAr" class="form-control" id="cityNameAr" value="{{$data->cityNameAr}}" required>
            </div>
        </div>
        <div class="form-group">
            <label for="country_id" class="col-sm-2 control-label">@lang('city.country_id')</label>
            <div class="col-sm-4">
                <select name="country_id" class="form-control select2" id="country_id" required>
                    @if(!empty($countries))
                        @foreach($countries as $country)
                            <option value="{{$country->id}}"  {{$data->country_id == $country->id ? 'selected' : ''}}>{{$country->name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <input type="submit" class="btn btn-info" value="@lang('general.edit')">
    </div>
</form>
