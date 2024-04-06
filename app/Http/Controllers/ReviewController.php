<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    //

    public function store($hotelId, Request $request){
        $review = new Review();
        $review->fill($request->all());
        $review->hotel_id = $hotelId;
        //Hardcode first user_id to 1
        // $review->user_id = 1;
        //update user_id based on user login information
        $review->user_id = Auth::user()->id;



        if ($review->save()){
            return response()->json(["success"=>true, "data="=>$review]);
        } else{
            return response()->json(["success"=>false, "data"=>"unable to save"]);
        }
    }
}
