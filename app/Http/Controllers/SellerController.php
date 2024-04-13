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

    public function sellItemAddForm()
    {
        $categories = Category::whereStatus('1')->get();

        return view('pages.sell.add', compact('categories'));
    }

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
        $detailPage = 'pages.sell.detail';
        return view($detailPage, compact('data', 'latest'));
    }




    public function SellEdit($id)
    {
        $item = Item::findOrFail($id);
        $categories = Category::whereStatus('1')->get();
        return view('pages.sell.edit', compact('item', 'categories'));
    }


    public function SellUpdate(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'category' => 'required|exists:categories,id',
                'name' => 'required|string',
                'price' => 'required|numeric',
                'desc' => 'required|string',
                'image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }


            $tbl = Item::whereUserId(Auth::id())->findOrFail($request->id);

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
                    $relativePath = str_replace('/storage', 'public', $tbl->image);
                    Storage::delete($relativePath);
                    $tbl->image = $imagePath;
                } else {
                    return back()->with(['status' => 'error', 'message' => 'file not saved!']);
                }
            }

            $tbl->save();

            return back()->with(['success' => 'Item updated successfully']);
        } catch (Exception $e) {
            return back()
                ->with(['error' => $e->getMessage()])
                ->withInput();
        }
    }


    public function SellDelete(Request $request, $id)
    {
        try {
            $item = Item::find($id);
            if (!$item)
                return redirect()->back()->with('error', 'Item not found.');

            $item->delete();

            return back()->with(['success' => 'Item Deleted succesfully!']);
        } catch (Exception $e) {
            return back()
                ->with(['error' => $e->getMessage()]);
        }
    }
}
