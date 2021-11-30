<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Http\Request;


class PostController extends Controller
{
    //page d'accueil
   public function index()
   {
       return view('home');
   }
    //affichage de produit selon lid
    public function show_post($id)
    {
        $post=Post::findOrFail($id);

        //$post=Post::where('title','Commodi laudantium maxime earum.')->firstOrFail();
        //$post=$posts[$id] ?? "Pas d'article";

        return view('pages/post', ['post'=>$post]);
    }
    //affichage video
    public function show_video($id)
    {
        $video=Video::findOrFail($id);
        return view('pages/video', ['video'=>$video]);
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
        $videos= Video::all();

        return view('/pages/articles',['posts'=>$posts,'videos'=>$videos]);
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

    //Adding comments
    public function add_comment()
    {
        //données en dure
        $post = Post::find(5);
        $video = Video::find(1);

        $comment1 = new Comment(['content' => 'mon premier commentaire']);
        $comment2 = new Comment(['content'=>'Deuxieme super commentaire de poste']);
        //enregistrement des commentaire des postes dans la BD
        $post->comments()->saveMany([
            $comment1,
            $comment2
        ]);

        $comment3 = new Comment(['content'=>'commentaire de la video en dure']);
        //Enregistrement des commentaire de la video
        $video->comments()->save($comment3);
    }

}
