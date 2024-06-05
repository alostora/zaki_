<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Repo\Admin\Size\SizeRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Size\SizeCreateRequest;
use App\Http\Requests\Admin\Size\SizeUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Size;

class SizeController extends Controller
{

    public function index(Request $request)
    {
        return SizeRepo::get($request->get('query_string') ?? -1);
    }

    public function create()
    {
        return SizeRepo::create();
    }

    public function store(SizeCreateRequest $request)
    {
        return SizeRepo::store($request);
    }

    public function edit(Size $size)
    {
        return SizeRepo::edit($size);
    }

    public function update(SizeUpdateRequest $request, Size $size)
    {
        return SizeRepo::update($request, $size);
    }

    public function destroy(Size $size)
    {
        return SizeRepo::destroy($size);
    }

    public function destroyMany($ids)
    {
        return SizeRepo::destroyMany($ids);
    }
}
