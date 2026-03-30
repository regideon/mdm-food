<?php

namespace Database\Seeders;

use App\Models\DrinkProductSize;
use Illuminate\Database\Seeder;

class DrinkProductSizeSeeder extends Seeder
{
    public function run(): void
    {
        $sizes = [
            'DRINK REGULAR',
            'DRINK MEDUIM',
            'DRINK LARGE',
            'DRINK FLOAT',
            'FIXIN REGULAR',
            'FIXIN LARGE',
        ];

        foreach ($sizes as $size) {
            DrinkProductSize::firstOrCreate(['name' => $size]);
        }
    }
}
