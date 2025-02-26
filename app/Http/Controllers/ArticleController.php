<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct(private ArticleService $articleService) {}

    public function index(Request $request)
    {
        $articles = $this->articleService->getAll();
        return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        $article = $this->articleService->getOne($article);
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $response = $this->articleService->store($request->all());

        if (isset($response['errors'])) {
            return back()->withErrors($response['errors'])->withInput();
        }

        return redirect()->route('articles.index');
    }
}
