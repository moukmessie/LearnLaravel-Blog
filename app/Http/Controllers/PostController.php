<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\Image;
use App\Models\Post;
use App\Models\Video;
use App\Rules\Uppercase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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
//        $request->validate([
//        'title'=>['required','max:255','min:5','unique:posts', new Uppercase],//ensemble de règle
//        'content'=>['required']
//    ]);

      //Enregistrement image dans le dossier storage public avatars
        $filename=time().'.'.$request->avatar->extension();
       $path=$request->avatar->storeAs(
           'avatars',
           $filename,
          'public'
       );

        /**
         * Sachant qu'on a une relation one to one image et post
         * on récupère notre post dans la variable $post
         */
        $post = Post::create([
            'title'=>$request->title,
            'content'=>$request->input('content')
        ]);

        /**
         * création d'une nouvelle instance image
         *
         */
       $image= new Image();
       $image->path = $path;//attribution du path a notre image

        /**
         * Enregistre automatiquement l'id du poste pour lequel est
         * liée l'image en base de donnée
         *
         */
        $post->image()->save($image);
       //$image->post_id = $post->id;


//        $image= Storage::disk('local')->put('avatars', $request->file('avatar'));
//        Storage::get($image);



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
