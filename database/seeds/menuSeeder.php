<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Menu;

class menuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::firstOrCreate([
            'name' => 'main',
        ]);
    }

}
