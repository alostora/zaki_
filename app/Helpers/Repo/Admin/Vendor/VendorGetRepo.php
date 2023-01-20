<?php

namespace App\Helpers\Repo\Admin\Vendor;

use App\Models\Vendor;

class VendorGetRepo extends VendorRepo
{
     public static function allVendors(
          $query_string = -1
     ) {
          return Vendor::where(function ($q) use ($query_string) {

               if ($query_string != -1) {
                    $q
                         ->where('name', 'like', '%' . $query_string . '%')

                         ->orWhere('email', 'like', '%' . $query_string . '%')

                         ->orWhere('phone', 'like', '%' . $query_string . '%');
               }
          })
               ->orderBy('id', 'DESC');
     }
}
