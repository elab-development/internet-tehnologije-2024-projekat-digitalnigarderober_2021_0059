<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Outfit;
use App\Http\Resources\OutfitResource;

class OutfitController extends Controller
{
    //svi autfititi
    public  function index(){
        $outfit=Outfit::where('user_id',auth()->id())->get();
        return response()->json(OutfitResource::collection($outfit));
    }

    //konkretni outfit
    public function show($id){

        $outfit=Outfit::where('user_id',auth()->id())->findOrFail($id);
        return response()->json(new OutfitResource($outfit));
    }

      //novi outfit     
    public function store(Request $request){

        $validator=Validator::make($request->all(),[
            'ime'=>'required|string|max:255',
            'datum'=>'required|date|max:255',
            'temperatura'=>'required|string|max:255',
            'dogadjaj'=>'nullable|string|max:255',
        ]);
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors(),422]);
        }
        $outfit=Outfit::create([
            'ime' => $request->ime,
            'datum' => $request->datum,
            'temperatura' => $request->temperatura,
            'dogadjaj' => $request->dogadjaj,
            'user_id' => auth()->id(),
        ]);
        return response()->json(new OutfitResource($outfit));

    }

    //ažuriranje
    public function update(Request $request,$id){
        $outfit=Outfit::where('user_id',auth()->id()->FindOrFail($id));
        $validator=Validator::make($request->all(),[
            'ime' =>'required|string|max:255',
            'datum' =>'required|date',
            'temperatura' => 'required|string|max:255',
            'dogadjaj' => 'nullable|string|max:255',
            
        ]);

        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors(),422]);
        }

            $outfit->update($request->only(['ime', 'datum', 'temperatura', 'dogadjaj']));
            return response()->json(new OutfitResource($outfit));
    

    }

    //brisanje
    public function destroy($id){

        $outfit=Outfit::where('user_id',auth()->id()->FindOrFail($id));
        $outfit->delete();
        return response()->json(['message'=>'Success.']);
    }
}
