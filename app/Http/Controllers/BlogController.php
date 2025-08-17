<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogFilterRequest;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use \App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    //Creer des fonctions qui correspondent à nos differentes actions
    public function index(BlogFilterRequest $request){

        // $validator = Validator::make(["title"=> "ddfdggfffgd", 'content' => ''], ["title"=> 'min:8']);
        // dd($validator->validated()); // les autres methodes sont errors, fails etc...

        // Les règles d'un même champ peuvent être definies sous forme de tableau ou en utilisant la classe Rule et ses methodes
        //les validations se font dans BlogFilterRequest
        // dd($request->validated());
        $posts = Post::paginate(1);
        return view('blog.index', ['posts'=> $posts]);
    }
#
    public function show($slug, Post $post)
    {
        // dd($post);
        // Remarque : En utilisant le paramètre de type Post on a plus besoin d'utiliser la methode findOrFail(Model binding). On peut aussi juste renvoyer le paramètre en tant que data .
        // $post = Post::findorFail($post);
        if($post->slug != $slug){
            return to_route('blog.show', ['slug' => $post->slug, 'post' => $post->id]);
        }
        return view('blog.show', ['post' => $post]) ;
    }
}
