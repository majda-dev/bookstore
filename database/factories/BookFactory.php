<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Publisher;
use App\Models\Writer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $imageFilename = 'books/' . $this->faker->image('public/books', 400, 300, null, false);
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'photo' => $imageFilename,
            'price' => $this->faker->randomFloat(2, 10, 100),
            'publication_date' => $this->faker->date,
            'quantity' => $this->faker->numberBetween(1, 100),
            'id_writer' => Writer::factory(),  // Assuming you have a Writer factory
            'id_category' => Category::factory(),  // Assuming you have a Category factory
            'id_publisher' => Publisher::factory(),  // Use Publisher factory to generate a random publisher id
        ];


    }
}
