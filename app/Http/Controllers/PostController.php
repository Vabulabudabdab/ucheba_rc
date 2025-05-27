<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\EditRequest;
use App\Http\Requests\Post\SearchRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController {

    public function store(StoreRequest $request) {
        $data = $request->validated();
        $image = $this->getImagePath($data);
        Post::create([
            'title' => $data['title'],
            'content' => $data['content'],
            'main_image' => $image,
            'time' => $data['time'],
            'description' => $data['description'],
            'category_id' => $data['category_id'],
        ]);

        return redirect()->route('admin.posts.index');
    }

    public function getImagePath($data) {
        $image = Storage::disk('public')->putFile('images', $data['main_image']);

        return $image;
    }

    public function updateImagePath($data, Post $post) {
        $old_image = Post::where('id', $post->id)->first()->main_image;
        Storage::disk('public')->delete('images/', $old_image);

        $image = Storage::disk('public')->putFile('images', $data['main_image']);

        return $image;
    }

    public function update(EditRequest $request, Post $post) {
        $data = $request->validated();
        
        $image = $this->updateImagePath($data, $post);

        $post->update([
            'title' => $data['title'],
            'content' => $data['content'],
            'main_image' => $image,
            'time' => $data['time'],
            'description' => $data['description'],
            'category_id' => $data['category_id'],
        ]);

        return redirect()->route('admin.posts.index');
    }

    public function delete(Post $post) {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }

    public function search(SearchRequest $request) {
        $data = $request->validated();
        $query = Post::query();
        if(!empty($data['title'])) {
            $query->where('title', 'like', "%{$data['title']}%");
        }

        $posts = $query->paginate(9);
        return view('admin.posts.search', compact('posts'));
    }

}
