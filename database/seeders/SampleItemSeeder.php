<?php

namespace Database\Seeders;

use App\Models\SampleItem;
use Illuminate\Database\Seeder;

class SampleItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SampleItem::factory()->count(150000)->create();
    }
}
