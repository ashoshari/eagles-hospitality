<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DeleteManyProductsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


Route::get('/dashboard', function () {

    $user =  DB::table('users')->where('id',Auth::id())->first();


    if($user->isAdmin == true){
        $categories = Category::get("name");
        $products = Product::orderByDesc('created_at')->get();

        foreach($products as $product){
            $category = Category::find($product->category_id);
            $product['category'] = $category->name;  

        }


        return Inertia::render('Dashboard/Index',['products' => $products,'categories'=> $categories]);
    }else{
        return redirect('/');
    }



    
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::resource('products', ProductController::class)->except(['index','update']);
Route::resource('products.reviews', ReviewController::class)->only('store');
Route::resource('contacts', ContactController::class)->only(['store','update']);

Route::get('/', function () {

    return to_route('home');
});

Route::get('/مستلزمات-ضيافة-تجهيزات-فندقية', function () {


    $products = Product::orderByDesc('created_at')->get();
    foreach($products as $product){
        $product['rate'] = $product->reviews->avg('rate');

    }

    

    return Inertia::render('Home/Index', [
        'products' => $products
    ]);
})->name('home');



Route::post('/fuck/{product}', function (UpdateProductRequest $request, Product $product) {

    
        $category = Category::where('name',$request->input('category'))->first();


        if($request->file('image')){
            Cloudinary::destroy($product->public_id);
            $result = $request->file('image')->storeOnCloudinary('products');
            $product->update([...$request->all(),'category_id'=>$category->id,'imageUrl'=>$result->getPath(), 'public_id'=>$result->getPublicId()]);
         }else{
            $product->update([...$request->all(),'category_id'=>$category->id]);

         }
        return redirect()->route('dashboard')
        ->withSuccess('Product is updated successfully.');
    

})->name('update-product');



Route::get('/products',function(){
    $products = DB::table('products')
    ->latest()
    ->get();

    return $products;
});

Route::get('/contacts',function(){
    $contacts = DB::table('contacts')
    ->latest()
    ->get();
    

    return $contacts;
});







Route::get('/contact', function () {
    return Inertia::render('Contact');
})->name('contact');


Route::get('/about-us', function () {
    return Inertia::render('AboutUs');
})->name('about');

Route::get('/product/{product_name}', function (Request $request) {

    $product = Product::where('name','like','%'.$request->product_name . '%')->get();
    if(count($product)===0){ return Inertia::render('Components/404');}
    else{
        return Inertia::render('ShopDetails',['product' => $product,'reviews'=>$product[0] ? $product[0]->reviews : null,'productAvgRate'=>$product[0]->reviews->avg('rate')]);
    }
    
})->name('product');


Route::get('/shop', function () {
            $products =  $products = DB::table('products')
        ->latest()
        ->get();

    return Inertia::render('Shop', [
        'products' => $products
    ]);
})->name('shop');

Route::get('/shop/skin-care', function () {
        $products =  $products = DB::table('products')->where('category_id',1)
        ->latest()
        ->get();
    return Inertia::render('Categories/SkinCare', [
        'products' => $products
    ]);
})->name('skin-care');

Route::get('/shop/personal-care', function () {
    $products =  $products = DB::table('products')->where('category_id',2)
    ->latest()
    ->get();
return Inertia::render('Categories/PersonalCare', [
    'products' => $products
]);
})->name('personal-care');

Route::get('/shop/body-care', function () {
    $products =  $products = DB::table('products')->where('category_id',3)
    ->latest()
    ->get();
return Inertia::render('Categories/BodyCare', [
    'products' => $products
]);
})->name('body-care');

Route::get('/shop/extra-care', function () {
    $products =  $products = DB::table('products')->where('category_id',4)
    ->latest()
    ->get();
return Inertia::render('Categories/ExtraCare', [
    'products' => $products
]);
})->name('extra-care');

Route::get('/shop/towels', function () {
    $products =  $products = DB::table('products')->where('category_id',5)
    ->latest()
    ->get();
return Inertia::render('Categories/Towels', [
    'products' => $products
]);
})->name('towels');

Route::get('/shop/mattresses', function () {
    $products =  $products = DB::table('products')->where('category_id',6)
    ->latest()
    ->get();
return Inertia::render('Categories/Mattresses', [
    'products' => $products
]);
})->name('mattresses');

Route::get('/catalog', function () {
    $products =  $products = DB::table('products')
    ->latest()
    ->get();
return Inertia::render('Catalog', [
    'products' => $products
]);
})->name('catalog');



Route::delete('/deleteManyProducts', DeleteManyProductsController::class)->name('deleteManyProducts');
