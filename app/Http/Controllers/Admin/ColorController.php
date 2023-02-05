<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Repo\Admin\Color\ColorRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Color\ColorCreateRequest;
use App\Http\Requests\Admin\Color\ColorUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
    public function index(Request $request)
    {
        return ColorRepo::get($request->get('query_string') ?? -1);
    }

    public function create()
    {
        return ColorRepo::create();
    }

    public function store(ColorCreateRequest $request)
    {
        return ColorRepo::store($request);
    }

    public function edit(Color $color)
    {
        return ColorRepo::edit($color);
    }

    public function update(ColorUpdateRequest $request, Color $color)
    {
        return ColorRepo::update($request, $color);
    }

    public function destroy(Color $color)
    {
        return ColorRepo::destroy($color);
    }

    public function destroyMany($ids)
    {
        return ColorRepo::destroyMany($ids);
    }
}
