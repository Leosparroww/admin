<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function categoryList()
    {
        $category = Category::paginate('6');
        $categoryCount = count($category);
        for ($i = 0; $i < $categoryCount; $i++) {
            $file = ('http://localhost:8000/storage/image/' . $category[$i]['image']);
            $category[$i]['image'] = $file;
        }
        return response()->json($category, 200);
    }

    public function productList(Request $request)
    {

        $product = Item::where('categories.publish', 1)->select('items.*', 'categories.name as categoryName')
            ->leftJoin('categories', 'categories.id', 'items.category_id');

        if ($request->key != "") {
            $product = $product->where('items.name', 'like', '%' . request('key') . '%');
            $product = $product->paginate('10');
        } else {
            $product = $product->paginate('10');

        }
        logger($request);

        $productCount = count($product);
        for ($i = 0; $i < $productCount; $i++) {
            $file = ('http://localhost:8000/storage/image/' . $product[$i]['image']);
            $product[$i]['image'] = $file;
        }

        return response()->json($product, 200);
    }
}