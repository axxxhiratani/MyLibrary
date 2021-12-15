<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Favorite;
class FavoriteFactory extends Factory
{
    /**
     * @var
     */
    protected $model = Favorite::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            "library_id" => $this->faker->numberBetween(1,3),
            "user_id" => $this->faker->numberBetween(1,3),
        ];
    }
}
