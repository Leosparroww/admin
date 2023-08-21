<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function category()
    {

        $category = Category::paginate('10');
        return view('category.categoryList', compact('category'));
    }
    public function categoryCreatePage()
    {
        return view('category.categoryCreate');
    }
    public function categoryCreate(Request $request)
    {
        $this->categoryValidation($request);
        $file = $request->file('categoryImg');
        $filename = uniqid() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/image/', $filename);
        $data = $this->categoryData($request);
        $data['image'] = $filename;
        Category::create($data);
        return view('category.categoryCreate');
    }

    //delete
    public function categoryDelete(Request $request)
    {
        $filename = Category::select('image')->where('id', $request->id)->first()->image;

        Storage::delete('public/image/' . $filename);
        Category::where('id', $request->id)->delete();
        return response()->json(['status' => 'success']);
    }
    //status publish
    public function categoryPublish(Request $request)
    {
        Category::where('id', $request->id)->update(['publish' => $request->status]);
        return response()->json(['status' => 'change']);

    }
    private function categoryData($request)
    {
        return [
            'name' => $request->categoryName,
            'publish' => $request->publish,
        ];
    }
    private function categoryValidation($request)
    {
        Validator::make($request->all(), [
            'categoryName' => 'required|min:3|unique:categories,name,',
            'categoryImg' => 'required|mimes:jpg,png,jpeg,webp',
        ])->validate();
    }

}
