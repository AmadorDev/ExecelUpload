<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class TareaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	"name"=>"amador",
        	"email"=>"amador@gmail.com",
        	"password"=>\Hash::make("amador09")
        ]);
        User::create([
            "name"=>"gerson",
            "email"=>"gerson@gmail.com",
            "password"=>\Hash::make("gerson09")
        ]);
    }
}
