<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{
    public function create()
    {
    	$categories = Category::all();
    	return view('post.create',compact('categories'));
    }
    public function store()
    {
    	// validasi data ketika null
    	$this->validate(request(),[
    		'title' => 'required',
    		'content' => 'required|min:10',
    	]);

    	Post::create([
    		'title' => request('title'),
    		'slug' => str_slug(request('title')),
    		'content' => request('content'),
    		'category_id' => request('category_id')
    	]);

    	return redirect()->route('post.index')->with('success','Post ditambahkan');
    }
    public function index()
    {
    	$posts = Post::latest()->paginate(1);
    	return view('post.index', compact('posts'));
    }
    public function edit($id)
    {
    	$post= Post::find($id);
    	$categories = Category::all();
    	return view('post.edit', compact('post', 'categories'));
    }
    public function update($id)
    {
    	$post = Post::find($id);
    	$post -> update([
    		'title' => request('title'),
    		'category_id' => request('category_id'),
    		'content' => request('content')
    	]);
    	return redirect()->route('post.index')->with('info','Post berhasil diubah');
    }
    public function destroy(Post $post)
    {
    	$post->delete();
    	return redirect()->route('post.index')->with('danger','Post berhasil dihapus');
    }
    public function show(Post $post)
    {
    	return view('post.show', compact('post'));
    }
}
