<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'Mike Tyson',
            'position' => 'manager',
            'testimony' => 'Depending on how well your JavaScript code is optimized by webpack and depending on the structure of your application',
            'photo_path' => 'images/82d281cd44e7fffa06e395826b5615ed.jpg',
            'url_image' => 'http://porfolio.test/storage/images/prev_82d281cd44e7fffa06e395826b5615ed.jpg',
            'rating' => '9'
            
        ];
    }
}
