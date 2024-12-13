<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Models\HouseRent;
use App\Models\Job;
use App\Models\Sales;
use App\Models\Tutor;
use App\Models\HouseImage;
use Illuminate\Http\Request;
use Validator;
class ApiController extends Controller
{
    public function trendingPost(){

        $houserents = HouseRent::with('image','user')->orderBy("id","DESC")->limit(5)->get();
        $jobs = Job::with('user')->orderBy("id","DESC")->limit(5)->get();
        $sales = Sales::with('user')->orderBy("id","DESC")->limit(5)->get();
        $tutor = Tutor::with('user')->orderBy("id","DESC")->limit(5)->get();
            return response()->json([
                'message' => 'Trending Post',
                'houserents' => $houserents,
                'jobs' => $jobs,
                'sales' => $sales,
                'tutors' => $tutor,
            ], 200);

    }

}//apartmentController
