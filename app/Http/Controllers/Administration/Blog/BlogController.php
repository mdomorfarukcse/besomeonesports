<?php

namespace App\Http\Controllers\Administration\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog\Blog;
use Exception;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('administration.blog.index', compact(['blogs']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administration.blog.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required|string',
            'avatar'    => 'required'
        ]);

        dd($request);
        try {
            $avatar = upload_avatar($request, 'avatar');
            $data = $request->all();
            Blog::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'avatar' => $avatar,
                'status' => $data['status'],
            ]);
            toast('A New Blog Has Been Created.', 'success');
            return redirect()->back();
        } catch (Exception $e) {
            dd($e);
            alert('Blog Creation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('administration.blog.show', compact(['blog']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('administration.blog.edit', compact(['blog']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        try{
            $blog->name = $request->name;
            $blog->description = $request->description;
            $blog->status = $request->status;
            if (isset($request->avatar)) {
                $avatar = upload_avatar($request, 'avatar');
                $blog->avatar = $avatar;
            }
            $blog->save();

            toast('Blog Has Been Updated.', 'success');
            return redirect()->route('administration.blog.show', ['blog' => $blog]);

        } catch (Exception $e){
            dd($e);
            alert('Blog Update Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        try {
            $blog->delete();

            toast('Blog Has Been Deleted.','success');
            return redirect()->route('administration.blog.index');
        } catch (Exception $e) {
            dd($e);
            alert('Blog Deletation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }
}
