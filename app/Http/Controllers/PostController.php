<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\Backtrace\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        $suggested_users = auth()->user()->suggested_users() ; 
        return view('posts.index' , compact(['posts' ,'suggested_users']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'description'   => 'required',
            'image'         => ['required' , 'mimes:jpg,jpeg,png,gif'] 
        ]);
        // $image = $request['image']->store('posts' , 'public');

        $image = $request->file('image') ; 
        $image_name ='posts/' .time() . '.' . $image->getClientOriginalExtension() ;
        $image->move(public_path('image/posts') , $image_name);

        $data['image'] = $image_name ;
        $data['slug'] = Str::random(10);
        auth()->user()->posts()->create($data) ;
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show' , compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit' , compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'description'   => 'required',
            'image'         => ['nullable' , 'mimes:jpg,jpeg,png,gif'] 
        ]);
        if($request->has('image')){
            $image = $request->file('image') ; 
            $image_name ='posts/' .time() . '.' . $image->getClientOriginalExtension() ;
            $image->move(public_path('image/posts') , $image_name);
            $data['image'] = $image_name ;
        }
        $post->update($data);
        return redirect('/p/' . $post->slug );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        unlink("image/$post->image");
        $post->delete();
        return redirect('home');
    }
}
