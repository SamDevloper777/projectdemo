<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\Importable;

class ProductsImport implements ToModel, WithHeadingRow, WithChunkReading, WithValidation, ShouldQueue
{
    use Importable;

    public function model(array $row)
    {
        return new Product([
            'name'     => $row['name'],
            'category' => $row['category'],
            'price'    => $row['price'],
            'stock'    => $row['stock'],
            'image'    => $row['image'] ?? null,
        ]);
    }

    public function chunkSize(): int
    {
        return 1000; 
    }

    public function rules(): array
    {
        return [
            '*.name'     => 'required|string|max:255',
            '*.category' => 'required|string|max:255',
            '*.price'    => 'required|numeric|min:0',
            '*.stock'    => 'required|integer|min:0',
        ];
    }
}
