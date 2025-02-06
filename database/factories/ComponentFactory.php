<?php

namespace Database\Factories;

use App\Models\Component;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComponentFactory extends Factory
{
    protected $model = Component::class;

    public function definition(): array
    {
        return [
            'category_id' => 1,
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'code_html' => $this->faker->randomHtml(),
            'code_vue' => $this->faker->randomHtml(),
            'code_react' => $this->faker->randomHtml(),
        ];
    }
}
