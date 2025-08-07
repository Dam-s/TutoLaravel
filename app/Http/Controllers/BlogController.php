<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\Paginator;
use \App\Models\Post;
use Illuminate\Http\RedirectResponse;

class BlogController extends Controller
{
    //Creer des fonctions qui correspondent à nos differentes actions
    public function index(){
        $posts = Post::paginate(25);
        return view('blog.index');
    }

    public function show(string $slug, string $id): RedirectResponse | Post
    {
        $post = Post::findorFail($id);
        if($post->slug != $slug){
            return to_route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
        }
        return $post;
    }
}
