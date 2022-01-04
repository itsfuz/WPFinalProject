<?php

namespace App\Http\Controllers;
use App\Models\Furniture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class FurnitureController extends Controller
{
    public function index(){
        return view('home');
    }

    public function viewFurniture(){
        $furnitures = Furniture::all();
        return view('view', compact('furnitures', $furnitures));
    }

    public function addFurniture(Request $request){
        $rules = [
            'name' => 'required|max:15',
            'price' => 'required|numeric|min:5000|max:10000000',
            'image' => 'required|mimes:jpg,png',
            'type' => 'required',
            'color' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $furnitures = new Furniture();

        $furnitures -> name = $request-> name;
        $furnitures -> price = $request-> price;
        $furnitures -> color = $request->color;
        $file = $request->file('image');
        $imageName = time().'.'.$file->getClientOriginalExtension();
        Storage::putFileAs('public/storage/images',$file,$imageName);
        $furnitures->image = 'images/'.$imageName;
        $furnitures -> type = $request->type;


        $furnitures->save();

        return redirect()->back();

    }

    public function updateFurniture(Request $request){

        $furnitures = Furniture::find($request->id);

        $furnitures -> name = $request-> name;
        $furnitures -> price = $request-> price;
        $furnitures -> color = $request->color;
        $file = $request->file('image');
        $imageName = time().'.'.$file->getClientOriginalExtension();
        Storage::putFileAs('public/storage/images',$file,$imageName);
        $furnitures -> type = $request->type;

        Storage::delete('public/'.$furnitures->image);
        $request->image->move(public_path('images'), $imageName);
        $furnitures->save();

        return redirect()->back();

    }

    public function deleteFurniture($id){
        $furnitures = Furniture::find($id);
        if($furnitures !=null) {
            Storage::delete('public/'.$furnitures->image);
            $furnitures-> delete();
        }
        return redirect()->back();
    }
}
