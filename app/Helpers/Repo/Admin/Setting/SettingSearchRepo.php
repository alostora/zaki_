<?php

namespace App\Helpers\Repo\Admin\Setting;


class SettingSearchRepo extends SettingRepo
{

     public static function searchAllSettings(
          $query_string = -1
     ) {

          return SettingGetRepo::allSettings($query_string)->get();
     }
}
