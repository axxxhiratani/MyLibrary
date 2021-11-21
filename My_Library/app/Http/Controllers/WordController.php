<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $item = Word::all();
        return response()->json([
            "words" => $item
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
        $item = Word::create($request->all());
        return response()->json([
            "word" => $item
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function show(Word $word)
    {
        //
        $item = Word::where("id",$word->id)->get();
        if($item){
            return response()->json([
                "word" => $item
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
     * @param  \App\Models\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Word $word)
    {
        //
        $item = Word::where("id",$word->id)->update($request->all());
        if($item){
            return response()->json([
                "message" => "update word"
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
     * @param  \App\Models\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function destroy(Word $word)
    {
        //
        $item = Word::where("id",$word->id)->delete();
        if($item){
            return response()->json([
                "message" => "delete word"
            ],200);
        }else{
            return response()->json([
                "message" => "Not Found"
            ],404);
        }
    }
}
