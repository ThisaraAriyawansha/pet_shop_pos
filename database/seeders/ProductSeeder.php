<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Item_categorie;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Seed pet shop categories and products (items).
     * Safe to run multiple times: categories match by name, products by item_code.
     */
    public function run(): void
    {
        $categories = [
            'Dog Food'         => 'Dry and wet food for puppies and adult dogs',
            'Cat Food'         => 'Dry and wet food for kittens and adult cats',
            'Bird Food'        => 'Seeds and pellets for parrots, budgies and finches',
            'Fish Food'        => 'Flakes and pellets for aquarium and pond fish',
            'Treats & Chews'   => 'Snacks, biscuits and dental chews',
            'Toys'             => 'Chew toys, balls and interactive toys',
            'Grooming'         => 'Shampoos, brushes and nail clippers',
            'Health Care'      => 'Tick, flea and deworming products, supplements',
            'Accessories'      => 'Collars, leashes, harnesses, bowls and beds',
            'Litter & Hygiene' => 'Cat litter, litter trays and pee pads',
            'Aquarium'         => 'Tanks, filters, decorations and water care',
        ];

        $categoryIds = [];
        foreach ($categories as $name => $description) {
            $categoryIds[$name] = Item_categorie::firstOrCreate(
                ['categories' => $name],
                ['description' => $description]
            )->id;
        }

        $supplierId = Supplier::firstOrCreate(
            ['supplier_name' => 'Pet Supplies Lanka'],
            [
                'contact_number' => '0112345678',
                'email'          => 'sales@petsupplieslanka.lk',
                'address'        => 'No. 25, Main Street',
                'user_id'        => 1,
                'status_id'      => 1,
                'city_id'        => 1,
                'city_name'      => 'Colombo',
            ]
        )->id;

        // [item_code, item_name, category, quantity, minimum_qty, purchase, retail, wholesale]
        $products = [
            // Dog Food
            ['10001', 'Pedigree Adult Chicken & Vegetables 3kg', 'Dog Food', 25, 5, 4200.00, 5200.00, 4800.00],
            ['10002', 'Pedigree Puppy Milk & Chicken 1.2kg', 'Dog Food', 30, 5, 1850.00, 2350.00, 2150.00],
            ['10003', 'Royal Canin Maxi Adult 4kg', 'Dog Food', 12, 3, 9800.00, 11900.00, 11000.00],
            ['10004', 'Drools Focus Puppy 3kg', 'Dog Food', 18, 4, 4500.00, 5600.00, 5100.00],
            ['10005', 'Pedigree Wet Food Chicken Chunks Pouch 80g', 'Dog Food', 100, 20, 210.00, 290.00, 260.00],

            // Cat Food
            ['10101', 'Whiskas Adult Ocean Fish 1.2kg', 'Cat Food', 30, 5, 2300.00, 2900.00, 2650.00],
            ['10102', 'Whiskas Kitten Mackerel 1.1kg', 'Cat Food', 20, 5, 2250.00, 2850.00, 2600.00],
            ['10103', 'Me-O Adult Tuna 1.2kg', 'Cat Food', 25, 5, 1900.00, 2450.00, 2200.00],
            ['10104', 'Royal Canin Indoor 27 2kg', 'Cat Food', 10, 2, 7200.00, 8700.00, 8000.00],
            ['10105', 'Whiskas Wet Tuna Pouch 85g', 'Cat Food', 120, 24, 190.00, 260.00, 235.00],

            // Bird Food
            ['10201', 'Budgie Seed Mix 1kg', 'Bird Food', 40, 10, 650.00, 900.00, 800.00],
            ['10202', 'Parrot Food Sunflower Mix 1kg', 'Bird Food', 30, 8, 950.00, 1300.00, 1150.00],
            ['10203', 'Finch Seed Mix 500g', 'Bird Food', 25, 5, 380.00, 550.00, 480.00],

            // Fish Food
            ['10301', 'Tetra Min Tropical Flakes 100ml', 'Fish Food', 40, 10, 850.00, 1150.00, 1000.00],
            ['10302', 'Optimum Goldfish Pellets 100g', 'Fish Food', 50, 10, 420.00, 600.00, 520.00],
            ['10303', 'Hikari Cichlid Gold Mini 57g', 'Fish Food', 20, 5, 1300.00, 1750.00, 1550.00],

            // Treats & Chews
            ['10401', 'Pedigree Dentastix Medium 7pcs', 'Treats & Chews', 40, 10, 780.00, 1050.00, 950.00],
            ['10402', 'Rawhide Bone 6 inch', 'Treats & Chews', 50, 10, 250.00, 400.00, 340.00],
            ['10403', 'Chicken Jerky Dog Treats 100g', 'Treats & Chews', 35, 8, 600.00, 850.00, 750.00],
            ['10404', 'Temptations Cat Treats Chicken 85g', 'Treats & Chews', 30, 6, 820.00, 1100.00, 990.00],
            ['10405', 'Catnip Sticks 3pcs', 'Treats & Chews', 25, 5, 350.00, 500.00, 440.00],

            // Toys
            ['10501', 'Rubber Chew Ball Small', 'Toys', 40, 10, 280.00, 450.00, 380.00],
            ['10502', 'Rope Tug Toy', 'Toys', 30, 6, 420.00, 650.00, 560.00],
            ['10503', 'Squeaky Plush Bone', 'Toys', 25, 5, 480.00, 750.00, 650.00],
            ['10504', 'Cat Feather Teaser Wand', 'Toys', 30, 6, 300.00, 480.00, 410.00],
            ['10505', 'Cat Mouse Toy 3pcs', 'Toys', 35, 8, 220.00, 380.00, 320.00],

            // Grooming
            ['10601', 'Anti-Tick Dog Shampoo 200ml', 'Grooming', 30, 6, 750.00, 1050.00, 920.00],
            ['10602', 'Puppy Tearless Shampoo 200ml', 'Grooming', 20, 5, 700.00, 980.00, 860.00],
            ['10603', 'Slicker Brush Medium', 'Grooming', 15, 3, 650.00, 950.00, 830.00],
            ['10604', 'Pet Nail Clipper', 'Grooming', 15, 3, 550.00, 850.00, 720.00],
            ['10605', 'Pet Grooming Wipes 80pcs', 'Grooming', 25, 5, 480.00, 700.00, 610.00],

            // Health Care
            ['10701', 'Frontline Plus Dog 10-20kg (1 pipette)', 'Health Care', 20, 5, 1650.00, 2100.00, 1900.00],
            ['10702', 'Drontal Plus Dog Dewormer Tablet', 'Health Care', 50, 10, 380.00, 520.00, 460.00],
            ['10703', 'Anti-Flea & Tick Collar Dog', 'Health Care', 20, 5, 900.00, 1300.00, 1150.00],
            ['10704', 'Pet Multivitamin Syrup 200ml', 'Health Care', 15, 3, 950.00, 1350.00, 1200.00],
            ['10705', 'Cat Hairball Remedy Paste 50g', 'Health Care', 12, 3, 1100.00, 1500.00, 1350.00],

            // Accessories
            ['10801', 'Nylon Dog Collar Medium', 'Accessories', 30, 6, 350.00, 550.00, 470.00],
            ['10802', 'Dog Leash 1.2m', 'Accessories', 25, 5, 550.00, 850.00, 720.00],
            ['10803', 'Adjustable Dog Harness Medium', 'Accessories', 15, 3, 1200.00, 1750.00, 1550.00],
            ['10804', 'Stainless Steel Pet Bowl Medium', 'Accessories', 30, 6, 420.00, 650.00, 560.00],
            ['10805', 'Cat Collar with Bell', 'Accessories', 30, 6, 180.00, 320.00, 270.00],
            ['10806', 'Pet Bed Medium', 'Accessories', 8, 2, 3200.00, 4500.00, 4000.00],
            ['10807', 'Pet Carrier Small', 'Accessories', 6, 2, 3800.00, 5200.00, 4700.00],
            ['10808', 'Bird Cage Medium', 'Accessories', 5, 1, 4500.00, 6200.00, 5600.00],

            // Litter & Hygiene
            ['10901', 'Clumping Cat Litter Lavender 5L', 'Litter & Hygiene', 25, 5, 1300.00, 1750.00, 1550.00],
            ['10902', 'Cat Litter Tray with Rim', 'Litter & Hygiene', 10, 2, 1100.00, 1600.00, 1400.00],
            ['10903', 'Puppy Training Pads 30pcs', 'Litter & Hygiene', 20, 4, 1500.00, 2100.00, 1850.00],
            ['10904', 'Dog Poop Bags 4 Rolls', 'Litter & Hygiene', 40, 8, 280.00, 450.00, 380.00],

            // Aquarium
            ['11001', 'Glass Aquarium Tank 2ft', 'Aquarium', 4, 1, 6500.00, 8900.00, 8000.00],
            ['11002', 'Aquarium Internal Filter 600L/h', 'Aquarium', 10, 2, 1800.00, 2600.00, 2300.00],
            ['11003', 'Air Pump Single Outlet', 'Aquarium', 15, 3, 900.00, 1350.00, 1180.00],
            ['11004', 'Water Conditioner 120ml', 'Aquarium', 20, 5, 550.00, 800.00, 700.00],
            ['11005', 'Aquarium Gravel Natural 2kg', 'Aquarium', 15, 3, 450.00, 700.00, 600.00],
        ];

        foreach ($products as [$code, $name, $category, $qty, $minQty, $purchase, $retail, $wholesale]) {
            Item::updateOrCreate(
                ['item_code' => $code],
                [
                    'item_name'        => $name,
                    'suppliers_id'     => $supplierId,
                    'item_category_id' => $categoryIds[$category],
                    'quantity'         => $qty,
                    'start_qty'        => $qty,
                    'minimum_qty'      => $minQty,
                    'purchase_price'   => $purchase,
                    'retail_price'     => $retail,
                    'wholesale_price'  => $wholesale,
                    'image_path'       => 'default.png',
                    'status_id'        => 1,
                ]
            );
        }
    }
}
