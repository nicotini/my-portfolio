<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => 'Website for dancing school',
            'desc' => 'Dropzone is a simple JavaScript library that helps you add file drag and drop functionality to your web forms. It is one of the most popular drag and drop library on the web and is used by millions of people.',
            'link' => 'https://github.com/nicotini/my-portfolio',
            'path_image' => 'images/f4d9203180218cc7286ac9ce45148d75.jpg',
            'url_image' => 'http://porfolio.test/storage/images/f4d9203180218cc7286ac9ce45148d75.jpg'

        ];
    }
}
