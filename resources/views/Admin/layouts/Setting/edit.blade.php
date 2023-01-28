<div class="box-header with-border">
    <h3 class="box-title">@lang('general.edit')</h3>
</div>
<form class="form-horizontal" action="{{url('admin/Setting/update/'.$data->id)}}" method="post" enctype="multipart/form-data">
    <div class="box-body">
        @csrf
        @method("PATCH")
        <input type="hidden" name="id" value="{{$data->id}}">

        <div class="form-group">
            <label for="siteName" class="col-sm-2 control-label">@lang('setting.siteName')</label>
            <div class="col-sm-4">
                <input type="text" name="siteName" class="form-control" id="siteName" value="{{$data->siteName}}" required>
            </div>
          
            <label for="siteNameAr" class="col-sm-2 control-label">@lang('setting.siteNameAr')</label>
            <div class="col-sm-4">
                <input type="text" name="siteNameAr" class="form-control"  id="siteNameAr" value="{{$data->siteNameAr}}" required>
            </div>
        </div>
        <div class="form-group">
            <label for="siteEmail" class="col-sm-2 control-label">@lang('setting.siteEmail')</label>
            <div class="col-sm-4">
                <input type="email" name="siteEmail" class="form-control" id="siteEmail" value="{{$data->siteEmail}}" required>
            </div>


            <label for="is_live" class="col-sm-2 control-label">@lang('setting.is_live')</label>
            <div class="col-sm-4">
                <select name="is_live" class="form-control select2" id="is_live" required>
                    @if(!empty($data))
                        <option value="1" {{$data->is_live == 1 ? 'selected' : ''}}>1</option>
                        <option value="0" {{$data->is_live == 0 ? 'selected' : ''}}>0</option>
                    @else
                        <option value="1" selected>1</option>
                        <option value="0">0</option>
                    @endif
                </select>
            </div>
        </div>

        <div class="form-group">

            <label for="siteMobile" class="col-sm-2 control-label">@lang('setting.siteMobile')</label>
            <div class="col-sm-4">
                <input type="text" name="siteMobile" class="form-control" id="siteMobile" value="{{$data->siteMobile}}" required>
            </div>
          
            <label for="sitePhone" class="col-sm-2 control-label">@lang('setting.sitePhone')</label>
            <div class="col-sm-4">
                <input type="text" name="sitePhone" class="form-control"  id="sitePhone" value="{{$data->sitePhone}}" required>
            </div>
        </div>



        <div class="form-group">
            <label for="siteImage" class="col-sm-2 control-label">
                @lang('setting.siteImage')
            </label>
            <div class="col-sm-4">
                <input type="file" name="siteImage" class="form-control">
                @if(!empty($data) && !empty($data->siteImage)) 
                    {!! $data->image_url !!}
                @endif
            </div>

            <label for="siteLogo" class="col-sm-2 control-label">
                @lang('setting.siteLogo')
            </label>
            <div class="col-sm-4">
                <input type="file" name="siteLogo" class="form-control">
                @if(!empty($data) && !empty($data->siteLogo)) 
                    {!! $data->logo_url !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="siteDesc" class="col-sm-2 control-label">@lang('setting.siteDesc')</label>
            <div class="col-sm-4">
                <textarea type="text" name="siteDesc" class="form-control" required id="siteDesc">{{$data->siteDesc}}</textarea>
            </div>
            <label for="siteDescAr" class="col-sm-2 control-label">@lang('setting.siteDescAr')</label>
            <div class="col-sm-4">
                <textarea type="text" name="siteDescAr" class="form-control" required id="siteDescAr">{{$data->siteDescAr}}</textarea>
            </div>
        </div>

    </div>
    <div class="box-footer">
        <input type="submit" class="btn btn-info" value="@lang('general.edit')">
    </div>
</form>
  