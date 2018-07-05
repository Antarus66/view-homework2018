<?php

use App\Extensions\Faker\Dental;
use Illuminate\Database\Seeder;
use Faker\Generator;
use App\Entities\Goal;

class CurrenciesSeeder extends Seeder
{
    private $faker;
    private $timestamps;

    private $currenciesData = [
        [
            'title' => 'Bitcoin'
        ], [
            'title' => 'Dogecoin'
        ], [
            'title' => 'Litecoin'
        ]
    ];

    public function __construct(Generator $faker)
    {
        $this->faker = $faker;;
        $this->timestamps = $this->generateTimestamps();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        array_map(function ($currency) {
            \App\Currency::create($currency);
        }, $this->currenciesData);
    }

    private function generateTimestamps()
    {
        $timePatterns = [
            "P1Y",    // 1 year
            "P6M",    // 6 month
            "P1M",    // 1 month
            "P1W",    // 1 week
            "P1D",    // 1 day
        ];

        $timestamps = array_map(function($pattern){
            $delta = new DateInterval($pattern);
            $seconds = ($delta->s)
                + ($delta->i * 60)
                + ($delta->h * 60 * 60)
                + ($delta->d * 60 * 60 * 24)
                + ($delta->m * 60 * 60 * 24 * 30)
                + ($delta->y * 60 * 60 * 24 * 365);
            return $seconds;
        }, $timePatterns);

        return $timestamps;
    }
}
