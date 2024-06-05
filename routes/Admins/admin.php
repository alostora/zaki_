<?php

use App\Http\Controllers\Admin\Admin\AdminAuthController;
use App\Http\Controllers\Admin\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\ItemImageController;
use App\Http\Controllers\Admin\ItemPropertyController;
use App\Http\Controllers\Admin\MainTypeController;
use App\Http\Controllers\Admin\MeasureUnitController;
use App\Http\Controllers\Admin\Orders;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VendorController;
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

		//admins
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

		//users
		Route::group(['prefix' => 'User'], function () {

			Route::get('/', [UserController::class, 'index'])->middleware('permissions:Permission,view');

			Route::get('create', [UserController::class, 'create'])->middleware('permissions:Permission,create');

			Route::post('store', [UserController::class, 'store'])->middleware('permissions:Permission,create');

			Route::get('edit/{user}', [UserController::class, 'edit'])->middleware('permissions:Permission,create');

			Route::patch('update/{user}', [UserController::class, 'update'])->middleware('permissions:Permission,create');

			Route::get('delete/{user}', [UserController::class, 'destroy'])->middleware('permissions:Permission,delete');

			Route::get('destroyMany/{ids}', [UserController::class, 'destroyMany'])->middleware('permissions:Permission,delete');
		});

		//vendros
		Route::group(['prefix' => 'Vendor'], function () {

			Route::get('/', [VendorController::class, 'index'])->middleware('permissions:Permission,view');

			Route::get('create', [VendorController::class, 'create'])->middleware('permissions:Permission,create');

			Route::post('store', [VendorController::class, 'store'])->middleware('permissions:Permission,create');

			Route::get('edit/{vendor}', [VendorController::class, 'edit'])->middleware('permissions:Permission,create');

			Route::patch('update/{vendor}', [VendorController::class, 'update'])->middleware('permissions:Permission,create');

			Route::get('delete/{vendor}', [VendorController::class, 'destroy'])->middleware('permissions:Permission,delete');

			Route::get('destroyMany/{ids}', [VendorController::class, 'destroyMany'])->middleware('permissions:Permission,delete');
		});

		//roles
		Route::group(['prefix' => 'Role'], function () {

			Route::get('/', [RoleController::class, 'index'])->middleware('permissions:Role,view');

			Route::get('create', [RoleController::class, 'create'])->middleware('permissions:Role,create');

			Route::post('store', [RoleController::class, 'store'])->middleware('permissions:Role,create');

			Route::get('edit/{role}', [RoleController::class, 'edit'])->middleware('permissions:Role,create');

			Route::patch('update/{role}', [RoleController::class, 'update'])->middleware('permissions:Role,create');

			Route::get('delete/{role}', [RoleController::class, 'destroy'])->middleware('permissions:Role,delete');

			Route::get('destroyMany/{ids}', [RoleController::class, 'destroyMany'])->middleware('permissions:Role,delete');
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

		//main types
		Route::group(['prefix' => 'MainType'], function () {

			Route::get('/', [MainTypeController::class, 'index'])->middleware('permissions:Permission,view');

			Route::get('create', [MainTypeController::class, 'create'])->middleware('permissions:Permission,create');

			Route::post('store', [MainTypeController::class, 'store'])->middleware('permissions:Permission,create');

			Route::get('edit/{mainType}', [MainTypeController::class, 'edit'])->middleware('permissions:Permission,create');

			Route::patch('update/{mainType}', [MainTypeController::class, 'update'])->middleware('permissions:Permission,create');

			Route::get('delete/{mainType}', [MainTypeController::class, 'destroy'])->middleware('permissions:Permission,delete');

			Route::get('destroyMany/{ids}', [MainTypeController::class, 'destroyMany'])->middleware('permissions:Permission,delete');
		});

		//sizes
		Route::group(['prefix' => 'Size'], function () {

			Route::get('/', [SizeController::class, 'index'])->middleware('permissions:Permission,view');

			Route::get('create', [SizeController::class, 'create'])->middleware('permissions:Permission,create');

			Route::post('store', [SizeController::class, 'store'])->middleware('permissions:Permission,create');

			Route::get('edit/{size}', [SizeController::class, 'edit'])->middleware('permissions:Permission,create');

			Route::patch('update/{size}', [SizeController::class, 'update'])->middleware('permissions:Permission,create');

			Route::get('delete/{size}', [SizeController::class, 'destroy'])->middleware('permissions:Permission,delete');

			Route::get('destroyMany/{ids}', [SizeController::class, 'destroyMany'])->middleware('permissions:Permission,delete');
		});

		//measure_unets
		Route::group(['prefix' => 'MeasureUnit'], function () {

			Route::get('/', [MeasureUnitController::class, 'index'])->middleware('permissions:Permission,view');

			Route::get('create', [MeasureUnitController::class, 'create'])->middleware('permissions:Permission,create');

			Route::post('store', [MeasureUnitController::class, 'store'])->middleware('permissions:Permission,create');

			Route::get('edit/{measureUnit}', [MeasureUnitController::class, 'edit'])->middleware('permissions:Permission,create');

			Route::patch('update/{measureUnit}', [MeasureUnitController::class, 'update'])->middleware('permissions:Permission,create');

			Route::get('delete/{measureUnit}', [MeasureUnitController::class, 'destroy'])->middleware('permissions:Permission,delete');

			Route::get('destroyMany/{ids}', [MeasureUnitController::class, 'destroyMany'])->middleware('permissions:Permission,delete');
		});

		//measure_unets
		Route::group(['prefix' => 'Category'], function () {

			Route::get('/', [CategoryController::class, 'index'])->middleware('permissions:Permission,view');

			Route::get('create', [CategoryController::class, 'create'])->middleware('permissions:Permission,create');

			Route::post('store', [CategoryController::class, 'store'])->middleware('permissions:Permission,create');

			Route::get('edit/{category}', [CategoryController::class, 'edit'])->middleware('permissions:Permission,create');

			Route::patch('update/{category}', [CategoryController::class, 'update'])->middleware('permissions:Permission,create');

			Route::get('delete/{category}', [CategoryController::class, 'destroy'])->middleware('permissions:Permission,delete');

			Route::get('destroyMany/{ids}', [CategoryController::class, 'destroyMany'])->middleware('permissions:Permission,delete');
		});

		//sub categories
		Route::group(['prefix' => 'SubCategory'], function () {

			Route::get('/', [SubCategoryController::class, 'index'])->middleware('permissions:Permission,view');

			Route::get('create', [SubCategoryController::class, 'create'])->middleware('permissions:Permission,create');

			Route::post('store', [SubCategoryController::class, 'store'])->middleware('permissions:Permission,create');

			Route::get('edit/{subCategory}', [SubCategoryController::class, 'edit'])->middleware('permissions:Permission,create');

			Route::patch('update/{subCategory}', [SubCategoryController::class, 'update'])->middleware('permissions:Permission,create');

			Route::get('delete/{subCategory}', [SubCategoryController::class, 'destroy'])->middleware('permissions:Permission,delete');

			Route::get('destroyMany/{ids}', [SubCategoryController::class, 'destroyMany'])->middleware('permissions:Permission,delete');
		});

		//generalSetting
		Route::group(['prefix' => 'Setting'], function () {

			Route::get('/', [SettingController::class, 'index'])->middleware('permissions:Permission,view');

			Route::get('create', [SettingController::class, 'create'])->middleware('permissions:Permission,create');

			Route::post('store', [SettingController::class, 'store'])->middleware('permissions:Permission,create');

			Route::get('edit/{setting}', [SettingController::class, 'edit'])->middleware('permissions:Permission,create');

			Route::patch('update/{setting}', [SettingController::class, 'update'])->middleware('permissions:Permission,create');

			Route::get('delete/{setting}', [SettingController::class, 'destroy'])->middleware('permissions:Permission,delete');

			Route::get('destroyMany/{ids}', [SettingController::class, 'destroyMany'])->middleware('permissions:Permission,delete');
		});

		//countries
		Route::group(['prefix' => 'Country'], function () {

			Route::get('/', [CountryController::class, 'index'])->middleware('permissions:Permission,view');

			Route::get('create', [CountryController::class, 'create'])->middleware('permissions:Permission,create');

			Route::post('store', [CountryController::class, 'store'])->middleware('permissions:Permission,create');

			Route::get('edit/{country}', [CountryController::class, 'edit'])->middleware('permissions:Permission,create');

			Route::patch('update/{country}', [CountryController::class, 'update'])->middleware('permissions:Permission,create');

			Route::get('delete/{country}', [CountryController::class, 'destroy'])->middleware('permissions:Permission,delete');

			Route::get('destroyMany/{ids}', [CountryController::class, 'destroyMany'])->middleware('permissions:Permission,delete');
		});

		//cities
		Route::group(['prefix' => 'City'], function () {

			Route::get('/', [CityController::class, 'index'])->middleware('permissions:Permission,view');

			Route::get('country-city/{country}', [CityController::class, 'countryCities'])->middleware('permissions:Permission,view');

			Route::get('create', [CityController::class, 'create'])->middleware('permissions:Permission,create');

			Route::post('store', [CityController::class, 'store'])->middleware('permissions:Permission,create');

			Route::get('edit/{city}', [CityController::class, 'edit'])->middleware('permissions:Permission,create');

			Route::patch('update/{city}', [CityController::class, 'update'])->middleware('permissions:Permission,create');

			Route::get('delete/{city}', [CityController::class, 'destroy'])->middleware('permissions:Permission,delete');

			Route::get('destroyMany/{ids}', [CityController::class, 'destroyMany'])->middleware('permissions:Permission,delete');
		});

		//states
		Route::group(['prefix' => 'State'], function () {

			Route::get('/', [StateController::class, 'index'])->middleware('permissions:Permission,view');

			Route::get('create', [StateController::class, 'create'])->middleware('permissions:Permission,create');

			Route::post('store', [StateController::class, 'store'])->middleware('permissions:Permission,create');

			Route::get('edit/{state}', [StateController::class, 'edit'])->middleware('permissions:Permission,create');

			Route::patch('update/{state}', [StateController::class, 'update'])->middleware('permissions:Permission,create');

			Route::get('delete/{state}', [StateController::class, 'destroy'])->middleware('permissions:Permission,delete');

			Route::get('destroyMany/{ids}', [StateController::class, 'destroyMany'])->middleware('permissions:Permission,delete');
		});

		//brands
		Route::group(['prefix' => 'Brand'], function () {

			Route::get('/', [BrandController::class, 'index'])->middleware('permissions:Permission,view');

			Route::get('create', [BrandController::class, 'create'])->middleware('permissions:Permission,create');

			Route::post('store', [BrandController::class, 'store'])->middleware('permissions:Permission,create');

			Route::get('edit/{brand}', [BrandController::class, 'edit'])->middleware('permissions:Permission,create');

			Route::patch('update/{brand}', [BrandController::class, 'update'])->middleware('permissions:Permission,create');

			Route::get('delete/{brand}', [BrandController::class, 'destroy'])->middleware('permissions:Permission,delete');

			Route::get('destroyMany/{ids}', [BrandController::class, 'destroyMany'])->middleware('permissions:Permission,delete');
			
		});
		
		//colors
		Route::group(['prefix' => 'Color'], function () {

			Route::get('/', [ColorController::class, 'index'])->middleware('permissions:Permission,view');

			Route::get('create', [ColorController::class, 'create'])->middleware('permissions:Permission,create');

			Route::post('store', [ColorController::class, 'store'])->middleware('permissions:Permission,create');

			Route::get('edit/{color}', [ColorController::class, 'edit'])->middleware('permissions:Permission,create');

			Route::patch('update/{color}', [ColorController::class, 'update'])->middleware('permissions:Permission,create');

			Route::get('delete/{color}', [ColorController::class, 'destroy'])->middleware('permissions:Permission,delete');

			Route::get('destroyMany/{ids}', [ColorController::class, 'destroyMany'])->middleware('permissions:Permission,delete');
			
		});

		//items
		Route::group(['prefix' => 'Item'], function () {

			Route::get('/', [ItemController::class, 'index'])->middleware('permissions:Permission,view');

			Route::get('create', [ItemController::class, 'create'])->middleware('permissions:Permission,create');

			Route::post('store', [ItemController::class, 'store'])->middleware('permissions:Permission,create');

			Route::get('edit/{item}', [ItemController::class, 'edit'])->middleware('permissions:Permission,create');

			Route::patch('update/{item}', [ItemController::class, 'update'])->middleware('permissions:Permission,create');

			Route::get('delete/{item}', [ItemController::class, 'destroy'])->middleware('permissions:Permission,delete');

			Route::get('destroyMany/{ids}', [ItemController::class, 'destroyMany'])->middleware('permissions:Permission,delete');
			
			Route::group(['prefix' => 'ItemImage'], function () {

				Route::get('{item}', [ItemImageController::class, 'index'])->middleware('permissions:Permission,view');
	
				Route::get('create/{item}', [ItemImageController::class, 'create'])->middleware('permissions:Permission,create');
	
				Route::post('store', [ItemImageController::class, 'store'])->middleware('permissions:Permission,create');
	
				Route::get('delete/{itemImage}', [ItemImageController::class, 'destroy'])->middleware('permissions:Permission,delete');
	
				Route::get('destroyMany/{ids}', [ItemImageController::class, 'destroyMany'])->middleware('permissions:Permission,delete');
			});
			
			Route::group(['prefix' => 'ItemProperty'], function () {

				Route::get('{item}', [ItemPropertyController::class, 'index'])->middleware('permissions:Permission,view');
	
				Route::get('create/{item}', [ItemPropertyController::class, 'create'])->middleware('permissions:Permission,create');
	
				Route::post('store', [ItemPropertyController::class, 'store'])->middleware('permissions:Permission,create');
	
				Route::get('delete/{itemProperty}', [ItemPropertyController::class, 'destroy'])->middleware('permissions:Permission,delete');
	
				Route::get('destroyMany/{ids}', [ItemPropertyController::class, 'destroyMany'])->middleware('permissions:Permission,delete');
			});
		
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
