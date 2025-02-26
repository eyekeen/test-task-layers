<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(5),
            'author' => $this->faker->name(),
            'brief' => $this->faker->paragraph(2),
            'content' => $this->faker->paragraph(10),
        ];
    }
}