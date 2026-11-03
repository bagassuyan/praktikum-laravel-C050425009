<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Artikel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Artikel>
 */
class ArtikelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
   {
       $judul = fake()->unique()->sentence(4);

       return [
           'user_id' => User::factory(),
           'judul'   => $judul,
           'slug'    => Str::slug($judul),
           'isi'     => fake()->paragraphs(3, true),
           'status'  => fake()->randomElement(['draft', 'terbit']),
       ];
   }
}
