<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Repo\Admin\Country\CountryRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Country\CountryCreateRequest;
use App\Http\Requests\Admin\Country\CountryUpdateRequest;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{

    public function index(Request $request)
    {
        return CountryRepo::get($request->get('query_string') ?? -1);
    }

    public function create()
    {
        return CountryRepo::create();
    }

    public function store(CountryCreateRequest $request)
    {
        return CountryRepo::store($request);
    }

    public function edit(Country $country)
    {
        return CountryRepo::edit($country);
    }

    public function update(CountryUpdateRequest $request, Country $country)
    {
        return CountryRepo::update($request, $country);
    }

    public function destroy(Country $country)
    {
        return CountryRepo::destroy($country);
    }

    public function destroyMany($ids)
    {
        return CountryRepo::destroyMany($ids);
    }
}
