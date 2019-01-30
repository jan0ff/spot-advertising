<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function __construct()
     {
         $this->middleware('auth')->except(['show', 'index','tags']);
     }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $posts = Post::with('tags')->orderBy('created_at', 'desc')->paginate(10);

          return view('posts.index', compact('posts'));
    }


    public function tags(Tag $tag){

        $posts = $tag->posts()->with('tags')->orderBy('created_at', 'desc')->paginate(10);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $tags = Tag::all();

       return view('posts.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //'id','title','description','is_headline','user_id'
      $validatedData = $request->validate([
         'title' => 'required|max:255',
         'description' => 'required|max:2048',
         'is_headline'=> [function ($attribute, $value, $fail) {

            $postToday =   Post::where('is_headline', 1)
             ->where( 'user_id', Auth::id() )
             ->whereDate('created_at', '=', Carbon::today()->toDateString() )
             ->count();


            if ($value == 1 && $postToday > 2) {

                $fail('Too many headlines for one day');

            }
        }]
      ]);

      $data =   $request->only("title",  "description" , "is_headline" );

      $data['user_id'] = Auth::id();

      $post = Post::create( $data );

      $post->tags()->sync($request->tags);

      return redirect('/posts');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }


}
