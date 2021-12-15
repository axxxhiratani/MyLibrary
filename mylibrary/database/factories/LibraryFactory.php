<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Library;

class LibraryFactory extends Factory
{
    /**
     *
     *
     * @var
     */
    protected $model = Library::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            "user_id" => $this->faker->numberBetween(1,3),
            "language_id" => $this->faker->numberBetween(1,3),
            "name" => $this->faker->text(10),
            "view_permit" => $this->faker->boolean
        ];
    }
}
