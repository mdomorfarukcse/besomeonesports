<?php

namespace App\Http\Controllers\Administration\Shop\Category;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop\Category\Category;
use App\Http\Requests\Administration\Shop\Category\CategoryStoreRequest;
use App\Http\Requests\Administration\Shop\Category\CategoryUpdateRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::select(['id','name','status'])->orderBy('created_at', 'desc')->get();
        return view('administration.shop.category.index', compact(['categories']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administration.shop.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        // dd($request->all());
        try{
            Category::create([
                'name' => $request->name,
                'status' => $request->status,
                'description' => $request->description
            ]);

            toast('A New Category Has Been Created.', 'success');
            return redirect()->back();
        } catch (Exception $e){
            //dd($e);
            alert('Category Creation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('administration.shop.category.show', compact(['category']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('administration.shop.category.edit', compact(['category']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        // dd($request->all());
        try{
            $category->update([
                'name' => $request->name,
                'status' => $request->status,
                'description' => $request->description,
            ]);

            toast('Category updated successfully.', 'success');
            return redirect()->route('administration.shop.category.show', ['category' => $category]);
        } catch (Exception $e){
            //dd($e);
            alert('Category Update Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();

            toast('Category Has Been Deleted.','success');
            return redirect()->back();
        } catch (Exception $e) {
            //dd($e);
            alert('Category Deletation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }
}
