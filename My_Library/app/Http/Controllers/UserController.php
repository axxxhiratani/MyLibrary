<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = User::all();
        return response()->json([
            "users"=>$items
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
        $item = User::create($request->all());
        return response()->json([
            "data"=>$item
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rest  $rest
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        $item = User::where("id",$user->id)->get();
        if($item){
            return response()->json([
                "user"=>$item
            ]);
        }else{
            return response()->json([
                "message"=>"Not Found"
            ],404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rest  $rest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $value = [
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>$request->password,
        ];
        $item = User::where("id",$user->id)->update($request->all());
        if($item){
            return response()->json([
                "message" => "Update User"
            ],200);
        }else{
            return response()->json([
                "message" => "Not Found User"
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rest  $rest
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $item = User::where("id",$user->id)->delete();
        if($item){
            return response()->json([
                "message"=>"Delete User"
            ],200);
        }else{
            return response()->json([
                "message"=>"Not Found User"
            ],404);
        }
    }
}
