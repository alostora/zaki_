<div class="box-header with-border">
    <h3 class="box-title">@lang('general.add')</h3>
</div>
<form class="form-horizontal" action="{{url('admin/City/store')}}" method="post">
    <div class="box-body">
        @csrf
        <div class="form-group">
            <label for="cityName" class="col-sm-2 control-label">@lang('city.cityName')</label>
            <div class="col-sm-4">
                <input type="text" name="cityName" class="form-control" id="cityName" placeholder="@lang('city.cityName')" required>
            </div>
          
            <label for="cityNameAr" class="col-sm-2 control-label">@lang('city.cityNameAr')</label>
            <div class="col-sm-4">
                <input type="text" name="cityNameAr" class="form-control" id="cityNameAr" placeholder="@lang('city.cityNameAr')" required>
            </div>
        </div>
        <div class="form-group">
            <label for="country_id" class="col-sm-2 control-label">@lang('city.country_id')</label>
            <div class="col-sm-4">
                <select name="country_id" class="form-control select2" id="country_id" required>
                    @if(!empty($countries))
                        @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <input type="submit" class="btn btn-info" value="@lang('general.add')">
    </div>
</form>
