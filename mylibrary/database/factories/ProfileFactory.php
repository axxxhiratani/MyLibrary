<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Profile;

class ProfileFactory extends Factory
{
    /**
     * @var
     */

    protected $model = Profile::class;
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
            "work_id" => $this->faker->numberBetween(1,3),
            "language_id" => $this->faker->numberBetween(1,3),
            "introduction" => $this->faker->text(50)
        ];
    }
}
