<?php
namespace App\Http\Controllers;  

use App\Models\Article;  
use App\Models\Category;  
use App\Models\Tag;  
use Illuminate\Http\Request;  

class ArticleController extends Controller  
{  
    public function index()  
    {  
        $articles = Article::with('category', 'tags')->get();  
        return view('articles.index', compact('articles'));  
    }  

    public function create()  
    {  
        $categories = Category::all();  
        $tags = Tag::all();  
        return view('articles.create', compact('categories', 'tags'));  
    }  

    public function store(Request $request)  
    {  
        $request->validate([  
            'title' => 'required|string|max:255',  
            'full_text' => 'required|string',  
            'image' => 'nullable|image',  
            'category_id' => 'required|exists:categories,id',  
            'tags' => 'array',  
            'tags.*' => 'exists:tags,id',  
        ]);  

        $article = Article::create([  
            'title' => $request->title,  
            'full_text' => $request->full_text,  
            'image' => $request->file('image')->store('images', 'public'),  
            'user_id' => auth()->id(),  
            'category_id' => $request->category_id,  
        ]);  

        $article->tags()->attach($request->tags);  

        return redirect()->route('articles.index')->with('success', 'Article created successfully.');  
    }  

    public function show(Article $article)  
    {  
        return view('articles.show', compact('article'));  
    }  

    public function edit(Article $article)  
    {  
        $categories = Category::all();  
        $tags = Tag::all();  
        return view('articles.edit', compact('article', 'categories', 'tags'));  
    }  

    public function update(Request $request, Article $article)  
    {  
        $request->validate([  
            'title' => 'required|string|max:255',  
            'full_text' => 'required|string',  
            'image' => 'nullable|image',  
            'category_id' => 'required|exists:categories,id',  
            'tags' => 'array',  
            'tags.*' => 'exists:tags,id',  
        ]);  

        $article->update([  
            'title' => $request->title,  
            'full_text' => $request->full_text,  
            'image' => $request->file('image') ? $request->file('image')->store('images', 'public') : $article->image,  
            'category_id' => $request->category_id,  
        ]);  

        $article->tags()->sync($request->tags);  

        return redirect()->route('articles.index')->with('success', 'Article updated successfully.');  
    }  

    public function destroy(Article $article)  
    {  
        $article->tags()->detach();  
        $article->delete();  

        return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');  
    }  
}