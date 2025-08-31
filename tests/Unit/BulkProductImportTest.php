<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Imports\ProductsImport;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Validators\ValidationException;
use PHPUnit\Framework\Attributes\Test;

class BulkProductImportTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_imports_a_valid_row_from_csv()
    {
        Storage::fake('local');

        // valid CSV (headers must match your WithHeadingRow rules)
        $csv = "name,category,price,stock,image\nValid Product,Electronics,999.99,5,images/p1.jpg\n";
        Storage::disk('local')->put('imports/valid.csv', $csv);

        // import synchronously from the fake disk
        (new ProductsImport)->import('imports/valid.csv', 'local');

        $this->assertDatabaseHas('products', [
            'name'  => 'Valid Product',
            'category' => 'Electronics',
            'price' => 999.99,
            'stock' => 5,
        ]);
    }

    #[Test]
    public function it_throws_validation_exception_for_invalid_row()
    {
        Storage::fake('local');

        // invalid: missing name, non-numeric price, negative stock
        $csv = "name,category,price,stock,image\n,Electronics,abc,-2,\n";
        Storage::disk('local')->put('imports/invalid.csv', $csv);

        $this->expectException(ValidationException::class);

        (new ProductsImport)->import('imports/invalid.csv', 'local');
    }
}
