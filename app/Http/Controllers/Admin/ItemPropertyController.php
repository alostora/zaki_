<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Repo\Admin\Item\ItemProperty\ItemPropertyRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Item\ItemProperty\ItemPropertyCreateRequest;
use App\Models\Item;
use App\Models\ItemProperty;

class ItemPropertyController extends Controller
{

    public function index(Item $item)
    {
        return ItemPropertyRepo::get($item);
    }

    public function create()
    {
        return ItemPropertyRepo::create();
    }

    public function store(ItemPropertyCreateRequest $request)
    {
        return ItemPropertyRepo::store($request);
    }

    public function destroy(ItemProperty $itemProperty)
    {
        return ItemPropertyRepo::destroy($itemProperty);
    }

    public function destroyMany($ids)
    {
        return ItemPropertyRepo::destroyMany($ids);
    }
}
