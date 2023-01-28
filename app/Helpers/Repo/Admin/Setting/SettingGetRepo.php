<?php

namespace App\Helpers\Repo\Admin\Setting;

use App\Models\Setting;

class SettingGetRepo extends SettingRepo
{
     public static function allSettings(
          $query_string = -1
     ) {
          return Setting::where(function ($q) use ($query_string) {

               if ($query_string != -1) {
                    $q
                         ->where('siteName', 'like', '%' . $query_string . '%')

                         ->orWhere('siteNameAr', 'like', '%' . $query_string . '%');
               }
          })
               ->orderBy('id', 'DESC');
     }
}
