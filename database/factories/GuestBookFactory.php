<?php

namespace Database\Factories;

use App\Models\GuestBook;
use Illuminate\Database\Eloquent\Factories\Factory;

class GuestBookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GuestBook::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->userName,
            'message' => $this->faker->sentence(5),
            'status' => true
        ];
    }
}
