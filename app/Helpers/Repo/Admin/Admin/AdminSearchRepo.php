<?php

namespace App\Helpers\Repo\Admin\Admin;


class AdminSearchRepo extends AdminRepo
{

     public function searchAllAdmins(
          $query_string = -1
     ) {

          return [
               'data' => AdminGetRepo::allAdmins($query_string)->get(),
               'title' => $this->title,
               'createPath' => $this->createPath,
               'deletePath' => $this->deletePath,
          ];

     }
}
