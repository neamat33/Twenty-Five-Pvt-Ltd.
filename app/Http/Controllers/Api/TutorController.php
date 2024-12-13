<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Models\Tutor;
use Illuminate\Http\Request;
use Validator;
class TutorController extends Controller
{
    public function index(){

        $tutors = Tutor::with('user')->get();
            return response()->json([
                'message' => 'All tutors List',
                'tutors' => $tutors
            ], 201);

    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'subject' => 'required',
            'education' => 'required',
            'user_id' => 'required',
            'class' => 'required',
            'tuition_fee' => 'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        try {
            $tutor = new Tutor;
            $tutor->title = $request->title;
            $tutor->education = $request->education;
            $tutor->subject = $request->subject;
            $tutor->class = $request->class;
            $tutor->tuition_fee = $request->tuition_fee;
            $tutor->description = $request->description;
            $tutor->user_id = $request->user_id;
            if ($request->hasFile('photo')) {
                $folder = "tutor/";
                $pictureinfo = $request->file("photo");
                $file_name = "tutor-" . time() . ".". $pictureinfo->getClientOriginalExtension();
                $pictureinfo->move(public_path($folder), $file_name);
                $picture_url = $folder . $file_name;
                if (isset($request->id)) {
                    @\unlink($tutor->photo);
                }
                $tutor->photo = $picture_url;
            }
            $tutor->save();
            return response()->json([
                'message' => 'tutor successfully saved',
                'tutors' => $tutor
            ], 201);

        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());

            return response()->json([
                'message' => 'tutor not saved',
            ], 401);
        }
    }

    public function edit($id){
        $tutor = Tutor::find($id);
        return response()->json([
            'message' => 'Edit tutor',
            'tutor' => $tutor
        ], 201);
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'subject' => 'required',
            'education' => 'required',
            'class' => 'required',
            'tuition_fee' => 'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        try {
            $tutor = Tutor::find($request->id);
            $tutor->title = $request->title;
            $tutor->education = $request->education;
            $tutor->subject = $request->subject;
            $tutor->class = $request->class;
            $tutor->tuition_fee = $request->tuition_fee;
            $tutor->description = $request->description;
            $tutor->user_id = $request->user_id;
            if ($request->hasFile('photo')) {
                $folder = "tutor/";
                $pictureinfo = $request->file("photo");
                $file_name = "tutor-" . time() . ".". $pictureinfo->getClientOriginalExtension();
                $pictureinfo->move(public_path($folder), $file_name);
                $picture_url = $folder . $file_name;
                if (isset($request->id)) {
                    @\unlink($tutor->photo);
                }
                $tutor->photo = $picture_url;
            }
            $tutor->update();
            return response()->json([
                'message' => 'Tutor Successfully Updated',
            ], 201);

        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            return response()->json([
                'message' => 'tutor not saved',
            ], 401);
        }
    }

    public function destroy(Request $request){
        try {
            $tutor = Tutor::findOrFail($request->id);
            $path = $tutor->photo;
            $tutor->delete();
            return response()->json([
                'message' => 'Successfully deleted',
            ], 200);
        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            return response()->json([
                'message' => 'delete not success',
                'tutors' => $tutor
            ], 401);
        }
    }

}//apartmentController
