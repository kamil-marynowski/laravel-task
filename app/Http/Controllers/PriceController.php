<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\Product;
use App\Services\PriceService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PriceController
{
    public function __construct(private readonly PriceService $priceService) {}

    /**
     * @param Product $product
     * @return View
     */
    public function index(Product $product): View
    {
        $prices = Price::sortable()->where('product_id', $product->id)->paginate(10);

        return view(view: 'prices.index', data: ['product' => $product, 'prices' => $prices]);
    }

    /**
     * @param Product $product
     * @return View
     */
    public function create(Product $product): View
    {
        return view(view: 'prices.create', data: ['product' => $product]);
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function store(Request $request, Product $product): RedirectResponse
    {
        $this->priceService->create($request, $product);

        return redirect()->route(route: 'products.prices.index', parameters: ['product' => $product])
            ->with('success', 'OK');
    }

    public function edit(Product $product, Price $price)
    {
        return view(view: 'prices.edit', data: ['product' => $product, 'price' => $price]);
    }

    public function update(Request $request, Product $product, Price $price)
    {
        $this->priceService->update($request, $price);

        return redirect()->route(route: 'products.prices.index', parameters: [
                'product' => $product,
                'price'   => $price,
            ])
            ->with('success', 'OK');
    }

    public function destroy(Product $product, Price $price)
    {
        $price->delete();

        return redirect()->route(route: 'products.prices.index', parameters: ['product' => $product])
            ->with('success', 'OK');
    }
}
