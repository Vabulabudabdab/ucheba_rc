<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\SearchRequest;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\EditRequest;
use App\Models\Category;

class CategoryController  {

    public function store(StoreRequest $request) {
        $data = $request->validated();
        Category::create([
            'title' => $data['title'],
        ]);

        return redirect()->route('admin.categories.index');
    }

    public function update(EditRequest $request, Category $category) {
        $data = $request->validated();

        $category->update([
            'title' => $data['title'],
        ]);

        return redirect()->route('admin.categories.index');
    }

    public function delete(Category $category) {
        $category->delete();
        return redirect()->route('admin.categories.index');
    }

    public function search(SearchRequest $request) {
        $data = $request->validated();

        $query = Category::query();

        if(isset($data['title'])) {
            $query->where('title', 'like', "%{$data['title']}%");
        }

        $categories = $query->paginate(9);
        return view('admin.categories.search', compact('categories'));
    }

}
