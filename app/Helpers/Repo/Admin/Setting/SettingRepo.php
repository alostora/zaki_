<?php

namespace App\Helpers\Repo\Admin\Setting;

use App\Helpers\Repo\Admin\AdminRepoInterface\RepoInterface;
use App\Helpers\Repo\Repo;
use App\Models\Setting;
use Illuminate\Support\Facades\File;

class SettingRepo extends Repo implements RepoInterface
{

     public static $title = 'setting';

     public static $createPath = 'admin/Setting/create';

     public static $deletePath = 'admin/Setting/destroyMany';

     /* 
     *    interface methods
     */

     public static function get($query_string)
     {
          $settings = SettingSearchRepo::searchAllSettings($query_string);

          $data = [
               'data' => $settings,
               'title' => self::$title,
               'createPath' => url(self::$createPath),
               'deletePath' => url(self::$deletePath),
          ];

          return view('Admin/Setting/SettingsInfo', $data);
     }

     public static function show($setting)
     {
          return;
     }

     public static function create()
     {
          $setting = Setting::first();

          if ($setting) {

               return redirect(url('admin/Setting/edit/' . $setting->id));
          }

          return view('Admin/Setting/create');
     }

     public static function store($request)
     {
          SettingCreateRepo::createSetting($request);

          session()->flash('success', 'Done');

          return back();
     }

     public static function edit($setting)
     {
          $data['data'] = $setting;

          return view('Admin/Setting/edit', $data);
     }

     public static function update($request, $setting)
     {
          SettingUpdateRepo::updateSetting($request, $setting);

          session()->flash('success', 'Done');

          return back();
     }

     public static function destroy($setting)
     {
          $destinationPath = public_path('Admin_uploads/settings/');

          File::delete($destinationPath . $setting->siteImage);

          File::delete($destinationPath . $setting->siteLogo);

          $setting->delete();


          session()->flash('warning', 'Done');

          return back();
     }

     public static function destroyMany($ids)
     {
          $ids = json_decode($ids);

          $settings = Setting::where('id', $ids)->get();

          $destinationPath = public_path('Admin_uploads/settings/');

          foreach ($settings as $setting) {

               File::delete($destinationPath . $setting->siteImage);

               File::delete($destinationPath . $setting->siteLogo);

               $setting->delete();
          }

          session()->flash('warning', 'Done');

          return back();
     }
}
