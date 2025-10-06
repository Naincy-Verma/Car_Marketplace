<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                'name' => 'Toyota',
                'slug' => 'toyota',
                'image' => null, // You can add image paths here later
            ],
            [
                'name' => 'Honda',
                'slug' => 'honda',
                'image' => null,
            ],
            [
                'name' => 'BMW',
                'slug' => 'bmw',
                'image' => null,
            ],
            [
                'name' => 'Mercedes-Benz',
                'slug' => 'mercedes-benz',
                'image' => null,
            ],
            [
                'name' => 'Audi',
                'slug' => 'audi',
                'image' => null,
            ],
            [
                'name' => 'Hyundai',
                'slug' => 'hyundai',
                'image' => null,
            ],
            [
                'name' => 'Maruti Suzuki',
                'slug' => 'maruti-suzuki',
                'image' => null,
            ],
            [
                'name' => 'Tata',
                'slug' => 'tata',
                'image' => null,
            ],
            [
                'name' => 'Mahindra',
                'slug' => 'mahindra',
                'image' => null,
            ],
            [
                'name' => 'Ford',
                'slug' => 'ford',
                'image' => null,
            ],
            [
                'name' => 'Volkswagen',
                'slug' => 'volkswagen',
                'image' => null,
            ],
            [
                'name' => 'Nissan',
                'slug' => 'nissan',
                'image' => null,
            ]
        ];

        foreach ($brands as $brand) {
            Brand::updateOrCreate(
                ['slug' => $brand['slug']], // Find by slug
                $brand // Update or create with this data
            );
        }
    }
}