<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;


class ProductFeatureTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function admin_can_create_a_product()
    {
        $admin = Admin::factory()->create();
        $this->actingAs($admin, 'admin');

        $response = $this->post(route('admin.products.store'), [
            'name'  => 'Test Product',
            'description' => 'A simple product',
            'price' => 199.99,
            'stock' => 10,
           
        ]);

        $response->assertRedirect(route('admin.products.index'));

        $this->assertDatabaseHas('products', [
            'name'  => 'Test Product',
            'price' => 199.99,
            'stock' => 10,
        ]);
    }
}
