<?php

namespace Database\Seeders;

use App\Models\Accommodation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AccommodationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Accommodation::create([
            'name' => 'Holidaypark Molenheide',
            'description' => 'Holidaypark Molenheide is a luxurious accommodation that offers a variety of bungalows for groups of 4, 6, 8, or 10 people. Each bungalow is fully equipped with a kitchen and all necessary accessories to make your stay comfortable and convenient. For those who prefer to have breakfast, there is an optional breakfast buffet available every morning for an additional fee of 20 € per person. However, breakfast is not mandatory, and guests are free to use the kitchen facilities in their bungalow to prepare their own meals. With its excellent amenities and prime location, Holidaypark Molenheide is the perfect choice for anyone looking for a relaxing and comfortable holiday experience.',
            'website_link' => 'https://www.molenheide.be/en',
        ]);

        Accommodation::create([
            'name' => 'Hotel Holiday Inn Express',
            'description' => 'Enjoy a comfortable stay for one or two persons at the Hotel Holiday Inn Express. Choose from different room options, each with its own price. You can also opt for breakfast in the morning to start your day off right.',
            'website_link' => 'https://www.ihg.com/holidayinnexpress/hotels/us/en/brussels/brubr/hoteldetail',
        ]);

        Accommodation::create([
            'name' => 'Radisson Blue',
            'description' => 'Experience luxury accommodation for one or two persons at the Radisson Blue hotel. Each room has its own price and breakfast option. Enjoy your stay in style with excellent amenities and service.',
            'website_link' => 'https://www.radissonhotels.com/en-us/hotels/radisson-blu-brussels',
        ]);

        Accommodation::create([
            'name' => 'B&B Hotel',
            'description' => 'If you are looking for affordable and comfortable accommodation for one or two persons, the B&B Hotel is the perfect choice. Each room has a different price depending on the number of occupants and breakfast is also available as an option.',
            'website_link' => 'https://www.hotel-bb.com/nl/be',
        ]);
    }
}
