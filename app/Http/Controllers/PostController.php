<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category)
    {
        // Show All Available Posts
       if ($category == "0") $posts = Post::all();
       else $posts = Post::where('category_id',$category)->get();
        return view('blog.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // show create post form
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // save the created post to DB
        if(!$request->get('category')) return redirect('blog/create/post');
        $newPost = Post::create([
            'title' => $request->title,
            'contents' => $request->contents,
            'category_id' => str_replace('/blog/cat/','',$request->get('category')),
            'user_id' => $request->user()->id,
        ]);

        return redirect('blog/' . $newPost->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // show a single post
        return view('blog.show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // show edit post form
        return view('blog.edit', [
            'post' => $post,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // commit edited post to DB
        $post->update([
            'title' => $request->title,
            'contents' => $request->contents,
            'category_id' => str_replace('/blog/cat/','',$request->get('category')),
        ]);

        return redirect('blog/' . $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // delete a post
        $post->delete();
        return redirect('/blog/cat/0');
    }
}
