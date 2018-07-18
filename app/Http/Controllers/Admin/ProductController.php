<?php

namespace App\Http\Controllers\Admin;

use App\Image;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //
    public function getIndex()
    {
        return view('admin.pages.products.index');
    }

    public function postIndex(Request $request)
    {
        $v = validator($request->all() ,[
            'number' => 'required',
            'image' => 'required'
        ] ,[
            'number.required' => 'Please enter number of items',
            'image.required' => 'Please take a photo'
        ]);

        if ($v->fails()){
            return ['status' => 'error' ,'data' => implode("<br>" , $v->errors()->all())];
        }

        $product = new Product();

        $product->number = $request->number;
        $product->user_id = auth()->guard('admins')->user()->id;

        // get the image data
        $data = $request->image;
        // remove the prefix
        $uri =  substr($data,strpos($data,","));
        $random = str_random(11);

//        dd($uri);
        // create a filename for the new image
        $destination = storage_path('uploads/products');
        $product->image = 'image_'.$random.'.jpg';
        $file = storage_path('uploads/products').'/image_'.$random.'.jpg';
        // decode the image data and save it to file
        file_put_contents($file, base64_decode($uri));

        if ($product->save()){
            return ['status' => 'success' ,'data' => 'Data has been saved successfully' ,'url' => route('admin.dashboard')];
        }

        return ['status' => 'error' ,'data' => 'Error' ];
    }

    public function getImage()
    {
        return view('admin.pages.images.index');
    }

    public function postImage(Request $request)
    {
        $v = validator($request->all() ,[
            'image' => 'required'
        ] ,[
            'image.required' => 'Please take a photo'
        ]);

        if ($v->fails()){
            return ['status' => 'error' ,'data' => implode("<br>" , $v->errors()->all())];
        }

        $image = new Image();

        $image->user_id = auth()->guard('admins')->user()->id;

        // get the image data
        $data = $request->image;
        // remove the prefix
        $uri =  substr($data,strpos($data,","));
        $random = str_random(11);

//        dd($uri);
        // create a filename for the new image
        $destination = storage_path('uploads/images');
        $image->image = 'image_'.$random.'.jpg';
        $file = storage_path('uploads/products').'/image_'.$random.'.jpg';
        // decode the image data and save it to file
        file_put_contents($file, base64_decode($uri));

        if ($image->save()){
            return ['status' => 'success' ,'data' => 'Data has been saved successfully' ,'url' => route('admin.dashboard')];
        }

        return ['status' => 'error' ,'data' => 'Error' ];
    }

}
