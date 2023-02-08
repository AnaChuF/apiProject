<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list(){
        $products = Product::all();

        return ['products' => $products];
    }

    public function store(Request $request){
        $product = Product::insert([
            'name' => $request->name,
            'description' => $request->description
        ]);

        $message = $product ? 'Successfully created' : 'Error';

        return response()->json([
            'message' => $message
        ]);
    }

    public function update(Request $request){
        $product = Product::where('id', $request->id)
                        ->update([
                            'name' => $request->name,
                            'description' => $request->description
                        ]);


        $message = $product ? 'Successfully updated' : 'Error';

        return response()->json([
            'message' => $message
        ]);
    }


    public function delete(Request $request){
        $product = Product::where('id', $request->id)
                            ->delete();

        $message = $product ? 'Successfully deleted' : 'Error';

        return response()->json([
            'message' => $message
        ]);
    }
}
