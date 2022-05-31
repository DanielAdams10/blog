<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\tourRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;

class TourBookingController extends Controller
{
    public function index()
    {
        return view('tour-index');
    }

    public function save(tourRequest $request)
    {
        // $data = $request->validate();
        // $file = $data['file'];
        // Storage::put($file);
        // $data['file']= $file->getClientOriginalName();
        $file = $request->file('file');
        // Log::info($data);

        $name = $file->getClientOriginalName();
        // Log::info($name);

        $content = file_get_contents($request->file);
        $ext = $file->extension();


        Storage::disk('public')->put($name, $content);
        // $name = 'index.jpg';

        return view('tour-show')->with('request', $request)->with('ext', $ext)->with('file',$name);
        // return redirect()->route('tour-show')->with( 'request', $request->all());
    }

    // public function show(Request $request)
    // {
    //     // Log::info($request);
    //     return view('tour-show')->with( 'request', $request->all());
    // }


}
