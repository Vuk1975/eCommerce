<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Product;
Use App\Models\Category;
Use App\Models\Subcategory;
Use App\Models\Slider;

class FrontProductListController extends Controller
{
    public function index(){
        
        $products = Product::latest()->limit(6)->get();
        $randomActiveProducts = Product::inRandomOrder()->limit(3)->get();
        $randomActiveProductIds = [];
        foreach($randomActiveProducts as $product){
            array_push($randomActiveProductIds, $product->id);
        } 
        
        $randomItemProducts = Product::whereNotIn('id', $randomActiveProductIds)->limit(3)->get();
        $sliders = Slider::get();
    

        return view('product', compact('products', 'randomItemProducts', 'randomActiveProducts', 'sliders'));
    }

    public function show($id){
        $product = Product::find($id);
        
        $productFromSameCategories = Product::inRandomOrder()->
        where('category_id', $product->category_id)->
        where('id', '!=', $product->id)
        ->limit(3)
        ->get();

        return view('show', compact('product', 'productFromSameCategories'));
    }

    public function allProduct($name, Request $request){

        $category = Category::where('slug', $name)->first();
        $categoryId = $category->id;
        $subcategories = Subcategory::where('category_id', $category->id)->get();
        $slug = $name;
   
        
        if($request->subcategory){
            //filter products by subcategory
            $products = $this->filterProducts($request);
            // colecting id of selected Subcategories to keep checked in frontend
            $filterSubCategories = $this->getSubCategoriesId($request);
            return view('category', compact('products', 'subcategories', 'slug', 'filterSubCategories', 'categoryId'));
            
        }
        elseif($request->min||$request->max){
            $products = $this->filterByPrice($request);
            return view('category', compact('products', 'subcategories', 'slug', 'categoryId'));
        }
        
        else{
            $products = Product::where('category_id', $category->id)->get();
            // set $filterSubCategories to null becouse frontend report "Undefined variable: filterSubCategories" if nothing is chacked
            return view('category', compact('products', 'subcategories', 'slug', 'categoryId'));
        
        }

        
       

        return view('category', compact('products', 'subcategories', 'slug', 'filterSubCategories', 'categoryId'));
    }
    //filter products by chacked Subcategory
    public function filterProducts(Request $request){
        $subId =[];
        $subcategory = Subcategory::whereIn('id',$request->subcategory)->get();
        foreach($subcategory as $sub){
            array_push($subId, $sub->id);
        }
        $products = Product::whereIn('subcategory_id',$subId)->get();
        return $products;

    }
    // colecting id of selected Subcategories to keep checked in frontend
    public function getSubCategoriesId(Request $request){
        $subId =[];
        $subcategory = Subcategory::whereIn('id',$request->subcategory)->get();
        foreach($subcategory as $sub){
            array_push($subId, $sub->id);
        }
        
        return $subId;

    }

    public function filterByPrice(Request $request){
        $categoryId = $request->categoryId;
        $product = Product::whereBetween('price',[$request->min,$request->max ])->where('category_id',$categoryId)->get();
        return $product;
    }

    public function moreProduct(Request $request){
        if($request->search){
            $products = Product::where('name', 'like', '%'.$request->search.'%')
            ->orWhere('description', 'like', '%'.$request->search.'%')
            ->orWhere('additional_info', 'like', '%'.$request->search.'%')->paginate(16);
            return view('all-products', compact('products'));
        }
        $products = Product::latest()->paginate(16);
        return view('all-products', compact('products'));
    }
}
