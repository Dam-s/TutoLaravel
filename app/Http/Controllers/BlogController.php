<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use \App\Models\Post;
use Illuminate\Http\RedirectResponse;

class BlogController extends Controller
{
    //Creer des fonctions qui correspondent à nos differentes actions
    public function index(){
        $posts = Post::paginate(1);
        return view('blog.index', ['posts'=> $posts]);
    }

    public function show(string $slug, string $id)
    {
        $post = Post::findorFail($id);
        if($post->slug != $slug){
            return to_route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
        }
        return view('blog.show', ['post' => $post]) ;
    }
}
