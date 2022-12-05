<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=> 'Mike Jakobs',
            'email' => 'mike@gmail.com',
            'subject' => 'E-commerce website',
            'desc' => 'If you would like to get the original name and extension of the uploaded file, you may do so using the getClientOriginalName and getClientOriginalExtension methods:',
            'status' => '0'
        ];
    }
}
