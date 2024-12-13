<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Models\Masalah;
use Illuminate\Http\Request;
use Toastr;
use Illuminate\Support\Str;
class MasalahController extends Controller
{
    public function index(){
        $get_all = Masalah::get();
        return response()->json([
            'message' => 'Question List',
            'masalah' => $get_all
        ], 201);

    }
    public function create(){
        $data['add'] = TRUE;
        return view('admin.category.add', $data);
    }
    public function store(Request $request){
        $this->validate($request, [
            'question' => 'required',
            'answer' => 'required',
        ]);
        try {
            $masalah = new Masalah;
            $masalah->name = $request->name;
            $masalah->phone = $request->phone;
            $masalah->email = $request->email;
            $masalah->question = $request->question;
            $masalah->slug = Str::slug($request->question);
            $masalah->answer = $request->answer;
            $masalah->save();
            return response()->json([
                'message' => 'save success!',   
            ], 201);
        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            return response()->json([
                'message' => $err_message,   
            ], 201);
        }
    }

    public function edit($id){
        $data['edit'] = TRUE;
        $single = Masalah::findOrFail($id);
        return view('admin.biography.add', $data);
    }

    public function update(Request $request){
        $this->validate($request, [
            'question' => 'required',
            'answer' => 'required',
        ]);
        try {
            $masalah = Masalah::findOrFail($request->id);
            $masalah->name = $request->name;
            $masalah->phone = $request->phone;
            $masalah->email = $request->email;
            $masalah->question = $request->question;
            $masalah->slug = Str::slug($request->question);
            $masalah->answer = $request->answer;
            $masalah->update();
            return response()->json([
                'message' => 'Updated success',   
            ], 201);


        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            return redirect(route('masalahs.create'));
        }
    }

    public function destroy(Request $request){
        try {
            $masalah = Masalah::findOrFail($request->id);
            $masalah->delete();

        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            return response()->json([
                'message' => $err_message,   
            ], 500);
        }
    }

}//masalahController
