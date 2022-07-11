<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Prophecy\Call\Call;

class SubCategoryController extends Controller
{
    public function index()
    {
        $categories = SubCategory::latest()->paginate(5);
        return view('subcategory.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('subcategory.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $dataCreate = $request->all();
        SubCategory::create($dataCreate);
        return redirect()->route('subcategories.index')->with(['message' => 'Create success']);
    }

    public function edit($id)
    {
        $subcategories = SubCategory::findOrFail($id);
        $categories = Category::all();
        return view('subcategory.edit', compact("subcategories", 'categories'));
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
        $category = SubCategory::findOrFail($id);

        $dataUpdate = $request->all();

        $category->update($dataUpdate);

        return redirect()->route('subcategories.index')->with(["message" => "Update success"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = SubCategory::findOrFail($id);
        $user->delete();

        return redirect()->route('subcategories.index')->with(["message" => "Delete success"]);
    }

    public function view()
    {
        return view('layouts.index');
    }
}
