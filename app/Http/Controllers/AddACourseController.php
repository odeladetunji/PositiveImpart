<?php
namespace App\Http\Controllers;
use DB;
use Storage;
use Illuminate\Http\Request;
//use Illuminate\Http\File;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\UploadedFile;

class AddACourseController extends BaseController
{
    public function addACourse(Request $request){
    	
        $values = $request->all();
        return response()->json(array('data' => $values), 200);
    	

    	//return response()->json(array('data' => $message), 200);
    }
}


