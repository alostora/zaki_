<div class="box-header with-border">
    <h3 class="box-title">@lang('general.add')</h3>
</div>
<form class="form-horizontal" action="{{url('admin/Country/store')}}" method="post" enctype="multipart/form-data">
    <div class="box-body">
      @csrf
      <div class="form-group">
          <label for="countryName" class="col-sm-2 control-label">@lang('country.countryName')</label>
          <div class="col-sm-4">
              <input type="text" name="countryName" class="form-control" id="countryName" placeholder="@lang('country.countryName')" required>
          </div>
        
          <label for="countryNameAr" class="col-sm-2 control-label">@lang('country.countryNameAr')</label>
          <div class="col-sm-4">
              <input type="text" name="countryNameAr" class="form-control" id="countryNameAr" placeholder="@lang('country.countryNameAr')" required>
          </div>
      </div>

      <div class="form-group">
          <label for="countryPhoneKey" class="col-sm-2 control-label">@lang('country.countryPhoneKey')</label>
          <div class="col-sm-4">
              <input type="text" name="countryPhoneKey" class="form-control" id="countryPhoneKey" placeholder="@lang('country.countryPhoneKey')" required>
          </div>
        
          <label for="countryCode" class="col-sm-2 control-label">@lang('country.countryCode')</label>
          <div class="col-sm-4">
              <input type="text" name="countryCode" class="form-control" id="countryCode" placeholder="@lang('country.countryCode')" required>
          </div>
      </div>


      <div class="form-group">
          <label for="countryFlag" class="col-sm-2 control-label">@lang('country.countryFlag')</label>
          <div class="col-sm-4">
              <input type="file" name="countryFlag" class="form-control" placeholder="@lang('country.countryFlag')" >
          </div>
          
          <label for="countryCurrency" class="col-sm-2 control-label">@lang('country.countryCurrency')</label>
          <div class="col-sm-4">
              <input type="text" name="countryCurrency" class="form-control" id="countryCurrency" placeholder="@lang('country.countryCurrency')" required>
          </div>
          
      </div>
    </div>
    <div class="box-footer">
        <input type="submit" class="btn btn-info" value="@lang('general.add')">
    </div>
</form>
  