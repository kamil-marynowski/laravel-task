<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use App\Services\ProductService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_products_index()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/products');

        $response->assertStatus(200);
        $response->assertViewIs('products.index');
    }

    public function test_products_create()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/products/create');

        $response->assertStatus(200);
        $response->assertViewIs('products.create');
    }

    public function test_products_edit()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $product = Product::factory()->create();

        $response = $this->get(route('products.edit', $product));

        $response->assertStatus(200);
        $response->assertViewIs('products.edit');
        $response->assertViewHas('product', $product);
        // Add more assertions as per your requirements
    }

    public function test_products_update()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $product = Product::factory()->create();

        $productServiceMock = $this->mock(ProductService::class);
        $productServiceMock->shouldReceive('update')->once();

        $response = $this->put(route('products.update', $product), [
            'name' => fake()->name(),
            'description' => fake()->text(1000),
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('products.index'));
        $response->assertSessionHas('success', 'OK');
        // Add more assertions as per your requirements
    }

    public function test_products_destroy()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $product = Product::factory()->create();

        $response = $this->delete(route('products.destroy', $product));

        $response->assertStatus(302);
        $response->assertRedirect(route('products.index'));
        $response->assertSessionHas('success', 'OK');
        // Add more assertions as per your requirements
    }
}


