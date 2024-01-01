<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Writer>
 */
class WriterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $imageFilename = 'writers/' . $this->faker->image('public/writer', 400, 300, null, false);

        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'bio' => $this->faker->paragraph,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'photo' => $imageFilename,
        ];
    }
}
