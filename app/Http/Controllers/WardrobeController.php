<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Wardrobe;
use App\Http\Resources\WardrobeResource;

class WardrobeController extends Controller
{
    //svi garderoberi
    public function index()
    {
        $wardrobe = Wardrobe::where('user_id', auth()->id())->get();
        return response()->json(WardrobeResource::collection($wardrobe));
    }
    //jedan konkretni
    public function show($id)
    {
        $wardrobe = Wardrobe::where('user_id', auth()->id())->findOrFail($id);
        return response()->json(new WardrobeResource($wardrobe));
    }
    //novi garderober
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ime' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $wardrobe = Wardrobe::create([
            'ime' => $request->ime,
            'user_id' => auth()->id(),
        ]);
        return response()->json(new WardrobeResource($wardrobe), 201);
    }

// ažuriranje postojećeg
public function update(Request $request, $id)
{
    $wardrobe = Wardrobe::where('user_id', auth()->id())->findOrFail($id);
    $validator = Validator::make($request->all(), [
        'ime' => 'required|string|max:255',
    ]);
    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }
    $wardrobe->update($request->only('ime'));
    return response()->json(new WardrobeResource($wardrobe));
}

//brisanje
public function destroy($id)
{
    $wardrobe = Wardrobe::where('user_id', auth()->id())->findOrFail($id);
    $wardrobe->delete();
    return response()->json(['message' => 'Deleteing successfull.']);
}





}
