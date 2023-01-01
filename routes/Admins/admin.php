<?php

use App\Http\Controllers\Admin\Admin\AdminAuthController;
use App\Http\Controllers\Admin\Admin\AdminController;
use App\Http\Controllers\Admin\Brands;
use App\Http\Controllers\Admin\Categories;
use App\Http\Controllers\Admin\Cities;
use App\Http\Controllers\Admin\Colors;
use App\Http\Controllers\Admin\Countries;
use App\Http\Controllers\Admin\Items;
use App\Http\Controllers\Admin\MainTypes;
use App\Http\Controllers\Admin\MeasurUnits;
use App\Http\Controllers\Admin\Orders;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\Roles;
use App\Http\Controllers\Admin\S_categories;
use App\Http\Controllers\Admin\Settings;
use App\Http\Controllers\Admin\Sizes;
use App\Http\Controllers\Admin\States;
use App\Http\Controllers\Admin\Users;
use App\Http\Controllers\Admin\Vendors;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin', 'middleware' => 'lang'], function () {

	Route::get('lang/{lang}', function ($lang) {
		session(['lang' => $lang]);
		session()->flash('success', Lang::get('leftsidebar.Done'));
		return back();
	});

	Route::get('login', [AdminAuthController::class, 'login']);

	Route::post('login', [AdminAuthController::class, 'doLogin']);

	Route::group(['middleware' => 'admin_auth'], function () {

		Route::get('logOut', [AdminAuthController::class, 'logOut']);

		Route::get('/', [AdminAuthController::class, 'dashboard']);

		Route::group(['prefix' => 'Admin'], function () {

			//admins
			Route::get('/', [AdminController::class, 'index'])->middleware('permissions:Admin,view');

			Route::get('create', [AdminController::class, 'create'])->middleware('permissions:Admin,create');

			Route::post('store', [AdminController::class, 'store'])->middleware('permissions:Admin,create');

			Route::get('edit/{admin}', [AdminController::class, 'edit'])->middleware('permissions:Admin,create');

			Route::patch('update/{admin}', [AdminController::class, 'update'])->middleware('permissions:Admin,create');

			Route::get('delete/{admin}', [AdminController::class, 'destroy'])->middleware('permissions:Admin,delete');

			Route::get('destroyMany/{ids}', [AdminController::class, 'destroyMany'])->middleware('permissions:Admin,delete');
		});

		//permissions
		Route::group(['prefix' => 'Permission'], function () {
			
			//permissions
			Route::get('/', [PermissionController::class, 'index'])->middleware('permissions:Permission,view');

			Route::get('create', [PermissionController::class, 'create'])->middleware('permissions:Permission,create');

			Route::post('store', [PermissionController::class, 'store'])->middleware('permissions:Permission,create');

			Route::get('edit/{permission}', [PermissionController::class, 'edit'])->middleware('permissions:Permission,create');

			Route::patch('update/{permission}', [PermissionController::class, 'update'])->middleware('permissions:Permission,create');

			Route::get('delete/{permission}', [PermissionController::class, 'destroy'])->middleware('permissions:Permission,delete');

			Route::get('destroyMany/{ids}', [PermissionController::class, 'destroyMany'])->middleware('permissions:Permission,delete');
		});

		//roles
		Route::group(['prefix' => 'Role'], function () {
			Route::get('rolesInfo', [Roles::class, 'rolesInfo'])->middleware('permissions:Role,view');
			Route::get('viewCreateRole/{id?}', [Roles::class, 'viewCreateRole'])->middleware('permissions:Role,create');
			Route::post('createRole', [Roles::class, 'createRole'])->middleware('permissions:Role,create');
			Route::get('deleteRole/{id}', [Roles::class, 'deleteRole'])->middleware('permissions:Role,delete');
			Route::get('deleteManyRole/{id}', [Roles::class, 'deleteManyRole'])->middleware('permissions:Role,delete');
		});

		//users
		Route::group(['prefix' => 'User'], function () {
			Route::get('userInfo', [Users::class, 'userInfo'])->middleware('permissions:User,view');
			Route::get('viewCreateUser/{id?}', [Users::class, 'viewCreateUser'])->middleware('permissions:User,create');
			Route::post('createUser', [Users::class, 'createUser'])->middleware('permissions:User,create');
			Route::get('deleteUser/{id}', [Users::class, 'deleteUser'])->middleware('permissions:User,delete');
			Route::get('deleteManyUsers/{ids}', [Users::class, 'deleteManyUsers'])->middleware('permissions:User,delete');
		});

		//vendros
		Route::group(['prefix' => 'Vendor'], function () {
			Route::get('vendorInfo', [Vendors::class, 'vendorInfo'])->middleware('permissions:Vendor,view');
			Route::get('viewCreateVendor/{id?}', [Vendors::class, 'viewCreateVendor'])->middleware('permissions:Vendor,create');
			Route::post('createVendor', [Vendors::class, 'createVendor'])->middleware('permissions:Vendor,create');
			Route::get('deleteVendor/{id}', [Vendors::class, 'deleteVendor'])->middleware('permissions:Vendor,delete');
			Route::get('deleteManyVendors/{ids}', [Vendors::class, 'deleteManyVendors'])->middleware('permissions:Vendor,delete');
		});

		//main types
		Route::group(['prefix' => 'Main_type'], function () {
			Route::get('mainTypesInfo', [MainTypes::class, 'mainTypesInfo'])->middleware('permissions:Main_type,view');
			Route::get('viewCreateMainType/{id?}', [MainTypes::class, 'viewCreateMainType'])->middleware('permissions:Main_type,create');
			Route::post('createMainType', [MainTypes::class, 'createMainType'])->middleware('permissions:Main_type,create');
			Route::get('deleteMainType/{id}', [MainTypes::class, 'deleteMainType'])->middleware('permissions:Main_type,delete');
			Route::get('deleteManyMainTypes/{ids}', [MainTypes::class, 'deleteManyMainTypes'])->middleware('permissions:Main_type,delete');
		});

		//sizes
		Route::group(['prefix' => 'Size'], function () {
			Route::get('sizesInfo', [Sizes::class, 'sizesInfo'])->middleware('permissions:Size,view');
			Route::get('viewCreateSize/{id?}', [Sizes::class, 'viewCreateSize'])->middleware('permissions:Size,create');
			Route::post('createSize', [Sizes::class, 'createSize'])->middleware('permissions:Size,create');
			Route::get('deleteSize/{id}', [Sizes::class, 'deleteSize'])->middleware('permissions:Size,delete');
			Route::get('deleteManySizes/{ids}', [Sizes::class, 'deleteManySizes'])->middleware('permissions:Size,delete');
		});

		//measur_unets
		Route::group(['prefix' => 'Measur_unit'], function () {
			Route::get('measurUnitsInfo', [MeasurUnits::class, 'measurUnitsInfo'])->middleware('permissions:Measur_unit,view');
			Route::get('viewCreateMeasurUnit/{id?}', [MeasurUnits::class, 'viewCreateMeasurUnit'])->middleware('permissions:Measur_unit,create');
			Route::post('createMeasurUnit', [MeasurUnits::class, 'createMeasurUnit'])->middleware('permissions:Measur_unit,create');
			Route::get('deleteMeasurUnit/{id}', [MeasurUnits::class, 'deleteMeasurUnit'])->middleware('permissions:Measur_unit,delete');
			Route::get('deleteManyMeasurUnits/{ids}', [MeasurUnits::class, 'deleteManyMeasurUnits'])->middleware('permissions:Measur_unit,delete');
		});

		//categories
		Route::group(['prefix' => 'Category'], function () {
			Route::get('categoriesInfo', [Categories::class, 'categoriesInfo'])->middleware('permissions:Category,view');
			Route::get('viewCreateCategory/{id?}', [Categories::class, 'viewCreateCategory'])->middleware('permissions:Category,create');
			Route::post('createCategory', [Categories::class, 'createCategory'])->middleware('permissions:Category,create');
			Route::get('deleteCategory/{id}', [Categories::class, 'deleteCategory'])->middleware('permissions:Category,delete');
			Route::get('deleteManyCategories/{ids}', [Categories::class, 'deleteManyCategories'])->middleware('permissions:Category,delete');
		});

		//sub categories
		Route::group(['prefix' => 'S_category'], function () {
			Route::get('s_categoriesInfo', [S_categories::class, 's_categoriesInfo'])->middleware('permissions:S_category,view');
			Route::get('viewCreateS_category/{id?}', [S_categories::class, 'viewCreateS_category'])->middleware('permissions:S_category,create');
			Route::post('createS_category', [S_categories::class, 'createS_category'])->middleware('permissions:S_category,create');
			Route::get('deleteS_category/{id}', [S_categories::class, 'deleteS_category'])->middleware('permissions:S_category,delete');
			Route::get('deleteManyS_categories/{ids}', [S_categories::class, 'deleteManyS_categories'])->middleware('permissions:S_category,delete');
		});

		//generalSetting
		Route::group(['prefix' => 'Setting'], function () {
			Route::get('generalSetting', [Settings::class, 'generalSetting'])->middleware('permissions:Setting,view');
			Route::get('viewCreateSetting/{id?}', [Settings::class, 'viewCreateSetting'])->middleware('permissions:Setting,create');
			Route::post('createSetting', [Settings::class, 'createSetting'])->middleware('permissions:Setting,create');
			Route::get('deleteSetting/{id}', [Settings::class, 'deleteSetting'])->middleware('permissions:Setting,delete');
			Route::get('deleteManySettings/{ids}', [Settings::class, 'deleteManySettings'])->middleware('permissions:Setting,delete');
		});

		//countries
		Route::group(['prefix' => 'Country'], function () {
			Route::get('countriesInfo', [Countries::class, 'countriesInfo'])->middleware('permissions:Country,view');
			Route::get('viewCreateCountry/{id?}', [Countries::class, 'viewCreateCountry'])->middleware('permissions:Country,create');
			Route::post('createCountry', [Countries::class, 'createCountry'])->middleware('permissions:Country,create');
			Route::get('deleteCountry/{id}', [Countries::class, 'deleteCountry'])->middleware('permissions:Country,delete');
			Route::get('deleteManyCountries/{ids}', [Countries::class, 'deleteManyCountries'])->middleware('permissions:Country,delete');
		});

		//cities
		Route::group(['prefix' => 'City'], function () {
			Route::get('citiesInfo', [Cities::class, 'citiesInfo'])->middleware('permissions:City,view');
			Route::get('viewCreateCity/{id?}', [Cities::class, 'viewCreateCity'])->middleware('permissions:City,create');
			Route::post('createCity', [Cities::class, 'createCity'])->middleware('permissions:City,create');
			Route::get('deleteCity/{id}', [Cities::class, 'deleteCity'])->middleware('permissions:City,delete');
			Route::get('deleteManyCities/{ids}', [Cities::class, 'deleteManyCities'])->middleware('permissions:City,delete');
		});

		//stats
		Route::group(['prefix' => 'State'], function () {
			Route::get('statesInfo', [States::class, 'statesInfo'])->middleware('permissions:State,view');
			Route::get('viewCreateState/{id?}', [States::class, 'viewCreateState'])->middleware('permissions:State,create');
			Route::post('createState', [States::class, 'createState'])->middleware('permissions:State,create');
			Route::get('deleteState/{id}', [States::class, 'deleteState'])->middleware('permissions:State,delete');
			Route::get('deleteManyStates/{ids}', [States::class, 'deleteManyStates'])->middleware('permissions:State,delete');
			//cities //without permission middleware ajax request
			Route::get('getCities/{city_id}', [States::class, 'getCities']);
		});

		//brands
		Route::group(['prefix' => 'Brand'], function () {
			Route::get('brandsInfo', [Brands::class, 'brandsInfo'])->middleware('permissions:Brand,view');
			Route::get('viewCreateBrand/{id?}', [Brands::class, 'viewCreateBrand'])->middleware('permissions:Brand,create');
			Route::post('createBrand', [Brands::class, 'createBrand'])->middleware('permissions:Brand,create');
			Route::get('deleteBrand/{id}', [Brands::class, 'deleteBrand'])->middleware('permissions:Brand,delete');
			Route::get('deleteManyBrands/{ids}', [Brands::class, 'deleteManyBrands'])->middleware('permissions:Brand,delete');
		});

		//colors
		Route::group(['prefix' => 'Color'], function () {
			Route::get('colorsInfo', [Colors::class, 'colorsInfo'])->middleware('permissions:Color,view');
			Route::get('viewCreateColor/{id?}', [Colors::class, 'viewCreateColor'])->middleware('permissions:Color,create');
			Route::post('createColor', [Colors::class, 'createColor'])->middleware('permissions:Color,create');
			Route::get('deleteColor/{id}', [Colors::class, 'deleteColor'])->middleware('permissions:Color,delete');
			Route::get('deleteManyColors/{ids}', [Colors::class, 'deleteManyColors'])->middleware('permissions:Color,delete');
		});

		//items
		Route::group(['prefix' => 'Item'], function () {
			Route::get('itemsInfo', [Items::class, 'itemsInfo'])->middleware('permissions:Item,view');
			Route::get('viewCreateItem/{id?}', [Items::class, 'viewCreateItem'])->middleware('permissions:Item,create');
			Route::post('createItem', [Items::class, 'createItem'])->middleware('permissions:Item,create');
			Route::get('deleteItem/{id}', [Items::class, 'deleteItem'])->middleware('permissions:Item,delete');
			Route::get('deleteManyItems/{ids}', [Items::class, 'deleteManyItems'])->middleware('permissions:Item,delete');
			//item_images
			Route::post('createItemImages', [Items::class, 'createItemImages'])->middleware('permissions:Item_image,create');
			Route::get('removedFile/{id}', [Items::class, 'removedFile'])->middleware('permissions:Item_image,delete');
			//sizes //without permission middleware ajax request
			Route::get('getSizes/{sub_cat_id}', [Items::class, 'getSizes']);
		});

		//orders
		Route::group(['prefix' => 'Order'], function () {
			Route::get('ordersInfo', [Orders::class, 'ordersInfo'])->middleware('permissions:Order,view');
			Route::get('viewCreateOrder/{id?}', [Orders::class, 'viewCreateOrder'])->middleware('permissions:Order,create');
			Route::post('createUser', [Orders::class, 'createUser'])->middleware('permissions:User,create');
			Route::get('getUser/{user_id}', [Orders::class, 'getUser'])->middleware('permissions:User,view');
			Route::get('oneItemInfo/{item_id}', [Orders::class, 'oneItemInfo'])->middleware('permissions:User,view');
			Route::post('createOrder', [Orders::class, 'createOrder'])->middleware('permissions:Order,create');
			Route::get('changeOrderStatus/{id}/{status}', [Orders::class, 'changeOrderStatus'])->middleware('permissions:Order,create');
			Route::get('deleteOrder/{id}', [Orders::class, 'deleteOrder'])->middleware('permissions:Order,delete');
			Route::get('deleteManyOrders/{ids}', [Orders::class, 'deleteManyOrders'])->middleware('permissions:Order,delete');

			//order_items
			// Route::post('createItemImages','Orders@createItemImages')->middleware('permissions:Order_item,create');
			// Route::get('removedFile/{id}','Orders@removedFile')->middleware('permissions:Order_item,delete');

		});
	});
});
