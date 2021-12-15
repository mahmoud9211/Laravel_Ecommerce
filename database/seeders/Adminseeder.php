<?php

namespace Database\Seeders;

use App\Models\admin;
use Illuminate\Database\Seeder;
use Database\factories\AdminfactoryFactory;

class Adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        admin::factory()->create();
    }
}
