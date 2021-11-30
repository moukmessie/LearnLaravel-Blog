<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //page d'accueil
   public function index()
   {
       return view('home');
   }
    //affichage de produit selon lid
    public function show($id)
    {
        $post=Post::findOrFail($id);
        //$post=Post::where('title','Commodi laudantium maxime earum.')->firstOrFail();
        //$post=$posts[$id] ?? "Pas d'article";
        return view('pages/article', ['post'=>$post]);
    }
    //vue contact
    public function contact()
    {
        return view('pages/contact');
    }

    //recuperation de tous les donnée de la BD et
    // affichage sur la page articles
    public function articles()
    {
        $posts= Post::all();
        return view('/pages/articles',['posts'=>$posts]);
    }
//vue de la page creer
    public function create()
    {
        return view('/pages/create');
    }

    /**
     * Insertion des données da la base de données
     * @param Request $request
     */
    public function store(Request $request)
    {
//        $post=new Post();
//        $post->title=$request->title;
//       $post->content=$request->input('content');
        Post::create([
            'title'=>$request->title,
            'content'=>$request->input('content')
        ]);

       dd('Post créé!');

    }
    //mettre à jour le titre
    public function updateTitle($id)
    {
        $post= new Post();
        $post->update([
            'title'=>'Titre',
        ]);
        dd('Titre modifier');
    }
    //supprimé un post
    public function deletePost($id)
    {
        $post= Post::find($id);
        $post->delete();

        dd('Poste supprimé');
    }
}
