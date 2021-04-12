<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index(){
        $sliders = Slider::get();
        return view('admin.slider.index', compact('sliders'));
    }

    public function create(){
        return view('admin.slider.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'image'=>'required|mimes:jpeg, png'
        ]);
        $image = $request->file('image')->store('public/slider');
        Slider::create([
            'image'=>$image
        ]);
        drakify('success');
        return redirect()->route('slider.index');
    }

    public function destroy($id){
        Slider::find($id)->delete();
        drakify('success');
        return redirect()->back();
    }
}
