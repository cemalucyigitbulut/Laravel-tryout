<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function __construct()
      {
          $this->middleware(['auth'])->only(['store','destroy']);
      }
    
    
    public function index(){
        
        // $posts = Post::get(); return all post natural database order  (blindly take all posts)

        $posts = Post::orderBy('created_at','desc')->with(['user','likes'])->paginate(10); //sayfalandırma  (kaçtane post kalsın diyer sayafa geçmeden önce) (orderby ın yerine ()latest de olurmuş sadece)
        
        return view('posts.index',[ 'posts' => $posts]);
    }

    public function store(Request $request){
        
        $this->validate($request,[
            'body' => 'required'
        ]);

        $request->user()->posts()->create($request->only('body'));


        //$request->user()->posts()->create(['body' =>$request->body]);   (yukardakinin aynısı)


        return back();
    }


      public function destroy(Post $post){
        
        //    if (!$post->ownedBy(auth()->user())){
        //       dd('no'); 
        //    }
        
          $this->authorize('delete', $post); //throw an exeption when deleting someone else post

          $post->delete();

           return back();
      }



      public function show(Post $post){
         return view('posts.show',['post'=>$post]);
      }



}
