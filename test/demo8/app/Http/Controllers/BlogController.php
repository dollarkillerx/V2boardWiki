<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = \App\Models\Blog::latest()->get();
        return view('homepage', [
            'blogs' => $blogs
        ]);
    }

    public function detail($id)
    {
        $blog = \App\Models\Blog::findorFail($id);
        return view("posts.detail", [
            'id' => $id,
            'blog' => $blog]);
    }

    public function create()
    {
        return view("posts.create");
    }

    public function store(Request $request)
    {
        request()->validate([
            'title' => [
                'required', 'min:3', 'max:20'
            ],
            'excerpt' => 'required',
            'message' => 'required',
        ], [
            'title.required' => '标题不能为空',
            'title.min' => '标题最少3个字符',
            'title.max' => '标题最多20个字符',
            'excerpt.required' => '简介不能为空',
            'message.required' => '内容不能为空',
        ]);
//        dd($request->all());
        $blog = new \App\Models\Blog;
        $blog->title = $request->title;
        $blog->excerpt = $request->excerpt;
        $blog->body = $request->message;
        $blog->bg_img = "banner2.jpg";
        $blog->save();
        return redirect("/");
    }

    public function edit($id)
    {
        $blog = \App\Models\Blog::findorFail($id);
        return view("posts.edit", [
            'id' => $id,
            'blog' => $blog]);
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'title' => [
                'required', 'min:3', 'max:20'
            ],
            'excerpt' => 'required',
            'message' => 'required',
        ]);
        $blog = \App\Models\Blog::findorFail($id);
        $blog->title = $request->title;
        $blog->excerpt = $request->excerpt;
        $blog->body = $request->message;
        $blog->save();
        return redirect("/");
    }
}
