<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostsController extends Controller
{
    public function index(){
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts','slug')],   
            'excerpt' => 'required',
            'thumbnail' => 'required|image',
            'body' => 'required',
            'catagory_id' => ['required', Rule::exists('catagories','id')],
        ]);
      
     
        $attributes['user_id']= auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnail');
        
        Post::create($attributes);
        return redirect('/');
    }


    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }


    public function update(Post $post)
    {
        $attributes = $this->validatePost($post);

        $post->update($attributes);

        return redirect('/');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post Deleted!');
    }


    protected function validatePost(?Post $post = null): array
    {
        $post ??= new Post();

        return request()->validate([
            'title' => 'required',
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => 'required',
            'body' => 'required',
            'catagory_id' => ['required', Rule::exists('categories', 'id')]
        ]);
    }
}


