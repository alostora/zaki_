<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Repo\Admin\ItemRepo;
use App\Models\Item;
use App\Models\Country;
use App\Models\Category;
use App\Models\S_category;
use App\Models\Item_image;
use App\Models\Size;
use App\Models\Item_color;
use App\Models\Color;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Lang;

class Items extends Controller
{
    

    public function itemsInfo(){

        $data['data'] = Item::get();
        $data['title'] = 'item';
        $data['createPath'] = url('admin/Item/viewCreateItem');
        $data['deletePath'] = url('admin/Item/deleteManyItems');
        return view('Admin/Items/itemsInfo',$data);
    }




    public function viewCreateItem($id=false){
       
        $data['data'] = Item::find($id);
        $data['countries'] = Country::get();
        $data['colors']= Color::get();
        $data['s_categories'] = S_category::get();

        if (!empty($data['data'])) {
            $data['sizes']= Size::where('type_id',$data['data']->type_id)->get();
            $data['selectedColors'] = Item_color::where('item_id',$data['data']->id)->get([
                'color_id','size_id','qty'
            ]);
        }

        if (!count($data['countries'])) {
            session()->flash('warning',Lang::get('leftsidebar.create country first plz'));
            return redirect('admin/Country/viewCreateCountry');
        }

        if (!count($data['s_categories'])) {
            session()->flash('warning',Lang::get('leftsidebar.create sub category first plz'));
            return redirect('admin/S_category/viewCreateS_category');
        }
        return view('Admin/Items/viewCreateItem',$data);
    }




    public function createItem(Request $request){

        $validated = $request->validate(ItemRepo::ItemCreateValidate($request));
        $destinationPath = public_path('Admin_uploads/items/');

        $subCat = S_category::find($validated['sub_cat_id']);
        $category = Category::find($subCat->cat_id);
        
        $validated['cat_id'] = $category->id;
        $validated['type_id'] = $category->type_id;
        $validated['itemDiscount'] = $validated['itemDiscount'] != null ? $validated['itemDiscount'] : 0;

        if(empty($validated['id'])){
            $validated['id'] = Item::create($validated)->id;
        }else{
            Item::where('id',$validated['id'])->update($validated);
        }

        $color_id = $request->color_id;
        if (!empty($color_id) && is_array($color_id)) {
            Item_color::where('item_id',$validated['id'])->delete();
            foreach($color_id as $colorId=>$sizesQty){
                $color = Color::find($colorId);
                if(!empty($color)){
                    if (is_array($sizesQty) && count($sizesQty)) {
                        foreach ($sizesQty as $size_id => $qty) {
                            if (!empty($qty)) {
                                Item_color::create([
                                    'item_id' => $validated['id'],
                                    'color_id' => $color->id,
                                    'size_id' => $size_id,
                                    'qty' => $qty,
                                ]);
                            }
                        }
                    }
                }
            }
        }

        session()->flash('success','created');
        return redirect('admin/Item/viewCreateItem/'.$validated['id']);
    }







    public function deleteItem($id){
        $destinationPath = public_path('Admin_uploads/items/');
        $item = Item::with('images')->find($id);
        if (!empty($item) && count($item->images)>0) {
            foreach($item->images as $img){
                File::delete($destinationPath . $img->imageName);
            }
            $item->delete();
        }
        session()->flash('warning','Done');
        return back();
    }





    public function deleteManyItems($ids){

        $ids = json_decode($ids);
        $destinationPath = public_path('Admin_uploads/items/');
        $items = Item::whereIn('id',$ids)->get();

        if (!empty($items)) {
            foreach($items as $item){
                if (count($item->images)>0) {
                    foreach($item->images as $img){
                        File::delete($destinationPath . $img->imageName);
                    }
                }
                $item->delete();
            }
        }
        session()->flash('warning','Done');
        return back();
    }





    //drop zone
    public function createItemImages(Request $request){

        $validated = $request->validate(ItemRepo::createImageValidate($request));
        $data['status'] = true;

        $destinationPath = public_path('Admin_uploads/items/');
        if($request->hasFile('images')) {
            $itemImages = Item_image::where('item_id',$request->id)->count();
            if ($itemImages == 3) {
                $data['status'] = false;
                $data['message'] = 'you can upload only 3 images';
                return $data;
            }

            $image = $request->file('images');
            $imgeName = ItemRepo::imageHandle($image,$destinationPath);
            $data['image'] = Item_image::create([
                'imageName' =>$imgeName,
                'item_id'   =>$request->id
            ]);
        }
        $data['message'] = 'Done';
        return $data;
    }




    
    public function removedFile($id){

        $destinationPath = public_path('Admin_uploads/items/');
        $img = Item_image::find($id);
        if (!empty($img)) {
            File::delete($destinationPath . $img->imageName);
            $img->delete();
        }
        $data['status'] = true;
        $data['message'] = 'Done';

        return $data;
    }
    //dropZone




    public function getSizes($sub_cat_id){
        $sub_cat = S_category::find($sub_cat_id);
        $category = Category::find($sub_cat->cat_id);
        $sizes = Size::where('type_id',$category->type_id)->get();
        $data['status'] = true;
        $data['sizes'] = $sizes;

        return $data;
    }



}
