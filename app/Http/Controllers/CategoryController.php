<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::latest()->get();
        return response()->json([
            "message" => "all category",
            "category" => CategoryResource::collection($category),
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_name' => 'required',
            'category_image' => 'required',
        ]);

        if ($validator->fails()) {
            return response($validator->messages(), 422);
        } else {
            $image = $request->file('category_image');
            $imageUrl = Storage::disk('public')->putFile('Category', $image);
            $category = Category::create([
                'category_name' => $request->category_name,
                'category_slug' => Str::slug($request->category_name) . Str::random(4),
                'category_image' => $imageUrl,
                'user_modify' => Auth::user()->id,
            ]);

            return response()->json([
                "message" => "success create category",
                "category" => new CategoryResource($category),
            ]);
        }
    }

    public function update(Request $request, Category $category)
    {

        $validator = Validator::make($request->all(), [
            'category_name' => 'required',
        ]);

        if ($validator->fails()) {
            return response($validator->messages(), 422);
        } else {

            if ($request->file('category_image')) {

                Storage::disk('public')->delete('Category', $category->category_image);

                $image = $request->file('category_image');
                $imageUrl = Storage::disk('public')->putFile('Category', $image);
            } else {

                $imageUrl = $category->category_image;
            }


            $category->update([
                'category_name' => $request->category_name,
                'category_image' => $imageUrl,
                'user_modify' => Auth::user()->id,
            ]);

            return response()->json([
                "message" => "success create category",
                "category" => new CategoryResource($category),
            ]);
        }
    }

    public function show(Category $category)
    {
        return response()->json([
            "message" => "success",
            "category" => new CategoryResource($category),
        ]);
    }

    public function destroy(Category $category)
    {
        Storage::disk('public')->delete('Category', $category->category_image);

        $category->delete();

        return response()->json([
            "message" => "success delete category",
        ]);
    }
}
