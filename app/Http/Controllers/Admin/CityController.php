<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Repo\Admin\City\CityRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\City\CityCreateRequest;
use App\Http\Requests\Admin\City\CityUpdateRequest;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    
    public function index(Request $request)
    {
        return CityRepo::get($request->get('query_string') ?? -1);
    }
    
    public function countryCities(Country $country)
    {
        return CityRepo::getCountryCities($country);
    }

    public function create()
    {
        return CityRepo::create();
    }

    public function store(CityCreateRequest $request)
    {
        return CityRepo::store($request);
    }

    public function edit(City $city)
    {
        return CityRepo::edit($city);
    }

    public function update(CityUpdateRequest $request, City $city)
    {
        return CityRepo::update($request, $city);
    }

    public function destroy(City $city)
    {
        return CityRepo::destroy($city);
    }

    public function destroyMany($ids)
    {
        return CityRepo::destroyMany($ids);
    }

}
