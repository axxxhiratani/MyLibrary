<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Library;
use App\Models\Word;
use App\Models\User;
use App\Models\Language;
use App\Models\Favorite;


class InvestigateController extends Controller
{
    //辞書を単語名で検索する
    public function searchLibraryByName(Request $request)
    {
        $item = Library::where("name","like","%".$request->name."%")->get();
        $users = User::all();
        $languages = Language::all();

        //idからユーザー情報と辞書情報を取得する
        for($i = 0; $i < count($item); $i++){
            //ユーザー情報の挿入
            $user_id = $item[$i]["user_id"];
            $count = 0;
            for($j = 0; $j < count($users); $j++){
                if($users[$j]["id"] === $user_id){
                    $user = $users[$j];
                }
            }
            $item[$i]["user_id"] = $user;


            //辞書情報の挿入
            $language_id = $item[$i]["language_id"];
            for($j = 0; $j < count($languages); $j++){
                if($languages[$j]["id"] === $language_id){
                    $language = $languages[$j];
                }
            }
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
        $libraries = Library::all();
        $languages = Language::all();

        for($i = 0; $i < count($item); $i++){

            //辞書の情報の取り出し
            $library_id = $item[$i]["library_id"];

            for($j = 0; $j < count($libraries); $j++){
                if($libraries[$j]["id"] === $library_id){
                    $library = $libraries[$j];
                }
            }
            $item[$i]["library_id"] = $library;

            //言語の情報の取り出し
            $language_id = $item[$i]["library_id"]["language_id"];

            for($j=0; $j < count($languages); $j++){
                if($languages[$j]["id"] === $language_id){
                    $language = $languages[$j];
                }
            }
            $item[$i]["library_id"]["language_id"] = $language;
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
