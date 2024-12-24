<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Item;
use App\Http\Resources\ItemResource;

class ItemController extends Controller
{
    //svi komadi(po korisnikovom id-u)

    public function index()
    {
        $item = Item::whereHas('wardrobe', function ($query) {
            $query->where('user_id', auth()->id());
        })->get();
        return response()->json(ItemResource::collection($item));
    }

    //konkretni komadi 
    public function show($id)
    {
        $item = Item::whereHas('wardrobe', function ($query) {
            $query->where('user_id', auth()->id());
        })->findOrFail($id);
        return response()->json(new ItemResource($item));
    }

    //novi komadi
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ime' => 'required|string|max:255',
            'kategorija' => 'required|string|max:255',
            'boja' => 'required|string|max:255',
            'temperatura' => 'required|string|max:255',
            'slika' => 'required|file|mimes:jpg,jpeg,png|max:2048',
            'wardrobe_id' => 'required|exists:wardrobes,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
       }
       $data=$request->all();
       $data['slika']=$request->file('slika')->store('slike','public');
       $item=Item::create($data);
       return response()->json(new ItemResource($item));
    }
    

    //ažuriranje starih
    public function update(Request $request, $id)
    {
        $item = Item::whereHas('wardrobe', function ($query) {
            $query->where('user_id', auth()->id());
        })->findOrFail($id);
        $validator = Validator::make($request->all(), [
            'ime' => 'required|string|max:255',
            'kategorija' => 'required|string|max:255',
            'boja' => 'required|string|max:255',
            'temperatura' => 'required|string|max:255',
            'slika' => 'required|file|mimes:jpg,jpeg,png|max:2048',
            'wardrobe_id' => 'required|exists:wardrobes,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }


        $data = $request->all();
   
        if ($request->hasFile('slika')) {
            if ($item->slika && Storage::exists('public/' . $item->slika)) {
                Storage::delete('public/' . $item->slika);
            }
            $data['slika'] = $request->file('slika')->store('slike', 'public'); 
        }
        $item->update($data);
        return response()->json(new ItemResource($item));
    }

    //brisanje komada
    public function destroy($id)
    {
        $item = Item::whereHas('wardrobe', function ($query) {
            $query->where('user_id', auth()->id());
        })->findOrFail($id);


        $item->delete();
        return response()->json(['message' => 'Success.']);
    }
}
