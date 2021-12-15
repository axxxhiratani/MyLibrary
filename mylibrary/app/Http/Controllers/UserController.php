<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = User::all();
        return response()->json([
            "users"=>$items
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
        $item = User::create([
            'name' => $request->name,
            'uuid' => $request->uuid,
            "work_id" => $request->work_id,
            "language_id" => $request->language_id,
            "introduction" => $request->introduction,
        ]);

        // event(new Registered($item));

        // Auth::login($item);


        /**
         *ここらにセッションの情報を書いておく。後で。
         *これはフロント側でやるの？？
         */

        return response()->json([
            "user" => $item
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rest  $rest
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        $item = User::where("id",$user->id)->get();

        $libraries = User::where("id",$user->id)->with("libraries")->get();

        //idからユーザー情報と辞書情報を取得する
        $libraries_lenght = count($libraries[0]["libraries"]);
        for($i = 0; $i<$libraries_lenght; $i++){
            //辞書情報の挿入
            $language_id = $libraries[0]["libraries"][$i]["language_id"];
            $language = Language::where("id",$language_id)->get();
            $libraries[0]["libraries"][$i]["language_id"] = $language;
        }

        $favorites = User::where("id",$user->id)->with("favorites")->get();

        $work = User::where("id",$user->id)->with("work")->get();
        $language = User::where("id",$user->id)->with("language")->get();


        if($item){
            return response()->json([
                "user"=>$item,
                "libraries" => $libraries,
                "favorites" => $favorites,
                "work" => $work,
                "language" => $language,

            ]);
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
     * @param  \App\Models\Rest  $rest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $value = [
            'name' => $request->name,
            'uuid' => $request->uuid,
            "work_id" => $request->work_id,
            "language_id" => $request->language_id,
            "introduction" => $request->introduction,
        ];
        $item = User::where("id",$user->id)->update($request->all());
        if($item){
            return response()->json([
                "message" => "Update User"
            ],200);
        }else{
            return response()->json([
                "message" => "Not Found User"
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rest  $rest
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $item = User::where("id",$user->id)->delete();
        if($item){
            return response()->json([
                "message"=>"Delete User"
            ],200);
        }else{
            return response()->json([
                "message"=>"Not Found User"
            ],404);
        }
    }

    //ログイン機能の実装
    // public function loginUser(LoginRequest $request){
    //     $request->authenticate();
    //     $request->session()->regenerate();
    //     return response()->json([
    //         "message" => "login success"
    //     ]);

    // }
}
