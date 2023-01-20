<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Repo\Admin\Vendor\VendorRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Vendor\VendorCreateRequest;
use App\Http\Requests\Admin\Vendor\VendorUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Vendor;

class VendorController extends Controller
{

    public function index(Request $request)
    {
        return VendorRepo::get($request->get('query_string') ?? -1);
    }

    public function create()
    {
        return VendorRepo::create();
    }

    public function store(VendorCreateRequest $request)
    {
        return VendorRepo::store($request);
    }

    public function edit(Vendor $vendor)
    {
        return VendorRepo::edit($vendor);
    }

    public function update(VendorUpdateRequest $request, Vendor $vendor)
    {
        return VendorRepo::update($request,$vendor);
    }

    public function destroy(Vendor $vendor)
    {
        return VendorRepo::destroy($vendor);
    }

    public function destroyMany($ids)
    {
        return VendorRepo::destroyMany($ids);
    }

}
