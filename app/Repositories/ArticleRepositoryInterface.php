<?php

namespace App\Repositories;

use App\Models\Article;

interface ArticleRepositoryInterface
{
    public function create(array $data);
    public function all();
    public function find(Article $article);
}