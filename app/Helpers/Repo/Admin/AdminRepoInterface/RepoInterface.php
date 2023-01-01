<?php

namespace App\Helpers\Repo\Admin\AdminRepoInterface;

interface RepoInterface
{

     public static function get($query_string);

     public static function show($model);

     public static function create();

     public static function store($request);

     public static function edit($model);

     public static function update($request, $model);

     public static function destroy($model);

     public static function destroyMany($ids);
}
