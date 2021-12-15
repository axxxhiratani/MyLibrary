<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $item = Favorite::all();
        return response()->json([
            "favorites" => $item
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
        $item = Favorite::create($request->all());
        return response()->json([
            "favorite" => $item
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function show(Favorite $favorite)
    {
        //
        $item = Favorite::where("id",$favorite->id)->get();
        $library = Favorite::where("id",$favorite->id)->with("library")->get();
        $user = Favorite::where("id",$favorite->id)->with("user")->get();

        if($item){
            return response()->json([
                "favorite" => $item,
                "library"=>$library,
                "user"=>$user,
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
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favorite $favorite)
    {
        //
        $item = Favorite::where("id",$favorite->id)->update($request->all());
        if($item){
            return response()->json([
                "message" => "update favorite"
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
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favorite $favorite)
    {
        //
        $item = Favorite::where("id",$favorite->id)->delete();
        if($item){
            return response()->json([
                "message" => "delete favorite"
            ],200);
        }else{
            return response()->json([
                "message" => "Not Found"
            ],404);
        }
    }
}
