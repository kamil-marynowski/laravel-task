<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductService
{
    /**
     * @param ProductRequest $request
     * @return void
     */
    public function create(ProductRequest $request): void
    {
        Product::create([
            'description' => $request->get(key: 'description'),
            'name'        => $request->get(key: 'name'),
        ]);
    }

    /**
     * @param ProductRequest $request
     * @param Product $product
     * @return void
     */
    public function update(ProductRequest $request, Product $product): void
    {
        $product->update([
            'description' => $request->get(key: 'description'),
            'name'        => $request->get(key: 'name'),
        ]);
    }
}
