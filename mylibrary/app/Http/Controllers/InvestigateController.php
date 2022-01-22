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
        $item = Library::where("name","like","%".$request->name."%")->where("view_permit",1)->get();
        //idからユーザー情報と辞書情報を取得する
        foreach($item as $index => $library){
            $item[$index]["user_id"] = $library->user;
            $item[$index]["language_id"] = $library->language;
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
        $item = Library::where("language_id",$request->language)->where("view_permit",1)->get();
        //idからユーザー情報と辞書情報を取得する
        foreach($item as $index => $library){
            $item[$index]["user_id"] = $library->user;
            $item[$index]["language_id"] = $library->language;
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
        //idからユーザー情報と辞書情報を取得する
        foreach($item as $index => $favorite){
            $item[$index]["library_id"] = $favorite->library;
            $item[$index]["library_id"]["language_id"] = $favorite->library->language;
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
