<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;

use Auth;

class LikeController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function like($postId, Request $request){

        $post=Post::findOrFail($postId);
        if($post->user_id==Auth::user()->id){
            abort(403,'YOU CANNOT LIKE YOUR OWN POST, THATS WEIRD');
        }

        $like= Like::where('post_id','=',$postId)-> where('user_id','=',Auth::user()->id)->first();
        if($like !=NULL){
            abort(403, 'You Cannot Like the Same Review More Than Once!');
        }


        $like= new Like;
        $like->user_id = Auth::user()->id;
        $like->post_id = $postId;
        $like->save();

        return redirect()->route('index')->with('status','You found this review helpful!');
    }
}
