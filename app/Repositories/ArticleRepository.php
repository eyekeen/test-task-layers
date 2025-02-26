<?php 

namespace App\Repositories;

use App\Models\Article;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function create(array $data)
    {
        return Article::create($data);
    }

    public function all()
    {
        return Article::latest()->paginate(5);
    }

    public function find(Article $article)
    {
        // return Article::findOrFail($id);
        return $article;
    }
}