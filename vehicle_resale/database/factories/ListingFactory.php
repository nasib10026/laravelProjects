<?php
// namespace Database\Factories;

// use Illuminate\Database\Eloquent\Factories\Factory;

// use App\Models\Listing;
// use Faker\Generator as Faker;

// $factory->define(Listing::class, function (Faker $faker) {
//     return [
//         'brand' => $faker->word,
//         'tags' => $faker->words(3, true),
//         'model' => $faker->randomElement(['Sedan', 'SUV', 'Hatchback', 'Coupe']), // Randomly choose a car model from the provided options
//         'location' => $faker->city,
//         'email' => $faker->email,
//         'socials' => $faker->url,
//         'description' => $faker->paragraph(5),
//         'price' => $faker->randomFloat(2, 1000, 100000),
//         'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
//         'updated_at' => $faker->dateTimeBetween('-1 year', 'now'),
//     ];
// }); 


namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'brand' => $this->faker->sentence(),
            'tags' => 'three-wheeler, two-wheeler, four-wheeler',
            'model' => $this->faker->company(),
            'email' => $this->faker->companyEmail(),
            'socials' => $this->faker->url(),
            'location' => $this->faker->city(),
            'description' => $this->faker->paragraph(5),
            'price' => $this->faker->randomFloat(2, 1000, 100000),
        ];
    }
}


