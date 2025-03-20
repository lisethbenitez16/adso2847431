<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;  
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = fake()->randomElement(['Male', 'Female']); // Generamos el género

        $name = ($gender == 'Female') ? fake()->firstNameFemale() 
                                      : fake()->firstNameMale(); // Generamos el nombre
        $g = ($gender == 'Female') ? 'girl' : 'boy'; // Generamos el género
        $id = fake()->numerify('7########'); // Generamos el documento
        copy('https://avatar.iran.liara.run/public/'.$g, public_path('images/'. $id .'.jpg')); // Copiamos la imagen

        return [
            'document'          => $id,
            'fullname'          => $name. " " . fake()->lastName(),
            'gender'            => $gender,
            'birthdate'         => fake()->dateTimeBetween('1975-01-01', '2004-11-16'),
            'photo'             => $id.'.png',
            'email'             => fake()->unique()->safeEmail(),
            'phone'             => fake()->numerify('300#####'),
            'email_verified_at' => now(),
            'password'          => static::$password ??= Hash::make('12345'),
            'remember_token'    => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}