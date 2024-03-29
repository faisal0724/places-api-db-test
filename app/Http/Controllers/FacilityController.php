<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;

class FacilityController extends Controller
{
    //
    
    public function store(Request $request){
        $facility = new Facility();
        $facility->fill($request->all());
        if ($facility->save()){
            return response()->json(["success"=>true, "data"=>$facility]);
        } else {
            return response()->json(["success"=>false, "data"=>"Error upon saving."]);
        }
    }

    public function index(){
        $facilities = Facility::all();
        return response()->json(["success"=>true, "data"=>$facilities]);
    }



}
