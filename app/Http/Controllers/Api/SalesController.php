<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Models\Sales;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Validator;
class SalesController extends Controller
{
    public function index(){
        $sales = Sales::with('user')->get();
            return response()->json([
                'message' => 'All sales list',
                'saless' => $sales
            ], 201);

    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'product_name' => 'required',
            'buy_price' => 'required',
            'sale_price' => 'required',
            'area' => 'required',
            'description' => 'required',
            "multiple_img" => 'required|mimes:jpeg,png,jpg'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        try {
            $sales = new Sales;
            $sales->product_name = $request->product_name;
            $sales->buy_price = $request->buy_price;
            $sales->sale_price = $request->sale_price;
            $sales->area = $request->area;
            $sales->description = $request->description;
            $sales->user_id = $request->user_id;
            if(!empty($files = $request->File('multiple_img'))){
                foreach($files as $file){
                    $p_image= new ProductImage;
                    $name = $file->getClientOriginalName();
                    $ext = explode('.',$name);
                    $finalName = 'product-'.rand(1111111,9999999).'.'.$ext[1];
                    $uploadPath = 'product/';
                    $p_image->sales_id=$sales->id;
                    $p_image->file=$uploadPath.$finalName;
                    $file->move($uploadPath, $finalName);
                    $p_image->save();
                }
            }
            $sales->save();
            return response()->json([
                'message' => 'sales successfully saved',
            ], 201);

        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());

            return response()->json([
                'message' => 'sales not saved',
            ], 401);
        }
    }

    public function edit($id){
        $sales = Sales::find($id);
        return response()->json([
            'message' => 'Edit sales',
            'sales' => $sales
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
            $sales = Sales::find($request->id);
            $sales->rent_type = $request->rent_type;
            $sales->bedroom = $request->bedroom;
            $sales->bathroom = $request->bathroom;
            $sales->month = $request->month;
            $sales->rent = $request->rent;
            $sales->area = $request->area;
            $sales->description = $request->description;
            $sales->update();
            if(!empty($files = $request->File('multiple_img'))){
                $h_image= ProductImage::where('sales_id',$request->id);
                $h_image->delete();
                foreach($files as $file){
                    $p_image= new ProductImage;
                    $name = $file->getClientOriginalName();
                    $ext = explode('.',$name);
                    $finalName = 'house/-'.rand(1111111,9999999).'.'.$ext[1];
                    $uploadPath = 'houseimage/';
                    $p_image->sales_id=$sales->id;
                    $p_image->file=$uploadPath.$finalName;
                    $file->move($uploadPath, $finalName);
                    $p_image->save();
                }
            }
            return response()->json([
                'message' => 'sales successfully Updated',
            ], 201);

        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());

            return response()->json([
                'message' => 'sales not saved',
            ], 401);
        }
    }

    public function destroy(Request $request){
        try {
            $sales = Sales::findOrFail($request->id);
            $path = $sales->photos;
            $sales->delete();
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
