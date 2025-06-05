<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = \App\Models\Blog::latest()->take(3)->get();
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
}
