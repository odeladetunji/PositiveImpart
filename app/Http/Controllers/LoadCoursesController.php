<?php
namespace App\Http\Controllers;
use DB;
use Storage;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class LoadCoursesController extends BaseController
{
    public function LoadCourses(Request $request){
    	$courses = DB::select('select * from courses');
    	if (sizeof($courses) == 0) {
    		$courses = false;
    	}
    	return response()->json(array('data' => $courses), 200);
    }
}


