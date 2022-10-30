<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class BlogController extends Controller
{
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $posts = Post::get();
            
        return view('blog.index')->with('posts', $posts);
        //return view('posts');
    }



    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //return "mostrar post";
        return view('blog.show')->with('post', $post);
    }




}
