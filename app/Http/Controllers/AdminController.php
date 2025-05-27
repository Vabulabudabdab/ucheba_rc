<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class AdminController
{

    public function index()
    {
        return view('admin.index');
    }

    public function usersIndex()
    {
        $users = User::paginate(9);
        return view('admin.users.index', compact('users'));
    }

    public function usersCreate()
    {
        return view('admin.users.create');
    }

    public function usersShow(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function usersEdit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function categoriesIndex() {
        $categories = Category::all();
        return view('admin.categories.index',  compact('categories'));
    }

    public function categoriesEdit(Category $category) {
        return view('admin.categories.edit', compact('category'));
    }

    public function categoriesShow(Category $category)  {
        return view('admin.categories.show', compact('category'));
    }

    public function categoriesCreate() {
        return view('admin.categories.create');
    }

    public function postsIndex() {
        $posts = Post::paginate(9);
        return view('admin.posts.index', compact('posts'));
    }

    public function postsCreate() {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    public function postsShow(Post $post) {
        return view('admin.posts.show', compact('post'));
    }

    public function postsEdit(Post $post) {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

}
