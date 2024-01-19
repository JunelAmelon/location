<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Voitures;

class VoitureSeeder extends Seeder
{
    public function run()
    {
        Voitures::insert([
            [
                'id' => 22,
                'marque' => 'Mercedes',
                'modele' => 'Mini Van',
                'couleur' => 'Noire',
                'image' => 'car_images/O2ZI2jBkS08WZkTYWBg68oGTs8gWMRp5T8b3mAJ5.png',
                'prix_jour' => 125000.00,
                'created_at' => '2023-03-22 21:49:45',
                'updated_at' => '2023-03-22 21:49:45',
            ],
            [
                'id' => 23,
                'marque' => 'Lamborghini',
                'modele' => 'Aventador',
                'couleur' => 'Grise',
                'image' => 'car_images/V17djs4FusrltVUpNc9xYBMoc467OHvThv2m6oCl.png',
                'prix_jour' => 400000.00,
                'created_at' => '2023-03-22 22:12:16',
                'updated_at' => '2023-03-22 22:12:16',
            ],
            [
                'id' => 24,
                'marque' => 'TOYOTA',
                'modele' => 'CFAO',
                'couleur' => 'Grise',
                'image' => 'car_images/PyIDOt5on6GuVnpk3HUQkTQUzPQIOgWWmikRY8Xu.png',
                'prix_jour' => 200000.00,
                'created_at' => '2023-03-22 22:14:14',
                'updated_at' => '2023-03-24 11:20:11',
            ],
            [
                'id' => 25,
                'marque' => 'TOYOTA',
                'modele' => 'RAV4',
                'couleur' => 'Grise',
                'image' => 'car_images/shGNRl7WYfNLtfnmUfL5509fNWaif5IZc1Uy0lx1.png',
                'prix_jour' => 100000.00,
                'created_at' => '2023-03-22 22:14:37',
                'updated_at' => '2023-03-22 22:14:37',
            ],
            [
                'id' => 26,
                'marque' => 'Volkswagen',
                'modele' => 'Volkswagen',
                'couleur' => 'Bleu',
                'image' => 'car_images/3QiSZbxIGsV05SiYaloomjXpLMJfz4MmlMtD7pR9.png',
                'prix_jour' => 125000.00,
                'created_at' => '2023-03-22 22:15:16',
                'updated_at' => '2023-03-22 22:15:16',
            ],
        ]);
    }
}
