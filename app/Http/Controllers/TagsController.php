<?php

namespace App\Http\Controllers;

use App\Http\Resources\TagsResource;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tag::latest()->get();
        return response()->json([
            "message" => "all tags",
            "tags" => TagsResource::collection($tags),
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tag_name' => 'required',
            'category_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response($validator->messages(), 422);
        } else {
            $catgeory = Category::where('id', $request->category_id)->first();
            if ($catgeory) {
                $tags = Tag::create([
                    'tag_name' => $request->tag_name,
                    'tag_slug' => Str::slug($request->tag_name) . Str::random(4),
                    'category_id' => $request->category_id,
                    'user_modify' => Auth::user()->id,
                ]);

                return response()->json([
                    "message" => "success create tags",
                    "tags" => new TagsResource($tags),
                ]);
            } else {
                return response()->json([
                    "message" => "category not in the list"
                ]);
            }
        }
    }

    public function update(Request $request, Tag $tag)
    {

        $validator = Validator::make($request->all(), [
            'tag_name' => 'required',
            'category_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response($validator->messages(), 422);
        } else {

            $catgeory = Category::where('id', $request->category_id)->first();

            if ($catgeory) {
                $tag->update([
                    'tag_name' => $request->tag_name,
                    'category_id' => $request->category_id,
                    'user_modify' => Auth::user()->id,
                ]);

                return response()->json([
                    "message" => "success update tags",
                    "tags" => new TagsResource($tag),
                ]);
            } else {

                return response()->json([
                    "message" => "category not in the list"
                ]);
            }
        }
    }

    public function show(Tag $tag)
    {
        return response()->json([
            "message" => "success",
            "tags" => new TagsResource($tag),
        ]);
    }

    public function destroy(Tag $tag)
    {

        $tag->delete();

        return response()->json([
            "message" => "success delete tag",
        ]);
    }
}
