<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;


class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //index
        $items = Language::all();
        return response()->json([
            "languages"=>$items
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
        $item = Language::create($request->all());
        return response()->json([
            "language" => $item
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        //
        $item = Language::where("id",$language->id)->get();
        $library = Language::where("id",$language->id)->with("libraries")->get();
        $profile = Language::where("id",$language->id)->with("profiles")->get();

        if($item){
            return response()->json([
                "language" => $item,
                "libraries" => $library,
                "profiles" => $profile,
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
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language)
    {
        //
        $item = Language::where("id",$language->id)->update($request->all());
        if($item){
            return response()->json([
                "message" => "Update Language"
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
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        //
        $item = Language::where("id",$language->id)->delete();
        if($item){
            return response()->json([
                "message"=>"Delete Language"
            ],200);
        }else{
            return response()->json([
                "message" => $item
            ],404);
        }
    }
}
