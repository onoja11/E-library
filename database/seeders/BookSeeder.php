<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Update Books and Add SKU
        foreach (Book::all() as $key => $book) {
            $book->update([
                'sku' =>  Str::random(16)
            ]);
        }
    }
}
