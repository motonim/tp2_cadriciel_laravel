<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class ArticleFactory extends Factory
{
     /**
     * The name of the factory's corresponding model.
     * 
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::all()->pluck('id')->toArray();

        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(40),
            'author_id' => Arr::random($users)
        ];
    }
}
