<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<=10;$i++){
            Author::create([
                'name'=>"Lara".$i,
                'email'=>"Lara.jalloul".$i."@gmail.com",
                'github'=>"Lara".$i,
                'twitter'=>"Lara".$i,
                'location'=>"LB".$i,
                'latest_article_published'=>"lumen".$i,
            ]);
        }
    }
}
