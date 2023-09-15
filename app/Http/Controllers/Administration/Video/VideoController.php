<?php

namespace App\Http\Controllers\Administration\Video;

use App\Http\Controllers\Controller;
use App\Models\Video\Video;
use Exception;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::all();
        return view('administration.video.index', compact(['videos']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administration.video.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'youtubeurl'      => 'required|string'
        ]);
        try {
            $data = $request->all();
            Video::create([
                'youtubeurl' => $data['youtubeurl'],
                'status' => $data['status'],
            ]);
            toast('A New Video Has Been Created.', 'success');
            return redirect()->back();
        } catch (Exception $e) {
            dd($e);
            alert('Video Creation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        return view('administration.video.show', compact(['video']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        return view('administration.video.edit', compact(['video']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $video)
    {
        try{
            $video->youtubeurl = $request->youtubeurl;
            $video->status = $request->status;
            $video->save();

            toast('Video Has Been Updated.', 'success');
            return redirect()->route('administration.video.show', ['video' => $video]);

        } catch (Exception $e){
            dd($e);
            alert('Video Update Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        try {
            $video->delete();

            toast('Video Has Been Deleted.','success');
            return redirect()->route('administration.video.index');
        } catch (Exception $e) {
            dd($e);
            alert('Video Deletation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }
}
