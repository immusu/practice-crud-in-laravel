<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){
        return view('create');
    }

    public function filestore(Request $request){
        
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable',
        ]);
        
        //image upload
        $image_name = null;
        if (isset($request->image)){
            $image_name = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $image_name);
        }
        

        //add post
        $post = new Post();
        
        $post->name = $request->name;
        $post->description = $request->description;
        $post->image = $image_name;

        $post->save();

        return redirect()->route('home')->with('success','Your post has been created successfully! Congratulations!');

    }

    public function editdata($id){
        $post = Post::findOrFail($id);
        return view('edit', ['mypost'=> $post]);
    }

    public function updatedata($id, Request $request){       
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable',
        ]);
        

        //update post
        $post = Post::findOrFail($id);
        $post->name = $request->name;
        $post->description = $request->description;
        
        //image upload
        if (isset($request->image)){
            $image_name = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $image_name);
            $post->image = $image_name;
        }

        $post->save();

        return redirect()->route('home')->with('success','Your post has been updated successfully! Congratulations!');
    }

    public function deletedata($id){
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect()->route('home')->with('success','Your post has been deleted successfully! Congratulations!');
    }
}
