<?php

namespace Database\Seeders;

use App\Models\Seting;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public array $setting = [['win_cashire', 1, Null, Null, Null, Null ], ['unit', 0 , Null, Null, Null, Null], ['menu_cashire_1', 1, Null, Null, Null, Null ], ['menu_cashire_2', 1, Null, Null, Null, Null ], ['menu_cashire_3', 1, Null, Null, Null, Null ], ['menu_cashire_4', 1, Null, Null, Null, Null ], ['menu_store', 1, Null, Null, Null, Null ], ['menu_acco_1', 1, Null, Null, Null, Null ], ['menu_acco_2', 1, Null, Null, Null, Null ], ['def_acco', 1, Null, Null, Null, Null ], ['mult', 0, Null, Null, Null, Null ], ['lock_cashire', 0, 'test', 'test', Null, Null ], ['lock_acco', 0, 'test', '123', Null, Null ],['lock_store', 0, 'test', '123', Null, Null ], ['version', '1.0.5', Null, Null, Null, Null ], ['name', 'Push Market', Null, Null, Null, Null ], ['key', 'wnsN1[>3:|6Wx6NTH0>z', Null, Null, Null, Null ], ['Git Hub', 'https://github.com/sina1010anis', Null, Null, Null, Null ], ['time', 1, Null, Null, Null, Null ], ['devloper', 'Sina Nayebzade', Null, Null, Null, Null ], ['type', 'فروشگاهی مواد غذایی (پیشرفته)',Null, Null, Null, Null ] , ['loding', 1 , Null, Null, Null, Null]];
    public function run(): void
    {
        // User::factory(10)->create();

        foreach  ($this->setting as $item) {

            Seting::create([
                'type' => $item[0],
                'satus' => $item[1],
                'username' => $item[2],
                'password' => $item[3],
                'created_at' => $item[4],
                'updated_at' => $item[5],
            ]);

        }


    }
}
