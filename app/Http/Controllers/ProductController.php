<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Traits\HandleImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    use HandleImages;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest('product_id')->paginate(5);
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataCreate = $request->all();
        $dataCreate['image'] = Storage::putFile('public', $request->file('image'));   
        Product::create([
            'name'  => $dataCreate['name'],
            'price' => $dataCreate['price'],
            'description' => $dataCreate['description'],
            'image' => $dataCreate['image'],
        ]);   
        return redirect()->route('products.index')->with(['message' => 'Create success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact("product"));
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
        $product = Product::findOrFail($id);

        $dataUpdate = $request->all();

        $product->update($dataUpdate);

        return redirect()->route('products.index')->with(["message" => "Update success"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Product::findOrFail($id);
        $user->delete();

        return redirect()->route('products.index')->with(["message" => "Delete success"]);
    }
}
