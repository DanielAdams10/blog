<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Requests\testRequest;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;


class ImageController extends Controller
{
    public function store(Request $request)
    {
        $image = $request->file('file');
        // Log::info($image);
        $width = Image::make($image)->width();
        $height = Image::make($image)->height();
        echo $width ." and ". $height;
        // $path = storage_path(). '/app/';
        $savePath = storage_path(). '/app/public/';
        // Log::info($image->getSize());

        $makeImage = Image::make($image);
        $makeImage->resize(800,800);
        $makeImage->save($savePath.time().$image->getClientOriginalName());
        File::delete($savePath, $makeImage);

        $makeImage->save($path.time().$image->getClientOriginalName());


    }

    public function register( $request)
    {

        $rules = [
            'name'=> 'required | alpha',
            // 'father name' => '',
            'nrc' => ['required','regex:/(^([0-9]{1,2})\/([A-Z][a-z]|[A-Z][a-z][a-z])([A-Z][a-z]|[A-Z][a-z][a-z])([A-Z][a-z]|[A-Z][a-z][a-z])\([N,P,E]\)[0-9]{6}$)/u'],
            'phone' =>  ['required', 'starts_with:0', 'regex:/^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{5})(?: *x(\d+))?\s*$/'],
            'email' => 'email',
            // 'address' => '',
            'gender' => 'required|numeric|between:1,2',
            'birthday' => 'required | date',
            'image' => 'required | image | max:10MB',

        ];

        // if($rules['gender'] == 1) :
        //     echo

        $customMessage = [

            'name.alpha' => 'The :attribute field must be only characters',
            'phone.numeric' => 'The :attribute field must be numeric',
            'phone.max' => 'The :attribute number must have 10',
            'email.email' => 'The :attribute field must be in email format',

            'birthday.date' => 'The :attribute field must be in date format',
            'image.image' => 'The :attribute field type must be image.',
            'image.size:10MB' => 'The :attribute field can store only 10mB.',
        ];

        $validator =Validator::make($request->all(), $rules, $customMessage);

            return response()->json($validator->errors()->all(),422);
    }





}

