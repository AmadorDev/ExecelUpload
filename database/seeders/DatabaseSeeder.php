<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Principal;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(TareaSeeder::class);
      /*  $dni = '23' . random_int(100, 999);
        for ($i=0; $i < 5000; $i++) { 
            
            Principal::Insert([
                "ruc"=>"345454535",
                "planner"=>"dfkjsdlfsdf",
                "dni"=>$dni.$i 
            ]);

        }*/
    }
}
