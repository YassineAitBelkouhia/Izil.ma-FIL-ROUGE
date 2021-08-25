<?php

namespace Database\Factories;

use App\Models\Riad;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

class RiadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Riad::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $cities = [
            'Marrakech',
            'Casablanca',
            'Fes',
            'Essaouira',
            'Rabat',
            'Meknes',
        ];
        $imagePaths = [
            'https://moroccoriadsandbeyond.com/wp-content/uploads/2021/03/RDD-54-1024x683.jpg',
            'https://moroccoriadsandbeyond.com/wp-content/uploads/2021/03/restaurant-pisc-38-1-1024x683.jpg',
            'https://moroccoriadsandbeyond.com/wp-content/uploads/2021/03/ALK1060B-1024x684.jpg',
            'https://moroccoriadsandbeyond.com/wp-content/uploads/2021/03/IMG_3502-HDR-1024x682.jpg',
            'https://moroccoriadsandbeyond.com/wp-content/uploads/2021/03/Kaiss-5-1024x635.jpg',
            'https://moroccoriadsandbeyond.com/wp-content/uploads/2021/03/8-2-1024x682.jpg',
            'https://moroccoriadsandbeyond.com/wp-content/uploads/2021/03/9-1024x683.jpg',
            'https://moroccoriadsandbeyond.com/wp-content/uploads/2021/03/kniza-7-1-1024x683.jpg',

        ];

        $titles = [
            'Riad Demeures D’Orient',
            'La Maison Arabe',
            'Dar Anika',
            'Riad Kaiss',
            'Riad Kniza',
            'Riad El Fenn',
        ];

        $descriptions = [
            'A true creation of a family affair from the ground up inspired by three generations of women where the mother’s chic Italian footprint is imprinted throughout with exquisite artwork and decor with elegant Italian flare brought to you in the riad style and opulence.',
            'A luxurious riad in the heart of the ancient medina of Marrakech hidden in a haven of tranquility that echoes ancient history, heritage and culture. Enjoy the secrets of the Moroccan cuisine under the guidance of a traditional Dada at the cooking school or enjoy amid the secret gardens.',
            'A luxury and intimate boutique style riad located at the entrance of the old souk and close to the Djemma El Fna.  It has 12 rooms each uniquely and elegantly designed allowing for relaxing and comfort in an oasis of peace and tranquility while being surround by the stunning views of the Atlas Mountains.',
            'a traditional Moroccan riad located steps away from the UNESCO world heritage site Diema el Fna in the heart of the magical city.  This riad is a 16th century building which was once the home of the Sultan Moulay Yacoub, ruler of Marrakech.  It now has all of the 5 star luxury’s a traveler might desire once the doors are opened.',
            'the perfect boutique hotel with 31 uniquely styled rooms and suites, none of which are alike with a blend of mid-century European furniture with the iconic elements of Moroccan design.  They have three swimming pools to relax and enjoy the views.',
        ];

        return [
            'title' => Arr::random($titles),
            'description' => Arr::random($descriptions),
            'image_path' => Arr::random($imagePaths),
            'price_night' => $this->faker->randomFloat(4, 1000, 4000),
            'rating' => $this->faker->randomFloat(1, 0, 5),
            'numberOfRooms' => $this->faker->numberBetween(3, 6),
            'numberOfBathrooms' => $this->faker->numberBetween(2, 5),
            'city' => Arr::random($cities),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
