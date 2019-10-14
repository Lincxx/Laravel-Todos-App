<?php

use Illuminate\Database\Seeder;
use App\Model;

class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Todo::class, 5)->create();
    }
}
