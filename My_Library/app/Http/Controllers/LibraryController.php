<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $item = Library::all();
        return response()->json([
            "libraries" => $item
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
        $item = Library::create($request->all());
        return response()->json([
            "library" => $item
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function show(Library $library)
    {
        //
        $item = Library::where("id",$library->id)->get();
        if($item){
            return response()->json([
                "library" => $item
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
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Library $library)
    {
        //
        $item = Library::where("id",$library->id)->update($request->all());
        if($item){
            return response()->json([
                "message" => "update library"
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
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function destroy(Library $library)
    {
        //
        $item = Library::where("id",$library->id)->delete();
        if($item){
            return response()->json([
                "message" => "delete library"
            ],200);
        }else{
            return response()->json([
                "message" => "Not Found"
            ],404);
        }
    }
}
