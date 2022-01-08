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

    public function addFurniturePage(){

        $this->middleware('auth');

        if(auth()->user()->role == 'admin'){

            return view('addFurniture');
        }
    }

    public function viewFurniture(){

        $furnitures = Furniture::all();
        return view('view', compact('furnitures', $furnitures));
    }

    public function addFurniture(Request $request){

        $rules = [
            'name' => 'required|max:15',
            'price' => 'required|numeric|min:5000|max:10000000',
            'type' => 'required',
            'color' => 'required',
            'image' => 'required|mimes:jpg,png'
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $file = $request->file('image');
        $imageName = time().'.'.$file->getClientOriginalExtension();
        Storage::putFileAs('public/images',$file,$imageName);


        $furnitures = Furniture::create(request(['name', 'price', 'type', 'color', 'image']));

        $furnitures->image = 'images/'.$imageName;

        $furnitures->save();

        return redirect('/');
    }

    public function updateFurniturePage(){

        $this->middleware('auth');

        if(auth()->user()->role == 'admin'){

            return view('updateFurniture');
        }
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

        Storage::delete('public/storage/'.$furnitures->image);

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
        return redirect('view')->with('success','Post has been deleted');
    }

    public function furnitureDetails($id){
        $furnitures = Furniture::find($id);
        if ($furnitures==null) {
            return redirect('/');
        }
        return view('furnitureDetails',['f'=>$furnitures]);
    }

}
