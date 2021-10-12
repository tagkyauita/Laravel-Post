<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 100; $i++) {

            $title = str_random(50);
            $text = str_random(250);
            $data =
            [
                'user_id' => $i,
                'title' => $title,
                'text' => $text,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            DB::table('posts')->insert($data);
        }
    }
}
