<?php

namespace App\Helpers\Repo\Admin\Admin;

use App\Models\Admin;

class AdminGetRepo extends AdminRepo
{
     public static function allAdmins(
          $query_string = -1
     ) {
          return Admin::where(function ($q) use ($query_string) {
               
               if ($query_string != -1) {
                    $q
                    ->where('name', 'like', '%'.$query_string.'%')
                    
                    ->orWhere('email', 'like', '%'.$query_string.'%');
               }
          })
          ->orderBy('id', 'DESC');
     }
}
