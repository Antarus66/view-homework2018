<?php

use Illuminate\Database\Seeder;
use Faker\Generator;

class LotSeeder extends Seeder
{

    /**
     * LotSeeder constructor.
     * @param Generator $faker
     */
    public function __construct(Generator $faker)
    {
        $this->faker = $faker;;
    }


    private $lotData = [
        [
            'id' => 1,
            'currency_id' => '1',
            'price' => '6631',
        ], [
            'id' => 2,
            'currency_id' => '1',
            'price' => '6633',
        ], [
            'id' => 3,
            'currency_id' => '1',
            'price' => '6636',
        ],

        [
            'id' => 4,
            'currency_id' => '2',
            'price' => '0.002695',
        ], [
            'id' => 5,
            'currency_id' => '2',
            'price' => '0.0027',
        ], [
            'id' => 6,
            'currency_id' => '2',
            'price' => '0.00278',
        ],

        [
            'id' => 7,
            'currency_id' => '3',
            'price' => '85',
        ], [
            'id' => 8,
            'currency_id' => '3',
            'price' => '84',
        ], [
            'id' => 9,
            'currency_id' => '3',
            'price' => '88',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        array_map(function ($lot) {
            $lot['opens_at'] = $this->faker->dateTime($max = 'now', $timezone = null);
            $lot['close_at'] = $this->faker->dateTimeBetween('+1 week', '+3 week');

            \App\Lot::create($lot);
        }, $this->lotData);
    }
}
