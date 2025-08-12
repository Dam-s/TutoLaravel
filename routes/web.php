<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use \App\Models\Post;
use \App\Http\Controllers\BlogController;
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

Route::prefix('/blog')->name('blog.')->controller(BlogController::class)->group(function(){
    Route::get('/', 'index'

        // $post = new Post();
        // $post->title = 'Mon second article';
        // $post->slug = 'mon-second-article';
        // $post->content = 'Commodo elit elit excepteur eiusmod ad irure est qui. Nisi aute aute ut Lorem Lorem officia laboris tempor minim proident cillum qui amet excepteur. Sit tempor nulla minim consequat voluptate ullamco labore consectetur voluptate ullamco cillum. Lorem do sit nulla esse aliquip ullamco sunt esse enim ullamco ea voluptate ea ipsum. Consectetur cupidatat occaecat Lorem tempor anim culpa sunt.';
        // $post->save(); // La methode save() disponible au niveau de tous les models permet d'enregistrer les informations dans la base de données
        
        // $posts = Post::all(['id', 'title']);
        // $mypost = Post::paginate(1, ['id', 'title']);
        // $myposts = Post::where('id', '>', 1)->get();

        //modifier un article
        // $post_modifier = Post::find(1);
        // $post_modifier->title = 'Nouveau titre';
        // $post_modifier->save(); // La methode delete permet de supprimer un enregistrement

        // Créer un nouvel article avec la methode create (ajouter la propriété $fillable au model en incluant les champs modifiables  soit $guarded en spécifiant les champs qu'on ne peut modifier)
        // $new_post = Post::create([
        //     'title' => 'Mon nouveau titre test',
        //     'slug' => 'nouveau-titre-test',
        //     'content' => 'Deserunt incididunt culpa nulla esse fugiat aliqua. Elit in labore do enim dolore adipisicing est qui adipisicing exercitation laboris. Aute dolore culpa ut proident irure.'
        // ]);

        // dd($posts[1]);
        // dd($mypost);
        // dd($myposts);
        // dd($post_modifier);
        // dd($new_post);

        // return $post_modifier;
        
        // return [
        //     "link" => \route('blog.show', ['slug' => 'article', 'id' => 16])  ,
        // ];
    )->name('index');

    Route::get('/{slug}-{id}', 'show'
    )->where([
    'slug' => '[a-z0-9\-]+',
    'id' => '[0-9]+'
    ])->name('show');
});










