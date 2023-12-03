<?php

namespace App\Http\Controllers\Administration\Settings;

use App\Http\Controllers\Controller;
use App\Models\Settings\AppSetting;
use Illuminate\Http\Request;

class AppSettingController extends Controller
{
    public function index() {
        $app = AppSetting::first();
        return view('administration.settings.app', compact(['app']));
    }

    public function apiIndex() {
        $app = AppSetting::first();
        // Hide the specified columns
        $app->makeHidden(['id', 'created_at', 'updated_at']);
        
        return response()->json($app);
    }
    
    public function update(Request $request) {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'unique:app_settings,name,except,id'],
            'url' => ['required', 'string', 'url', 'unique:app_settings,name,except,id'],
            'about_website' => ['nullable', 'string'],
            'about_us' => ['nullable', 'string']
        ]);
    
        $app = AppSetting::first();
    
        if (!$app) {
            // Create a new record if it doesn't exist
            AppSetting::create($request->all());
        } else {
            // Update the existing record
            $app->update($request->all());
        }

        toast('App Setting Has Been Updated.', 'success');
        return redirect()->back();
    }
}
