<?php

namespace App\Http\Controllers\Article;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\ArticleImages;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\ArticleStoreRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Gate::allows('article_list')) {
            return abort(401);
        }
        $articles = Article::with('images')->orderBy('id', 'desc')->get();
        // dd($articles);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('article_create')) {
            return abort(401);
        }
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleStoreRequest $request)
    {
        if (!Gate::allows('article_create')) {
            return abort(401);
        }

        $article = $request->validated();
        // dd($article);
        $article = Article::create($article);
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('storage/articles'), $imageName);
                $article->images()->create(['image' => $imageName]);
            }
        }
        // dd($article);

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!Gate::allows('article_list')) {
            return abort(401);
        }
        $article = Article::where('id', $id)->first();

        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!Gate::allows('article_edit')) {
            return abort(401);
        }
        $article = Article::where('id', $id)->first();
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleStoreRequest $request, string $id)
    {
        if (!Gate::allows('article_edit')) {
            return abort(401);
        }
        $article = $request->validated();
        Article::where('id', $id)->update($article);

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Gate::allows('article_delete')) {
            return abort(401);
        }
        Article::where('id', $id)->delete();

        return redirect()->route('articles.index');
    }
}
