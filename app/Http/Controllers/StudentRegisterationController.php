<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\testRequest;
use Illuminate\Support\Facades\Log;

class StudentRegisterationController extends Controller
{
    public function register()
    {
        return view('index');
    }

    public function save(testRequest $request)
    {
        // Log::info($request);
        return redirect()->back()->with('message', 'Success');
    }

    public function success()
    {
        
    }
}
