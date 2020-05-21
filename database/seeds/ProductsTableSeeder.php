<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'F&N Sirap Ros',
            'slug' => 'drinks-1',
            'price' => 9.0,
            'image' => '1',
            'description' => '2 Litre'
        ])->categories()->attach(1);

        Product::create([
            'name' => 'F&N Sarsaparilla Cordial',
            'slug' => 'drinks-2',
            'price' => 9.0,
            'image' => '2',
            'description' => '2 Litre'
        ])->categories()->attach(1);

        Product::create([
            'name' => 'Yakin Perisa Ros',
            'slug' => 'drinks-3',
            'price' => 1.7,
            'image' => '3',
            'description' => '350 ml'
        ])->categories()->attach(1);

        Product::create([
            'name' => 'F&N Rut B Cordial Drink',
            'slug' => 'drinks-4',
            'price' => 9,
            'image' => '4',
            'description' => '2 Litre'
        ])->categories()->attach(1);

        Product::create([
            'name' => 'Sunquick Orange',
            'slug' => 'drinks-5',
            'price' => 6.2,
            'image' => '5',
            'description' => '330 ml'
        ])->categories()->attach(1);

        Product::create([
            'name' => 'Sunquick Blackcurrant',
            'slug' => 'drinks-6',
            'price' => 15.8,
            'image' => '6',
            'description' => '840 ml'
        ])->categories()->attach(1);

        Product::create([
            'name' => 'Bleu Mineral Water',
            'slug' => 'drinks-7',
            'price' => 1,
            'image' => '7',
            'description' => '600 ml'
        ])->categories()->attach(1);

        Product::create([
            'name' => 'Nescafe Milk Coffee Drink Original',
            'slug' => 'drinks-8',
            'price' => 2.2,
            'image' => '8',
            'description' => '240 ml'
        ])->categories()->attach(1);

        Product::create([
            'name' => 'Milo Original Can',
            'slug' => 'drinks-9',
            'price' => 2.2,
            'image' => '9',
            'description' => '240 ml'
        ])->categories()->attach(1);

        Product::create([
            'name' => 'Revive Isotonic Lime',
            'slug' => 'drinks-10',
            'price' => 2,
            'image' => '10',
            'description' => '500 ml'
        ])->categories()->attach(1);

        Product::create([
            'name' => 'Gatorade Isotonic Sport Drink Quiet Storm',
            'slug' => 'drinks-11',
            'price' => 2.8,
            'image' => '11',
            'description' => '515 ml'
        ])->categories()->attach(1);

        Product::create([
            'name' => 'Wonda Kopi Tarik',
            'slug' => 'drinks-12',
            'price' => 2.1,
            'image' => '12',
            'description' => '240 ml'
        ])->categories()->attach(1);

        Product::create([
            'name' => 'Nescafe Classic Refill Pack',
            'slug' => 'milkpowder-1',
            'price' => 5.4,
            'image' => '1',
            'description' => '50 gram'
        ])->categories()->attach(2);

        Product::create([
            'name' => 'Nestle Milo Activ-Go',
            'slug' => 'milkpowder-2',
            'price' => 19.9,
            'image' => '2',
            'description' => '1 kg'
        ])->categories()->attach(2);

        Product::create([
            'name' => 'Al Haddad Tamar Cocoa',
            'slug' => 'milkpowder-3',
            'price' => 28,
            'image' => '3',
            'description' => '4 in 1'
        ])->categories()->attach(2);

        Product::create([
            'name' => 'Nestum 3in1 Original',
            'slug' => 'milkpowder-4',
            'price' => 11,
            'image' => '4',
            'description' => '15sx28g'
        ])->categories()->attach(2);

        Product::create([
            'name' => 'Oligo Chocolate Malt Drink',
            'slug' => 'milkpowder-5',
            'price' => 7.3,
            'image' => '5',
            'description' => '240 g'
        ])->categories()->attach(2);

        Product::create([
            'name' => 'Glucolin Original',
            'slug' => 'milkpowder-6',
            'price' => 13.1,
            'image' => '6',
            'description' => '420 g'
        ])->categories()->attach(2);

        Product::create([
            'name' => 'Broccoli',
            'slug' => 'vegetable-1',
            'price' => 2.99,
            'image' => '1',
            'description' => 'RM2.99/kg'
        ])->categories()->attach(3);

        Product::create([
            'name' => 'Cauliflower',
            'slug' => 'vegetable-2',
            'price' => 4.99,
            'image' => '2',
            'description' => 'RM4.99/kg'
        ])->categories()->attach(3);

        Product::create([
            'name' => 'Cabbage',
            'slug' => 'vegetable-3',
            'price' => 1.49,
            'image' => '3',
            'description' => 'RM1.49/kg'
        ])->categories()->attach(3);

        Product::create([
            'name' => 'Carrot',
            'slug' => 'vegetable-4',
            'price' => 1.29,
            'image' => '4',
            'description' => 'RM1.29/each'
        ])->categories()->attach(3);

        Product::create([
            'name' => 'Celery',
            'slug' => 'vegetable-5',
            'price' => 9.99,
            'image' => '5',
            'description' => 'RM9.99/kg'
        ])->categories()->attach(3);

        Product::create([
            'name' => 'Lettuce',
            'slug' => 'vegetable-6',
            'price' => 3.2,
            'image' => '6',
            'description' => 'RM3.20/each'
        ])->categories()->attach(3);

        Product::create([
            'name' => 'First Pride Tempura Chicken Nuggets',
            'slug' => 'frozen-1',
            'price' => 12.29,
            'image' => '1',
            'description' => '800g'
        ])->categories()->attach(4);

        Product::create([
            'name' => 'First Pride BBQ Chicken',
            'slug' => 'frozen-2',
            'price' => 11.99,
            'image' => '2',
            'description' => '600g'
        ])->categories()->attach(4);

        Product::create([
            'name' => 'Ayamas Chicken Frankfurters',
            'slug' => 'frozen-3',
            'price' => 3.45,
            'image' => '3',
            'description' => '340g'
        ])->categories()->attach(4);

        Product::create([
            'name' => 'Simplot French Fries Straight Cut',
            'slug' => 'frozen-4',
            'price' => 12.99,
            'image' => '4',
            'description' => '1kg'
        ])->categories()->attach(4);

        Product::create([
            'name' => 'Ayamas Minced Chicken',
            'slug' => 'frozen-5',
            'price' => 8.7,
            'image' => '5',
            'description' => '400g'
        ])->categories()->attach(4);

        Product::create([
            'name' => 'Figo Japanese Chicken Dumpling 10pcs',
            'slug' => 'frozen-6',
            'price' => 5.69,
            'image' => '6',
            'description' => '200g'
        ])->categories()->attach(4);

        Product::create([
            'name' => 'Kami Seafood Dim Sum 15pcs',
            'slug' => 'frozen-7',
            'price' => 5.99,
            'image' => '7',
            'description' => '300g'
        ])->categories()->attach(4);

        Product::create([
            'name' => 'Figo Pandan Pearl Buns 9pcs',
            'slug' => 'frozen-8',
            'price' => 4.29,
            'image' => '8',
            'description' => '225g'
        ])->categories()->attach(4);

        Product::create([
            'name' => 'KG Pastry Vegetable Bun 6pcs x 60g',
            'slug' => 'frozen-9',
            'price' => 5.69,
            'image' => '9',
            'description' => '360g'
        ])->categories()->attach(4);

        Product::create([
            'name' => 'First Pride Hot & Spicy Fully Cooked Crispy Golden Fried Chicken',
            'slug' => 'frozen-10',
            'price' => 13.79,
            'image' => '10',
            'description' => '750g'
        ])->categories()->attach(4);
    }
}
