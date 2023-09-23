<?php

namespace App\Http\Controllers\Administration\News;

use App\Http\Controllers\Controller;
use App\Models\News\News;
use Exception;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::all();
        return view('administration.news.index', compact(['news']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administration.news.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required|string',
            'avatar'    => 'required'
        ]);
        try {
            $avatar = upload_image($request, 'avatar');
            $data = $request->all();
            News::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'avatar' => $avatar,
                'status' => $data['status'],
            ]);
            toast('A New news Has Been Created.', 'success');
            return redirect()->back();
        } catch (Exception $e) {
            dd($e);
            alert('News Creation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return view('administration.news.show', compact(['news']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('administration.news.edit', compact(['news']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        try{
            $news->name = $request->name;
            $news->description = $request->description;
            $news->status = $request->status;
            if (isset($request->avatar)) {
                $avatar = upload_image($request, 'avatar');
                $news->avatar = $avatar;
            }
            $news->save();

            toast('News Has Been Updated.', 'success');
            return redirect()->route('administration.news.show', ['news' => $news]);

        } catch (Exception $e){
            dd($e);
            alert('News Update Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        try {
            $news->delete();

            toast('News Has Been Deleted.','success');
            return redirect()->route('administration.news.index');
        } catch (Exception $e) {
            dd($e);
            alert('News Deletation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }
}
