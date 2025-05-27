<?php

namespace App\Http\Controllers\V0;

use App\Models\Category;
use App\Models\Post;

class IndexController {

    public function index() {
        $random_posts = Post::inRandomOrder()->limit(3)->get();
        return view('index', compact('random_posts'));
    }

    public function posts() {
        $posts = Post::paginate(9);
        $categories = Category::all();
        return view('posts', compact('posts', 'categories'));
    }

    public function posts_search(Category $category) {

        $posts = Post::where('category_id', $category->id)->paginate(9);
        $categories = Category::all();
        return view('posts', compact('posts', 'categories'));
    }

    public function post_like(Post $post) {
        auth()->user()->likedPosts()->toggle($post->id);

        return redirect()->back();
    }

    public function posts_show(Post $post) {
        $posts_seems = Post::where([
            ['category_id', $post->category->id],
            ['id', '!=', $post->id]
        ])->inRandomOrder()->limit(3)->get();
        $categories = Category::all();
        return view('post', compact('post', 'posts_seems', 'categories'));
    }

    public function register()  {
        return view('auth.register');
    }

    public function login() {
        return view('auth.login');
    }

}
