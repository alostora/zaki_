<?php

namespace App\Helpers\Repo\Admin\Admin;

use App\Helpers\Repo\Repo;


class AdminRepo extends Repo
{

     public $title = 'admin';
     public $createPath;
     public $deletePath;

     public function __construct()
     {
          $this->createPath = url('admin/Admin/create');
          $this->deletePath = url('admin/Admin/deleteManyAdmins');
     }
}
