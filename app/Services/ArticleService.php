<?php

namespace App\Services;

use App\Models\Article;
use App\Repositories\ArticleRepositoryInterface;
use Illuminate\Support\Facades\Validator;

class ArticleService
{
    public function __construct(private ArticleRepositoryInterface $repository) {}

    public function store(array $data)
    {
        $validator = Validator::make($data, [
            'title' => 'required|string|max:255',
            'author' => 'nullable|string|max:100',
            'brief' => 'required|string|max:500',
            'content' => 'required|string',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $article = $this->repository->create($data);

        return $article;
    }

    public function getAll()
    {
        return $this->repository->all();
    }

    public function getOne(Article $article)
    {
        return $this->repository->find($article);
    }
}
