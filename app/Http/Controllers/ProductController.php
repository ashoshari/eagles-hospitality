<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use Inertia\Inertia;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $products = DB::table('products')
        // ->latest()
        // ->get();
        // return Inertia::render('Products/Index', [
        //     'products' => $products
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Products/Create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {




        $result = $request->file('image')->storeOnCloudinary('products');
        $fileName = $result->getFileName();
        $fileExtension = $result->getExtension();
        $url = 'http://res.cloudinary.com/dnxlim2dr/image/upload/w_500,h_500,c_scale/q_auto,f_auto,fl_lossy/v1708284097/'.$fileName .'.'.$fileExtension;
        $category = Category::where('name',$request->input('category'))->first();
        Product::create([
            "name" => $request->input('name'),
            "nameAr" => $request->input('nameAr'),
            "description" => $request->input('description'),
            "descriptionAr" => $request->input('descriptionAr'),
            "size" => $request->input('size'),
            "quantityPerPacket" => $request->input('quantityPerPacket'),
            "bestSelling" => $request->input('bestSelling'),
            "imageUrl" => $url,
            "category_id" => $category->id,
            'public_id' => $result->getPublicId()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return Inertia::render('Products/Show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return Inertia::render('Products/Edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

            
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        
        Cloudinary::destroy($product->public_id);
        $product->delete();
        return redirect()->route('dashboard')
                ->withSuccess('Product is deleted successfully.');
    }
}
