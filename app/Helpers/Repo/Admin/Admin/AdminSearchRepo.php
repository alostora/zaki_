<?php

namespace App\Helpers\Repo\Admin\Admin;


class AdminSearchRepo extends AdminRepo
{

     public static function searchAllAdmins(
          $query_string = -1
     ) {

          return [
               'data' => AdminGetRepo::allAdmins($query_string)->get(),
               'title' => self::$title,
               'createPath' => url(self::$createPath),
               'deletePath' => url(self::$deletePath),
          ];

     }
}
