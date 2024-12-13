<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Models\HouseRent;
use App\Models\HouseImage;
use Illuminate\Http\Request;
use Validator;
class HouseRentController extends Controller
{
    public function index(){

        $houserents = HouseRent::with('user')->get();
            return response()->json([
                'message' => 'All houserents List',
                'houserents' => $houserents
            ], 201);

    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'rent_type' => 'required',
            'bedroom' => 'required',
            'month' => 'required',
            'description' => 'required',
            "multiple_img" => 'required|mimes:jpeg,png,jpg'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        try {
            $houserent = new HouseRent;
            $houserent->rent_type = $request->rent_type;
            $houserent->bedroom = $request->bedroom;
            $houserent->bathroom = $request->bathroom;
            $houserent->month = $request->month;
            $houserent->rent = $request->rent;
            $houserent->area = $request->area;
            $houserent->description = $request->description;
            $houserent->user_id = $request->user_id;
            if(!empty($files = $request->File('multiple_img'))){
                foreach($files as $file){
                    $p_image= new HouseImage;
                    $name = $file->getClientOriginalName();
                    $ext = explode('.',$name);
                    $finalName = 'house-'.rand(1111111,9999999).'.'.$ext[1];
                    $uploadPath = 'houseimage/';
                    $p_image->houserent_id=$houserent->id;
                    $p_image->file=$uploadPath.$finalName;
                    $file->move($uploadPath, $finalName);
                    $p_image->save();
                }
            }
            $houserent->save();
            return response()->json([
                'message' => 'houserent successfully saved',
            ], 201);

        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());

            return response()->json([
                'message' => 'houserent not saved',
            ], 401);
        }
    }

    public function edit($id){
        $houserent = HouseRent::find($id);
        return response()->json([
            'message' => 'Edit houserent',
            'houserent' => $houserent
        ], 201);
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'rent_type' => 'required',
            'bedroom' => 'required',
            'month' => 'required',
            'description' => 'required',
            "multiple_img" => 'required|mimes:jpeg,png,jpg'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        try {
            $houserent = HouseRent::find($request->id);
            $houserent->rent_type = $request->rent_type;
            $houserent->bedroom = $request->bedroom;
            $houserent->bathroom = $request->bathroom;
            $houserent->month = $request->month;
            $houserent->rent = $request->rent;
            $houserent->area = $request->area;
            $houserent->description = $request->description;
            $houserent->update();
            if(!empty($files = $request->File('multiple_img'))){
                $h_image= HouseImage::where('houserent_id',$request->id);
                $h_image->delete();
                foreach($files as $file){
                    $p_image= new HouseImage;
                    $name = $file->getClientOriginalName();
                    $ext = explode('.',$name);
                    $finalName = 'house/-'.rand(1111111,9999999).'.'.$ext[1];
                    $uploadPath = 'houseimage/';
                    $p_image->houserent_id=$houserent->id;
                    $p_image->file=$uploadPath.$finalName;
                    $file->move($uploadPath, $finalName);
                    $p_image->save();
                }
            }
            return response()->json([
                'message' => 'houserent successfully Updated',
            ], 201);

        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());

            return response()->json([
                'message' => 'houserent not saved',
            ], 401);
        }
    }

    public function destroy(Request $request){
        try {
            $houserent = HouseRent::findOrFail($request->id);
            $path = $houserent->photos;
            $houserent->delete();
            return response()->json([
                'message' => 'Successfully deleted',
            ], 200);
        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            return response()->json([
                'message' => 'delete not success',
            ], 401);
        }
    }

}//apartmentController
