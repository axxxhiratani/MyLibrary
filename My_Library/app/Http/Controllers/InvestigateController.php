<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Library;
use App\models\Word;
use App\Models\User;
use App\Models\Language;


class InvestigateController extends Controller
{
    //
    public function searchLibraryByName(Request $request)
    {
        $item = Library::where("name","like","%".$request->name."%")->get();

        //idからユーザー情報と辞書情報を取得する
        $item_lenght = count($item);
        for($i = 0; $i<$item_lenght; $i++){
            //ユーザー情報の挿入
            $user_id = $item[$i]["user_id"];
            $user = User::where("id",$user_id)->get();
            $item[$i]["user_id"] = $user;
            //辞書情報の挿入
            $language_id = $item[$i]["language_id"];
            $language = Language::where("id",$language_id)->get();
            $item[$i]["language_id"] = $language;
        }

        if($item){
            return response()->json([
                "libraries"=>$item,
            ],200);
        }else{
            return response()->json([
                "message"=>"Not Found"
            ],404);
        }
    }
    public function searchLibraryByLanguage(Request $request)
    {
        $item = Library::where("language_id",$request->language)->get();
        if($item){
            return response()->json([
                "libraries"=>$item,
            ],200);
        }else{
            return response()->json([
                "message"=>"Not Found"
            ],404);
        }
    }
    public function searchWordByName(Request $request)
    {
        $item = Word::where("library_id",$request->library_id)->where("name","like","%".$request->name."%")->get();
        if($item){
            return response()->json([
                "words"=>$item,
            ],200);
        }else{
            return response()->json([
                "message"=>"Not Found"
            ],404);
        }
    }

    public function searchIdByUid(Request $request)
    {
        $item = User::where("uuid",$request->uuid)->get();
        if($item){
            return response()->json([
                "user"=>$item,
            ],200);
        }else{
            return response()->json([
                "message"=>"Not Found"
            ],404);
        }

    }





}
