<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authId = auth()->user()->id;

        $posts = Post::where('user_id', $authId)->paginate(5);

        return view('posts.index')->with(['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $published = $request->published ?? 0;
        if($published !== 0 && $published == 'on') {
            $published = 1;
        }

        $post = Post::insert([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'content' => $request->content,
            'published' => $published,
        ]);

        Session::flash('success', 'Post Created Successfully.');
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        if($post) {
            return view('posts.show')->with(['post' => $post]);
        } else {
            Session::flash('error', 'Post not found!');
            return view('posts.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        if($post) {
            return view('posts.edit')->with(['post' => $post]);
        } else {
            return view('posts.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $published = $request->published ?? 0;
        if($published !== 0 && $published == 'on') {
            $published = 1;
        }

        $post = Post::where(['id' => $id, 'user_id' => auth()->user()->id])->update([
            'title' => $request->title,
            'content' => $request->content,
            'published' => $published,
        ]);

        Session::flash('success', 'Post Updated Successfully.');
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Post::where(['user_id' => auth()->user()->id, 'id' => $id])->delete();

        Session::flash('error', 'Post Deleted Successfully.');

        return redirect()->route('posts.index');
    }

    public function postSearch(Request $request)
    {
        $posts = [];

        

        if($request->has('q')) {
            if(trim($request->q) != '') {
                #user is expecting search result
                $posts = Post::search($request->q)->paginate();
            }
        }

        return view('posts.search')->with(['posts' => $posts, 'q' => $request->q ?? '']);
    }

    public function postClientSearch(Request $request)
    {
        return view('layouts.vue.vue-algolia');
    }
}
