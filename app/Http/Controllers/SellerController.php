<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function sellItemAdd(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'category' => 'required|exists:categories,id',
                'name' => 'required|string',
                'price' => 'required|numeric',
                'desc' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }


            $tbl = new Item();

            $slug = Str::slug($request->name);
            $count = Item::whereSlug($slug)->count();
            if ($count > 0) {
                $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
            }


            $tbl->slug = $slug;
            $tbl->user_id = Auth::id();
            $tbl->category = $request->category;
            $tbl->name = $request->name;
            $tbl->price = $request->price;
            $tbl->description = $request->desc;

            if ($request->hasFile('image')) {
                $file = $request->file('image');

                $filename = time() . "_" . $file->getClientOriginalName();

                $storageDirectory = 'public/items';

                if (!Storage::exists($storageDirectory)) {
                    Storage::makeDirectory($storageDirectory);
                }

                $moved = $file->storeAs($storageDirectory, $filename);

                if ($moved) {
                    $imagePath = Storage::url($storageDirectory . '/' . $filename);
                    $tbl->image = $imagePath;
                } else {
                    return back()->with(['status' => 'error', 'message' => 'file not saved!']);
                }
            }

            $tbl->save();

            return back()->with(['success' => 'Item Add successfully']);
        } catch (Exception $e) {
            return back()
                ->with(['error' => $e->getMessage()])
                ->withInput();
        }
    }


    public function sellItemDetails($slug)
    {
        $data = Item::getItemBySlug($slug);
        $latest = Item::getLatestRecord();
        $detailPage = 'pages.sell-item-detail';
        return view($detailPage, compact('data', 'latest'));
    }
}
