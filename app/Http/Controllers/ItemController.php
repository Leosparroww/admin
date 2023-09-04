<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    //main page
    public function item()
    {

        $item = Item::where('categories.publish', 1)->select('items.*', 'categories.name as categoryName')
            ->leftJoin('categories', 'categories.id', 'items.category_id')
            ->paginate('10');

        return view('item.itemList', compact('item'));
    }
    //create Page
    public function itemCreatePage()
    {
        $category = Category::all();

        return view('item.itemCreate', compact('category'));
    }
    //create
    public function itemCreate(Request $request)
    {

        $this->itemValidation($request);
        $file = $request->file('image');
        $filename = uniqid() . '_' . $file->getClientOriginalName();
        $file->storeAs('image/', $filename, 's3');
        $file->storeAs('public/image', $filename);
        $data = $this->itemData($request);
        $data['image'] = $filename;
        Item::create($data);
        return redirect()->route('item');
    }

    //delete
    public function ItemDelete(Request $request)
    {
        $filename = Item::select('image')->where('id', $request->id)->first()->image;
        Storage::delete('public/image/' . $filename);
        Item::where('id', $request->id)->delete();
        return response()->json(['status' => 'deleted']);
    }
    //status publish
    public function ItemPublish(Request $request)
    {

        Item::where('id', $request->id)->update(['publish' => $request->status]);
        return response()->json(['status' => 'change']);

    }
    //data
    private function itemData($request)
    {
        return [
            'name' => $request->itemName,
            'category_id' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
            'item_condition' => $request->itemCondition,
            'item_type' => $request->itemType,
            'publish' => $request->publish,
            'owner' => $request->ownerName,
            'phone' => $request->phNo1 . $request->phNo,
            'address' => $request->address,
        ];
    }

    private function itemValidation($request)
    {
        Validator::make($request->all(), [
            'itemName' => 'required',
            'category' => 'required',
            'description' => 'required|min:20',
            'price' => 'required',
            'ownerName' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,webp',
        ])->validate();
    }
}
