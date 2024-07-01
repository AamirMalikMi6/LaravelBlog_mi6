<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    use ValidatesRequests;
    public function __construct(){
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::orderBy('id','desc')->paginate(3);

        return view('posts.index')->withPosts($posts);
        // return view('posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate the data

        $this->validate($request, [
            'title' => 'required|max:36',
            'slug' => 'required|alpha_dash|min:5|max:30|unique:posts,slug',
            'body' => 'required'
        ]);

        //store in the database
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->save();

        Session::flash('success', 'The Blog Post was successfully saved!');

        // return redirect('/posts')->with('success', 'Post Created');
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $post = Post::find($id);
        return view('posts.show')->withPost($post); // pass the post to the view ->with("post", $post)
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $post = Post::find($id);
        return view('posts.edit')->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $post = Post::find($id);
        if($request->slug == $post->slug){
            $this->validate($request, [
                'title' => 'required|max:36',
                'body' => 'required'
            ]);
        }else{
            $this->validate($request, [
                'title' => 'required|max:36',
                'slug' => 'required|alpha_dash|min:5|max:30|unique:posts,slug',
                'body' => 'required'
            ]);
        }

        $post = Post::find($id);
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->save();

        Session::flash('success', 'The Post is update successfully!');

        return redirect()->route('posts.show', $post->id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $post = Post::find($id);
        $post->delete();

        Session::flash('success', 'The Post is delete successfully!');

        return redirect()->route('posts.index');
    }
}
