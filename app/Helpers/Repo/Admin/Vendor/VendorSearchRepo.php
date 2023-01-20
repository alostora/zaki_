<?php

namespace App\Helpers\Repo\Admin\Vendor;


class VendorSearchRepo extends VendorRepo
{

     public static function searchAllVendors(
          $query_string = -1
     ) {
          return VendorGetRepo::allVendors($query_string)->get();
     }
}
