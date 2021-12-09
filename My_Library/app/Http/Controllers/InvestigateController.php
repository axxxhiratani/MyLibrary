<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Library;
use App\models\Word;
use App\Models\User;
use App\Models\Language;
use App\Models\Favorite;


class InvestigateController extends Controller
{
    //辞書を単語名で検索する
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
    //辞書を言語で検索する。
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
    //単語帳を単語名で検索する。
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

    //ユーザーをuidで検索する。
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

    // お気に入りをユーザーで検索する。
    public function searchFavoriteByUser(Request $request)
    {
        $item = Favorite::where("user_id",$request->user_id)->get();

        $item_length = count($item);
        for($i = 0; $i < $item_length; $i++){

            //辞書の情報の取り出し
            $library_id = $item[$i]["library_id"];
            $library = Library::where("id",$library_id)->get();
            $item[$i]["library_id"] = $library;

            //言語の情報の取り出し
            $language_id = $item[$i]["library_id"][0]["language_id"];
            $language = Language::where("id",$language_id)->get();
            $item[$i]["library_id"][0]["language_id"] = $language;
        }
        if($item){
            return response()->json([
                "favorite"=>$item,
            ],200);
        }else{
            return response()->json([
                "message"=>"Not Found"
            ],404);
        }
    }






}
