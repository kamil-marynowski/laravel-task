<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Price;
use App\Models\Product;
use Illuminate\Http\Request;

class PriceService
{
    /**
     * @param Request $request
     * @param Product $product
     * @return void
     */
    public function create(Request $request, Product $product): void
    {
        Price::create([
            'vat_percentage' => $request->get(key: 'vat_percentage'),
            'product_id'     => $product->id,
            'gross'          => $request->get(key: 'gross'),
            'net'            => $request->get(key: 'net'),
            'vat'            => $request->get(key: 'vat'),
        ]);
    }

    /**
     * @param Request $request
     * @param Price $price
     * @return void
     */
    public function update(Request $request, Price $price): void
    {
        $price->update([
            'vat_percentage' => $request->get(key: 'vat_percentage'),
            'gross'          => $request->get(key: 'gross'),
            'net'            => $request->get(key: 'net'),
            'vat'            => $request->get(key: 'vat'),
        ]);
    }
}
