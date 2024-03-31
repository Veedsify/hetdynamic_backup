<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->country,
            'iso2' => $this->faker->countryISOAlpha3(2),
            'iso3' => $this->faker->countryISOAlpha3,
            'phonecode' => $this->faker->countryCode,
            'capital' => $this->faker->city,
            'currency' => $this->faker->currencyCode,
            'native' => $this->faker->country,
            'flag' => $this->faker->imageUrl(640, 480, 'country', true),
            'slogan' => $this->faker->word(3, true)
        ];
    }
}
