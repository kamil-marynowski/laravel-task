<?php

namespace Tests\Feature;

use App\Models\Price;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PriceControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_prices_index()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $product = Product::factory()->create();

        $response = $this->get(route('products.prices.index', ['product' => $product]));

        $response->assertStatus(200);
        $response->assertViewIs('prices.index');
    }

    public function test_prices_create()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $product = Product::factory()->create();

        $response = $this->get(route('products.prices.create', ['product' => $product]));

        $response->assertStatus(200);
        $response->assertViewHas('product', $product);
    }

    public function test_prices_store()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $product = Product::factory()->create();
        $priceData = Price::factory()->make()->toArray();

        $response = $this->post(route('products.prices.store', ['product' => $product]), $priceData);

        $response->assertRedirect(route('products.prices.index', ['product' => $product]));
        $response->assertSessionHas('success', 'OK');

        $this->assertDatabaseHas('prices', $priceData);
    }

    public function test_prices_edit()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $product = Product::factory()->create();
        $price = Price::factory()->create();

        $response = $this->get(route('products.prices.edit', ['product' => $product, 'price' => $price]));

        $response->assertStatus(200);
        $response->assertViewHas('product', $product);
        $response->assertViewHas('price', $price);
    }
}


