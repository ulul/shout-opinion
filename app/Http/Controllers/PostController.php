<?php

namespace App\Http\Controllers;

use Purifier;
use Validator;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Post_comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'detail', 'opinionByCategory']);
    }

    /**
     * list all posts
     * @return void
     */
    public function index()
    {
    	$posts = Post::with('user')->orderBy('id', 'DESC')->paginate(9);
    	return view('posts.index', compact('posts'));
    }

    /**
     * form to create post
     * @return void
     */
    public function create()
    {
        $categories = Category::all()->sortByDesc('id');
        return view('posts.create', compact('categories'));
    }

    /**
     * store post from form
     * @return void
     */
    public function store(Request $request)
    {
        $validation = [
            'title' => 'required|max:255|string',
            'category' => 'required|max:255',
            'thumbnail' => 'required|image',
            'description' => 'required|string',
        ]; 

        $this->validate($request, $validation);

        $uploadedFile = $request->file('thumbnail');        
        $path = $uploadedFile->store('public/files/thumbnail/');

        $temp_highlight = strip_tags($request->description);
        $sparate_highlight = count(explode(" ", $temp_highlight));
        if ($sparate_highlight >= 15) {
            $length = 15;
        }else{
            $length = $sparate_highlight;
        }
        $highlight = html_entity_decode(implode(' ', array_slice(explode(' ', $temp_highlight), 0, $length))."\n");


        $data = [
            'title' => $request->title,
            'category_id' => $request->category,
            'thumbnail' => $path,
            'description' => Purifier::clean($request->description),
            'user_id' => Auth::user()->id,
            'slug' => str_slug($request->title),
            'highlight' => $highlight,
        ];

        Post::create($data);

        return redirect()->route('user.profile', Auth::user()->username)->with([
            'message' => 'Post has been created.'
        ]);
    }

    /**
     * detail of post
     * @param  [String] $slug 
     * @return void
     */
    public function detail($slug)
    {
        $post = Post::with('user')->where('slug', $slug)
                ->firstOrFail();
        
        $comments = Post_comment::where('post_id', $post->id)
               ->orderBy('id', 'desc')
               ->get();
        
        DB::table('posts')
                ->where('slug', $slug)
                ->increment('page_views');
        
        $related_post = Post::where('category_id', $post->category_id)
                ->paginate(3);
    	return view('posts.detail', compact('post', 'related_post', 'comments'));
    }

    /**
     * [form edit post]
     * @param  [String] $slug [description]
     * @return [Void]
     */
    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $categories = Category::all()->sortByDesc('id');
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * [save ]
     * @param  [int]  $id      
     * @param  Request $request 
     * @return [void] 
     */
    public function save($id, Request $request)
    {
        $post = Post::where('id', $id)->firstOrFail();
        if ($request->thumbnail){
            $validation = [
                'title' => 'required|max:255|string',
                'category' => 'required|max:255',
                'thumbnail' => 'required|image',
                'description' => 'required|string',
            ]; 
        }else{
            $validation = [
                'title' => 'required|max:255|string',
                'category' => 'required|max:255',
                'description' => 'required|string',
            ]; 
        }
        $this->validate($request, $validation);

        $temp_highlight = strip_tags($request->description);
        $sparate_highlight = count(explode(" ", $temp_highlight));
        if ($sparate_highlight >= 15) {
            $length = 15;
        }else{
            $length = $sparate_highlight;
        }
        $highlight = html_entity_decode(implode(' ', array_slice(explode(' ', $temp_highlight), 0, $length))."\n");

        if ($request->thumbnail){
            $uploadedFile = $request->file('thumbnail');        
            $path = $uploadedFile->store('public/files/thumbnail/');

            

            $data = [
                'title' => $request->title,
                'category_id' => $request->category,
                'thumbnail' => $path,
                'description' => Purifier::clean($request->description),
                'user_id' => Auth::user()->id,
                'slug' => str_slug($request->title),
                'highlight' => $highlight,
            ];
        }else{
            $data = [
                'title' => $request->title,
                'category_id' => $request->category,
                'description' => Purifier::clean($request->description),
                'user_id' => Auth::user()->id,
                'slug' => str_slug($request->title),
                'highlight' => $highlight,
            ];
        }
        
        $post->update($data);

        return redirect()->route('user.profile', Auth::user()->username)->with([
            'message' => 'Post has been updated.'
        ]);
    }

    /**
     * [opinionByCategory description]
     * @param  [string] $slug [description]
     * @return [void]       
     */
    public function opinionByCategory($slug)
    {
        $category = Category::where('category_slug', $slug)->firstOrFail();
        $posts = Post::with('user')->where('category_id', $category->id)->paginate(9);

        return view('posts.index', compact('posts'));
    }
}
