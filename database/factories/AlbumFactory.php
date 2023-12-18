<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Artist;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Album>
 */
class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
     
            'album_title' => fake()->word() ,
            'release_date' => fake()->date() ,
            'artist_id' => fake()->randomElement(Artist::pluck('id')),
        
            
        ];
    }
}
