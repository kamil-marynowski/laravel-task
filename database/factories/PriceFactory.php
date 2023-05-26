<?php

namespace Database\Factories;

use App\Models\Price;
use Illuminate\Database\Eloquent\Factories\Factory;

class PriceFactory extends Factory
{
    protected $model = Price::class;

    public function definition()
    {
        return [
            'product_id' => 3,
            'net' => 1000,
            'gross' => 1230,
            'vat' => 230,
            'vat_percentage' => 23,
        ];
    }
}
