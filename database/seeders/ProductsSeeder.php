<?php

namespace Database\Seeders;
 
use Faker\Factory as Faker;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $faker = Faker::create(); 
 
    for ($i = 0; $i < 26; $i++) { 
        Product::create([ 
            'titre' => $faker->sentence(), 
            'contenu' => $faker->text(600), 
            'image' => $faker->imageUrl(),
            'categorie'=>$faker-> randomElement(['sac de sport','fitness','running']),
            'solde'=>$faker-> boolean(),
            'prix'=>$faker->randomFloat(2, 80, 900), 
        ]); 
    }
    }
}
