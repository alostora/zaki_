<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Repo\Admin\Item\ItemImage\ItemImageRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Item\ItemImage\ItemImageCreateRequest;
use App\Models\Item;
use App\Models\ItemImage;

class ItemImageController extends Controller
{

    public function index(Item $item)
    {
        return ItemImageRepo::get($item);
    }

    public function create()
    {
        return ItemImageRepo::create();
    }

    public function store(ItemImageCreateRequest $request)
    {
        return ItemImageRepo::store($request);
    }

    public function destroy(ItemImage $itemImage)
    {
        return ItemImageRepo::destroy($itemImage);
    }

    public function destroyMany($ids)
    {
        return ItemImageRepo::destroyMany($ids);
    }
}
