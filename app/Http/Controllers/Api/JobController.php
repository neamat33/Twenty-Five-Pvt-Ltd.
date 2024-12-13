<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Models\Job;
use Illuminate\Http\Request;
use Validator;
class JobController extends Controller
{
    // public function __construct() {
    //     $this->middleware('auth:api', ['except' => ['login', 'register']]);
    // }

    public function index(){

        $jobs = Job::with('user')->get();
            return response()->json([
                'message' => 'All Jobs List',
                'jobs' => $jobs
            ], 201);

    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'company_name' => 'required',
            'education' => 'required',
            'user_id' => 'required',
            'deadline' => 'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        try {
            $job = new Job;
            $job->title = $request->title;
            $job->company_name = $request->company_name;
            $job->education = $request->education;
            $job->experience = $request->experience;
            $job->circular_date = $request->circular_date;
            $job->deadline = $request->deadline;
            $job->salary_range = $request->salary_range;
            $job->user_id = $request->user_id;
            if ($request->hasFile('file')) {
                $folder = "job/";
                $pictureinfo = $request->file("file");
                $file_name = "job-" . time() . ".". $pictureinfo->getClientOriginalExtension();
                $pictureinfo->move(public_path($folder), $file_name);
                $picture_url = $folder . $file_name;
                if (isset($request->id)) {
                    @\unlink($job->photo);
                }
                $job->file = $picture_url;
            }
            $job->save();
            return response()->json([
                'message' => 'Job successfully saved',
                'jobs' => $job
            ], 201);

        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());

            return response()->json([
                'message' => 'Job not saved',
            ], 401);
        }
    }

    public function edit($id){
        $job = Job::find($id);
        return response()->json([
            'message' => 'Edit Job',
            'job' => $job
        ], 201);
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'education' => 'required',
            'deadline' => 'required',
            'company_name' => 'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        try {
            $job = Job::find($request->id);
            $job->title = $request->title;
            $job->company_name = $request->company_name;
            $job->education = $request->education;
            $job->experience = $request->experience;
            $job->circular_date = $request->circular_date;
            $job->deadline = $request->deadline;
            $job->salary_range = $request->salary_range;
            if ($request->hasFile('file')) {
                $folder = "job/";
                $pictureinfo = $request->file("file");
                $file_name = "job-" . time() . ".". $pictureinfo->getClientOriginalExtension();
                $pictureinfo->move(public_path($folder), $file_name);
                $picture_url = $folder . $file_name;
                if (isset($request->id)) {
                    @\unlink($job->photo);
                }
                $job->file = $picture_url;
            }
            $job->update();
            return response()->json([
                'message' => 'Job successfully updated',
                'jobs' => $job
            ], 201);

        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());

            return response()->json([
                'message' => 'Job not saved',
                'jobs' => $job
            ], 401);
        }
    }

    public function destroy(Request $request){
        try {
            $job = Job::findOrFail($request->id);
            $path = $job->file;
            $job->delete();
            return response()->json([
                'message' => 'delete success',
            ], 200);
        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            return response()->json([
                'message' => 'delete not success',
                'jobs' => $job
            ], 401);
        }
    }
    public function ajaxGetArea(Request $req){
        $city_id=$req->city_id;
        $areas=Area::where('city_id',$city_id)->get();
        if(isset($areas[0]->id)){
            echo "<option value=''>--Select--</option>";
            foreach($areas as $area){
                echo "<option value='$area->id'>$area->name</option>";
            }
        }else{
            echo "<option value=''>Not Found!</option>";
        }

    }

}//apartmentController
