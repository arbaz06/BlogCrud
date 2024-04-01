<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class PostController extends Controller
{
    public function create()
    {
        $articles = Article::all();
        return view('blog-posts.create', compact('articles'));
    }

   

    public function store(Request $request)
    {
        $request->validate([
            'articles_name' => 'required',
            'description' => 'required',
        ]);

        Article::create($request->all());

        return redirect()->back()->with('success', 'Blog post created successfully!');
    }

   
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('blog-posts.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'articles_name' => 'required',
            'description' => 'required',
        ]);

        $article = Article::findOrFail($id);
        $article->update($request->all());

        return redirect()->route('blog-posts.create')->with('success', 'Blog post updated successfully');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('blog-posts.create')->with('success', 'Blog post deleted successfully');
    }

    public function updateStatus(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update(['status' => $request->has('status')]);

        return redirect()->back()->with('success', 'article status updated successfully');
    }
}
