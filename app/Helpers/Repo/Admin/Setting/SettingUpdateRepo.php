<?php

namespace App\Helpers\Repo\Admin\Setting;

use App\Models\Setting;
use Illuminate\Support\Facades\File;

class SettingUpdateRepo extends SettingRepo
{
   public static function updateSetting($request, Setting $setting)
   {

      $validated = $request->validated();

      if ($request->hasFile('siteImage')) {

         $destinationPath = public_path('Admin_uploads/settings/');

         $validated['siteImage'] = $setting->siteImage;

         File::delete($destinationPath . $validated['siteImage']);

         $validated['siteImage'] = Self::imageHandle($request->file('siteImage'), $destinationPath);
      }
      
      if ($request->hasFile('siteLogo')) {

         $destinationPath = public_path('Admin_uploads/settings/');

         $validated['siteLogo'] = $setting->siteLogo;

         File::delete($destinationPath . $validated['siteLogo']);

         $validated['siteLogo'] = Self::imageHandle($request->file('siteLogo'), $destinationPath);
      }

      $setting->update($validated);

      return $setting;
   }
}
