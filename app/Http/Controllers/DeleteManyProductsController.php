<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class DeleteManyProductsController extends Controller
{
    public function __invoke(Request $request)
    {
        $ids = $request->input('ids');
        Product::whereIn('id', $ids)->delete();

    }
}
?>