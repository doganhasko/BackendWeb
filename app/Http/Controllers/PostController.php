<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;

use Auth;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth',['except'=>['index']]);
    }


    public function index(){
        $posts= Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function show($id) {
        $post=Post::findOrFail($id);
        return view('posts.show',compact('post'));
    }


    public function create(){
        
        return view('posts.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|min:1',
            'content' => 'required|min:1',
            'image' => 'nullable','image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the allowed image formats and file size as needed.
        ]);
    
        $post = new Post;
        $post->title = $validated['title'];
        $post->message = $validated['content'];
        $post->user_id = Auth::user()->id;
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $post->postphoto = $imagePath;
        }
    
        $post->save();
    
        return redirect()->route('index')->with('status', 'Your experience is successfully added, thank you for your feedback.');
    }

    public function edit($id){
        $post= Post::findOrFail($id);
        if($post->user_id != Auth::user()->id && !Auth::user()->is_admin){
            abort(403);
        }
        return view('posts.edit',compact('post'));
    }

    public function update($id, Request $request){
        $post= Post::findOrFail($id);
        if($post->user_id != Auth::user()->id){
            aboort(403);
        }

        $validated = $request->validate([
            'title'=>'required|min:1',
            'content'=>'required|min:1',
        ]);

        $post->title=$validated['title'];
        $post->message=$validated['content'];
        $post->save();

        return redirect()->route('index')->with('status','Your experience is successfully edited, thank you for your feedback.');
    }

    public function destroy($id){

        if(!Auth::user()->is_admin){
            abort(403,'Only Admins Can Delete Posts');
        }

        $post= Post::findOrFail($id);
        $likes= Like::where('post_id','=', $post->id)->delete();
        $post->delete();

        return redirect()->route('index')->with('status','Post is Successfully Deleted!');
    }
}
