<?php

namespace App\Helpers\Repo\Admin\Setting;

use App\Models\Setting;

class SettingCreateRepo extends SettingRepo
{
     public static function createSetting($request)
     {
          $validated = $request->validated();

          $destinationPath = public_path('Admin_uploads/settings/');

          $validated['siteImage'] = Self::imageHandle($request->file('siteImage'), $destinationPath);
          $validated['siteLogo'] = Self::imageHandle($request->file('siteLogo'), $destinationPath);

          return Setting::create($validated);
     }
}
