<?php

namespace App\Http\Controllers;

use App\Models\Library;
use App\Models\User;
use App\Models\Language;
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
        $item = Library::orderBy('id', 'desc')->get();

        //idからユーザー情報と辞書情報を取得する
        $item_length = count($item);
        for($i = 0; $i<$item_length; $i++){
            //ユーザー情報の挿入
            $user_id = $item[$i]["user_id"];
            $user = User::where("id",$user_id)->get();
            $item[$i]["user_id"] = $user;
            //辞書情報の挿入
            $language_id = $item[$i]["language_id"];
            $language = Language::where("id",$language_id)->get();
            $item[$i]["language_id"] = $language;
        }

        return response()->json([
            "libraries" => $item,
            "user" => $item_length,
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

        //1対多
        $words = Library::where("id",$library->id)->with("words")->get();
        $favorites = Library::where("id",$library->id)->with("favorites")->get();

        //多対1
        $user = Library::where("id",$library->id)->with("user")->get();
        $language = Library::where("id",$library->id)->with("language")->get();

        if($item){
            return response()->json([
                "library"=>$item,
                "words" => $words,
                "favorites"=>$favorites,
                "user"=>$user,
                "language"=>$language
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
