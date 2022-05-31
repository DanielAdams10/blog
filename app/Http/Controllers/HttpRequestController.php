<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

class HttpRequestController extends Controller
{
    #file upload
    public function test(Request $request) {
        // Log::info(request()->method()); //get method
        // return "Hello  We are Testing";

        // return response(request(), 200)->withHeader(['Content-type','application/json']);
        // return redirect('index');

        // return view('test', array('message' => "Hello Testing"));

        $tmpFileName = $request->file('file');

        $name = $tmpFileName->getClientOriginalName();
        // Log::info($name);

        $content = file_get_contents($request->file);

        $file = Storage::disk('local')->put($name, $content);
        // $name = 'index.jpg';

        $path = storage_path().'/app/'. $name;
        
            $headers = [
                'Access-Control-Allow-Origin' => '*',
                'Content-Description' => 'File Transfer',
                'Content-Disposition' => 'attachment;filename=' . $name,
                'Access-Control-Expose-Headers' => 'Content-Disposition,X-Suggested-Filename'
            ];

            return Storage::download($name);
            // return response()->download($path, $name, $headers);
        // }

    }

    // public function download(Request $file) {
    //     Log::info($file);
    //     $path = storage_path(). '/app/' . $file;


    //     $headers = [
    //         'Access-Control-Allow-Origin' => '*',
    //         'Content-Description' => 'File Transfer',
    //         'Content-Disposition' => 'attachment;filename=' . $file,
    //         'Access-Control-Expose-Headers' => 'Content-Disposition,X-Suggested-Filename'
    //     ];

    //     return Storage::download($path, $file, $headers);
    // }
}
