<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth');
     }
    public function index()
    {
        $posts = DB::table('posts')->select('id', 'title', 'content')->get();
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if (auth()->user()->is_admin == 1) {
          return view('posts.create');
      }
      else{
          $posts = DB::table('posts')->select('id', 'title', 'content')->get();
          return view('posts.index', ['posts' => $posts])->with('error','You have no permissions for this action.');
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
          'title' => 'required',
          'content' => 'required',
      ]);
      Post::create($request->all());
      $posts = DB::table('posts')->select('id', 'title', 'content')->get();
      return redirect()->route('posts.index', ['posts' => $posts])
                       ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if (auth()->user()->is_admin == 1) {
          return view('posts.show', ['post' => $post]);
        }
        else{
          $post->adminContent = '';
          return view('posts.show', ['post' => $post]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (auth()->user()->is_admin == 1) {
          return view('posts.edit', ['post' => $post]);
        }
        else{
          $post->adminContent = '';
          return view('posts.show', ['post' => $post])->with('error','You have no permissions for this action.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $post->update($request->all());
        return redirect()->route('posts.index')->with('success','Post was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (auth()->user()->is_admin == 1) {
          $post->delete();
        }
        return redirect()->route('posts.index');
    }
}
