<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use \App\Models\Post;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/blog')->name('blog.')->group(function(){
    Route::get('/', function(Request $request){

        // $post = new Post();
        // $post->title = 'Mon second article';
        // $post->slug = 'mon-second-article';
        // $post->content = 'Commodo elit elit excepteur eiusmod ad irure est qui. Nisi aute aute ut Lorem Lorem officia laboris tempor minim proident cillum qui amet excepteur. Sit tempor nulla minim consequat voluptate ullamco labore consectetur voluptate ullamco cillum. Lorem do sit nulla esse aliquip ullamco sunt esse enim ullamco ea voluptate ea ipsum. Consectetur cupidatat occaecat Lorem tempor anim culpa sunt.';
        // $post->save(); // La methode save() disponible au niveau de tous les models permet d'enregistrer les informations dans la base de données

        
        // $posts = Post::all(['id', 'title']);
        $mypost = Post::paginate(1, ['id', 'title']);
        $myposts = Post::where('id', '>', 1)->get();

        //modifier un article
        $post_modifier = Post::find(1);
        $post_modifier->title = 'Nouveau titre';
        $post_modifier->save(); // La methode delete permet de modifier un enregistrement

        // dd($posts[1]);
        // dd($mypost);
        // dd($myposts);
        dd($post_modifier);

        return $post_modifier;
        
        // return [
        //     "link" => \route('blog.show', ['slug' => 'article', 'id' => 16])  ,
        // ];
    })->name('index');

    Route::get('/{slug}-{id}', function (string $slug, string $id, Request $request) {
        return [
            "slug" => $slug,
            "id" => $id,
            "name" => $request->input('name')
        ];
    })->where([
    'slug' => '[a-z0-9\-]+',
    'id' => '[0-9]+'
    ])->name('show');
});










