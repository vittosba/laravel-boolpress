<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::orderBy('id', 'desc')->paginate(3);

        return response()->json($posts);
    }

    /**
      * Post details
      */
      public function show($slug) {

        $post = Post::where('slug', $slug)->with(['category', 'tags'])->first();
        
        if (! $post) {
           $post['not_found'] = true;
        }
        elseif ($post->cover) {
          $post->cover = url('storage/' . $post->cover);
       }

        return response()->json($post);
     }
}
