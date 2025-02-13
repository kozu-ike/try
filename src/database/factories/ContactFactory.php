<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    protected $model = Contact::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'gender' => $this->faker->randomElement([1, 2, 3]), // 男性、女性、その他
            'email' => $this->faker->unique()->safeEmail,
            'tel' => $this->faker->numerify('###-###-####'),
            'address' => $this->faker->address,
            'building' => $this->faker->optional()->word,
            'detail' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
