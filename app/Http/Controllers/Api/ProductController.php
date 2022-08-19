<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Product;
use Image;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=DB::table('products')
                ->join('categories','products.category_id','categories.id')
                ->select('categories.category_name','products.*')
                ->orderBy('products.id','DESC')
                ->get();
        return response()->json($product);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validatedData = $request->validate([
         'product_name' => 'required|max:255',
         'product_code' => 'required',
         'category_id' => 'required',
         'buying_price' => 'required',
         'selling_price' => 'required',
         'product_quantity' => 'required',
        ]);

        $product = new Product;
        $product->product_name = $request->product_name;
        $product->product_code = $request->product_code;
        $product->category_id = $request->category_id;
        $product->buying_price = $request->buying_price;
        $product->selling_price = $request->selling_price;
        $product->product_quantity = $request->product_quantity;
        $product->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=DB::table('products')->where('id',$id)->first();
        return response()->json($product);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
         'product_name' => 'required|max:255',
         'product_code' => 'required|max:255',
         'category_id' => 'required',
         'buying_price' => 'required',
         'selling_price' => 'required',
         'product_quantity' => 'required',
        ]);

        $data=array();
        $data['product_name']=$request->product_name;
        $data['product_code']=$request->product_code;
        $data['category_id']=$request->category_id;
        $data['buying_price']=$request->buying_price;
        $data['selling_price']=$request->selling_price;
        $data['product_quantity']=$request->product_quantity;
        DB::table('products')->where('id',$id)->update($data);

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=DB::table('products')->where('id',$id)->first();
        DB::table('products')->where('id',$id)->delete();
    }
}
