<?php

namespace App\Helpers\Repo\Admin\State;

use App\Helpers\Repo\Admin\AdminRepoInterface\RepoInterface;
use App\Helpers\Repo\Repo;
use App\Models\State;
use App\Models\Country;
use Illuminate\Support\Facades\File;

class StateRepo extends Repo implements RepoInterface
{

     public static $title = 'state';

     public static $createPath = 'admin/State/create';

     public static $deletePath = 'admin/State/destroyMany';

     /* 
     *    interface methods
     */

     public static function get($query_string)
     {
          $states = StateSearchRepo::searchAllStates($query_string);

          $data = [
               'data' => $states,
               'title' => self::$title,
               'createPath' => url(self::$createPath),
               'deletePath' => url(self::$deletePath),
          ];

          return view('Admin/State/StatesInfo', $data);
     }

     public static function show($state)
     {
          return;
     }

     public static function create()
     {
          $data['countries'] = Country::get();
          return view('Admin/State/create',$data);
     }

     public static function store($request)
     {
          StateCreateRepo::createState($request);

          session()->flash('success', 'Done');

          return back();
     }

     public static function edit($state)
     {
          $data['data'] = $state;
          
          $data['countries'] = Country::get();

          return view('Admin/State/edit', $data);
     }

     public static function update($request, $state)
     {
          StateUpdateRepo::updateState($request, $state);

          session()->flash('success', 'Done');

          return back();
     }

     public static function destroy($state)
     {
          $destinationPath = public_path('Admin_uploads/States/');

          File::delete($destinationPath . $state->StateFlag);

          $state->delete();

          session()->flash('warning', 'Done');

          return back();
     }

     public static function destroyMany($ids)
     {
          $ids = json_decode($ids);

          $states = State::whereIn('id', $ids)->delete();
          
          session()->flash('warning', 'Done');

          return back();
     }
}
