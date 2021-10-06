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
        DB::table('posts')->insert([
            'title' => 'title 1',
            'text' => 'text 1'
        ]);
        DB::table('posts')->insert([
            'title' => 'title 2',
            'text' => 'text 2'
        ]);
        DB::table('posts')->insert([
            'title' => 'title 3',
            'text' => 'text 3'
        ]);
        DB::table('posts')->insert([
            'title' => 'title 4',
            'text' => 'text 4'
        ]);
        DB::table('posts')->insert([
            'title' => 'title 5',
            'text' => 'text 5'
        ]);
    }
}
