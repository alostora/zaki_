<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Repo\Admin\Item\ItemRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Item\ItemCreateRequest;
use App\Http\Requests\Admin\Item\ItemUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{

    public function index(Request $request)
    {
        return ItemRepo::get($request->get('query_string') ?? -1);
    }

    public function create()
    {
        return ItemRepo::create();
    }

    public function store(ItemCreateRequest $request)
    {
        return ItemRepo::store($request);
    }

    public function edit(Item $Item)
    {
        return ItemRepo::edit($Item);
    }

    public function update(ItemUpdateRequest $request, Item $Item)
    {
        return ItemRepo::update($request, $Item);
    }

    public function destroy(Item $Item)
    {
        return ItemRepo::destroy($Item);
    }

    public function destroyMany($ids)
    {
        return ItemRepo::destroyMany($ids);
    }
}
