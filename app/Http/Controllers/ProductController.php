<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @param ProductService $productService
     */
    public function __construct(private readonly ProductService $productService) {}

    /**
     * @return mixed
     */
    public function index(Request $request): mixed
    {
        if ($request->has('search')) {
            $search = $request->get('search');
            $products = Product::sortable()
                ->where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('description', 'LIKE', '%' . $search . '%')
                ->paginate(10);
        } else {
            $products = Product::sortable()->paginate(10);
        }

        return view('products.index', [
            'products' => $products,
            'search' => $search ?? '',
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view(view: 'products.create');
    }

    /**
     * @param ProductRequest $request
     * @return RedirectResponse
     */
    public function store(ProductRequest $request): RedirectResponse
    {
        $this->productService->create($request);

        return redirect()->route(route: 'products.index')->with('success', 'OK');
    }

    public function edit(Product $product)
    {
        return view(view: 'products.edit', data: ['product' => $product]);
    }

    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $this->productService->update($request, $product);

        return redirect()->route(route: 'products.index')->with('success', 'OK');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'OK');
    }
}
