<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();

        Product::create([
            'name' => 'Arctis Pro Wireless Black',
            'description' => 'Dual Wireless 2.4G lossless plus Bluetooth, Hi-Res capable speaker drivers and swappable dual-battery system.',
            'price' => '349.99',
            'file_name' => 'arctis_pro_black.png',
        ]);

        Product::create([
            'name' => 'Arctis 1 Wireless Cyberpunk Edition',
            'description' => 'Lag-free wireless audio, Lightweight steel-reinforced headband for PC, Playstation, Nintendo Switch and Android.',
            'price' => '129.99',
            'file_name' => 'arctis_1_cyberpunk_edition.png',
        ]);

        Product::create([
            'name' => 'Arctis 3 Bluetooth',
            'description' => 'Simultaneous wired plus Bluetooth, Perfect for Nintendo Switch and ClearCast noise-canceling microphone.',
            'price' => '129.99',
            'file_name' => 'arctis_3_bluetooth.png',
        ]);

        Product::create([
            'name' => 'Arctis Pro + Gamedac White',
            'description' => 'High Fidelity digital to analog converter, Audiophile grade sound and premium Hi-Res speakers.',
            'price' => '279.99',
            'file_name' => 'arctis_pro_gamedac_white.png',
        ]);

        Product::create([
            'name' => 'Arctis 1',
            'description' => 'Detachable ClearCast Microphone, Lightweight Steel-Inforced Headband for PC, Playstation, XBOX, Nintendo Switch and Mobile.',
            'price' => '59.99',
            'file_name' => 'arctis_1.png',
        ]);
    }
}
