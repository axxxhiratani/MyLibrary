<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $item = Profile::all();
        return response()->json([
            "profiles" => $item
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $item = Profile::create($request->all());
        return response()->json([
            "profile" => $item
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
        $item = Profile::where("id",$profile->id)->get();
        if($item){
            return response()->json([
                "profile" => $item
            ],200);
        }else{
            return response()->json([
                "message" => "Not Found"
            ],404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
        $item = Profile::where("id",$profile->id)->update($request->all());
        if($item){
            return response()->json([
                "message" => "update profile"
            ],200);
        }else{
            return response()->json([
                "message" => "Not Found"
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
        $item = Profile::where("id",$profile->id)->delete();
        if($item){
            return response()->json([
                "message" => "delete profile"
            ],200);
        }else{
            return response()->json([
                "message" => "Not Found"
            ],404);
        }
    }
}
