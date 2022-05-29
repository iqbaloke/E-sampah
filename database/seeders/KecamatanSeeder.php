<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
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
                'id' => '1671010',
                'kabupaten_id' => "1671",
                'kecamatan' => "Ilir Barat Ii"
            ],
            [
                'id' => '1671011',
                'kabupaten_id' => "1671",
                'kecamatan' => "Gandus"
            ],
            [
                'id' => '1671020',
                'kabupaten_id' => "1671",
                'kecamatan' => "Seberang Ulu I"
            ],
            [
                'id' => '1671021',
                'kabupaten_id' => "1671",
                'kecamatan' => "Kertapati"
            ],
            [
                'id' => '1671022',
                'kabupaten_id' => "1671",
                'kecamatan' => "Jakabaring"
            ],
            [
                'id' => '1671030',
                'kabupaten_id' => "1671",
                'kecamatan' => "Seberang Ulu Ii"
            ],
            [
                'id' => '1671031',
                'kabupaten_id' => "1671",
                'kecamatan' => "Plaju"
            ],
            [
                'id' => '1671040',
                'kabupaten_id' => "1671",
                'kecamatan' => "Ilir Barat I"
            ],
            [
                'id' => '1671041',
                'kabupaten_id' => "1671",
                'kecamatan' => "Bukit Kecil"
            ],
            [
                'id' => '1671050',
                'kabupaten_id' => "1671",
                'kecamatan' => "Ilir Timur I"
            ],
            [
                'id' => '1671051',
                'kabupaten_id' => "1671",
                'kecamatan' => "Kemuning"
            ],
            [
                'id' => '1671060',
                'kabupaten_id' => "1671",
                'kecamatan' => "Ilir Timur Ii"
            ],
            [
                'id' => '1671061',
                'kabupaten_id' => "1671",
                'kecamatan' => "Kalidoni"
            ],
            [
                'id' => '1671062',
                'kabupaten_id' => "1671",
                'kecamatan' => "Ilir Timur Iii"
            ],
            [
                'id' => '1671070',
                'kabupaten_id' => "1671",
                'kecamatan' => "Sako"
            ],
            [
                'id' => '1671071',
                'kabupaten_id' => "1671",
                'kecamatan' => "Sematang Borang"
            ],
            [
                'id' => '1671080',
                'kabupaten_id' => "1671",
                'kecamatan' => "Sukarami"
            ],
            [
                'id' => '1671081',
                'kabupaten_id' => "1671",
                'kecamatan' => "Alang Alang Lebar"
            ],
        ])->each(fn ($kecamatan) => Kecamatan::create($kecamatan));
    }
}
