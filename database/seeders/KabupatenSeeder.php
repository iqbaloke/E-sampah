<?php

namespace Database\Seeders;

use App\Models\Kabupaten;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KabupatenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'id' => '1601',
                'id_provinsi' => "16",
                'kabupaten' => "Kabupaten Ogan Komering Ulu"
            ],
            [
                'id' => '1602',
                'id_provinsi' => "16",
                'kabupaten' => "Kabupaten Ogan Komering Ilir"
            ],
            [
                'id' => '1603',
                'id_provinsi' => "16",
                'kabupaten' => "Kabupaten Muara Enim"
            ],
            [
                'id' => '1604',
                'id_provinsi' => "16",
                'kabupaten' => "Kabupaten Lahat"
            ],
            [
                'id' => '1605',
                'id_provinsi' => "16",
                'kabupaten' => "Kabupaten Musi Rawas"
            ],
            [
                'id' => '1606',
                'id_provinsi' => "16",
                'kabupaten' => "Kabupaten Musi Banyuasin"
            ],
            [
                'id' => '1607',
                'id_provinsi' => "16",
                'kabupaten' => "Kabupaten Banyu Asin"
            ],
            [
                'id' => '1608',
                'id_provinsi' => "16",
                'kabupaten' => "Kabupaten Ogan Komering Ulu Selatan"
            ],
            [
                'id' => '1609',
                'id_provinsi' => "16",
                'kabupaten' => "Kabupaten Ogan Komering Ulu Timur"
            ],
            [
                'id' => '1610',
                'id_provinsi' => "16",
                'kabupaten' => "Kabupaten Ogan Ilir"
            ],
            [
                'id' => '1611',
                'id_provinsi' => "16",
                'kabupaten' => "Kabupaten Empat Lawang"
            ],
            [
                'id' => '1612',
                'id_provinsi' => "16",
                'kabupaten' => "Kabupaten Penukal Abab Lematang Ilir"
            ],
            [
                'id' => '1613',
                'id_provinsi' => "16",
                'kabupaten' => "Kabupaten Musi Rawas Utara"
            ],
            [
                'id' => '1671',
                'id_provinsi' => "16",
                'kabupaten' => "Kota Palembang"
            ],
            [
                'id' => '1672',
                'id_provinsi' => "16",
                'kabupaten' => "Kota Prabumulih"
            ],
            [
                'id' => '1673',
                'id_provinsi' => "16",
                'kabupaten' => "Kota Pagar Alam"
            ],
            [
                'id' => '1674',
                'id_provinsi' => "16",
                'kabupaten' => "Kota Lubuklinggau"
            ],
        ])->each(fn ($kabupaten) => Kabupaten::create($kabupaten));
    }
}
