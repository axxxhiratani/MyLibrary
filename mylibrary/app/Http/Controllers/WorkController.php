<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $item = Work::all();
        return response()->json([
            "works"=>$item
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
        $item = Work::create($request->all());
        return response()->json([
            "message"=> $item
        ],201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        //
        $item = Work::where("id",$work->id)->get();
        $profile = Work::where("id",$work->id)->with("profiles")->get();
        if($item){
            return response()->json([
                "work"=>$item,
                "profiles" => $profile,
            ],200);
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
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Work $work)
    {
        //
        $item = Work::where("id",$work->id)->update($request->all());
        if($item){
            return response()->json([
                "message"=>"update work"
            ]);
        }else{
            return response()->json([
                "message"=>"Not Found"
            ],200);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        //
        $item = Work::where("id",$work->id)->delete();
        if($item){
            return response()->json([
                "message" => "delete work"
            ]);
        }else{
            return response()->json([
                "message" => "Not Found"
            ],200);
        }
    }
}
