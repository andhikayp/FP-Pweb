<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Category;
use DB;
use Storage;
use App\Http\Controllers\Controller;
class PostController extends Controller
{
    public function create(){
    	$categories = Category::all();
    	return view('post.create',compact('categories'));
    }

    public function store(Request $request){
    	// validasi data ketika null
    	// $this->validate(request(),[
    	// 	'title' => 'required',
    	// 	'content' => 'required|min:10',
        //     'avatar' => 'image|nullable|max:1999'
    	// ]);
        //Handle File Upload
        if ($request->hasFile('avatar')) {
            $filenameWithExt = $request->file('avatar')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('avatar')->storeAs('public/avatar', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
    	// Post::create([
    	// 	'title' => request('title'),
    	// ]);
        $post = new Post;
        $post->title= $request->input('title');
        $post->slug= $request->input('title');
        $post->content= $request->input('content');
        $post->category_id= $request->input('category_id');
        $post->user_id= auth()->user()->id;
        $post->avatar= $fileNameToStore;
        $post->save();
    	return redirect()->route('post.index')->with('success','Post ditambahkan');
    }

    public function index(){
    	$posts = Post::latest()->paginate(2);
    	return view('post.index', compact('posts'));
    }

    public function edit($id){
    	$post= Post::find($id);
        if($post==null){
            return redirect('/post');
        }
        if($post->user_id!=auth()->user()->id){
            return redirect()->back();
        }
    	$categories = Category::all();
    	return view('post.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id){
        // validasi data ketika null
        // dd($request);
        $this->validate(request(),[
            'title' => 'required',
            'content' => 'required|min:10',
            'avatar' => 'image|nullable|max:1999'
        ]);
        //Handle File Upload
        if ($request->hasFile('avatar')) {
            $filenameWithExt = $request->file('avatar')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('avatar')->storeAs('public/avatar', $fileNameToStore);
        } 
    	$post = Post::find($id);
        $post->title= $request->input('title');
        $post->content= $request->input('content');
        $post->category_id= $request->input('category_id');
        // if($post->avatar != 'noimage.jpg'){
        //     Storage::delete('public/avatar/'.$post->avatar);
        // }
        if($request->hasFile('avatar')){
            $post->avatar = $fileNameToStore;
        }  
        $post->save();
    	return redirect()->route('post.index')->with('info','Post berhasil diubah');
    }

    public function destroy(Post $post){
        if($post->avatar != 'noimage.jpg'){
            Storage::delete('public/avatar/'.$post->avatar);
        }
    	$post->delete();
    	return redirect()->route('post.index')->with('danger','Post berhasil dihapus');
    }

    public function show(Post $post){
    	return view('post.show', compact('post'));
    }

    public function search(\Illuminate\Http\Request $request){
        $search =  $request->search;
        $posts = Post::when($request->search, function ($query) use ($request) {
            $query->where('title', 'like', "%{$request->search}%")
                ->orWhere('content', 'like', "%{$request->search}%");
        })->paginate(1);
        // dd($posts);
        return view('post.result', compact('posts', 'search'));
    }

    //cari user
    // public function cari(\Illuminate\Http\Request $request){
    //     $search =  $request->search;
    //     $posts = User::when($request->search, function ($query) use ($request) {
    //         $query->where('name', 'like', "%{$request->search}%");
    //     })->paginate(3);
    //     // dd($posts);
    //     $bebas = Post::find($posts);
    //     return view('post.user', compact('posts', 'search'));
    // }
    public function cari(Request $request){
        $search =  $request->search;
        $users = User::where('name', 'LIKE', "%{$search}%")->paginate(5);
        return view('post.user', compact('users', 'search'));
    }
    
    //cari kategori
    // public function kategori(\Illuminate\Http\Request $request, $bebas){
    //     // $users = DB::select('select * from posts where category_id = :category_id', ['category_id' => $bebas]);
    //     $users = Post::where('category_id', $bebas]);
    //     dd($users);
    //     // $keren = User::all();
    //     // dd($keren);
    //     $cat =  DB::select('select name from categories where id = :id', ['id' => $bebas]);
    //     // dd($cat);
    //     return view('post.category', compact('users','cat','keren'));
    // }

    public function kategori(Request $request, $bebas){
        $posts = Post::where('category_id', $bebas)->paginate(5);
        $categories =  Category::where('id', $bebas)->first();
        return view('post.category', compact('posts','categories'));
    }

}
