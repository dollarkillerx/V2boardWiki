<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function show($id) {
        return "ID: " . $id;
    }

    public function showPosts($slug) {
        $post = DB::table('posts')->where("slug", $slug)->first();

        if (!$post) {
            abort(404);  // 如果找不到，返回 404
        }

//        dd($post);   调试

        return view("post", [
            "post" => $post
        ]);
    }
}
