<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param=[
            'comment'=>'test_comment_1',
            'post_id'=>1,
        ];
        // DB::table('comments')->insert([
        //     'comment' => 'test_comment_1',
        //     'post_id' => 1
        // ]);
        // DB::table('comments')->insert([
        //     'comment' => 'test_comment_2',
        //     'post_id' => 2
        // ]);
        // DB::table('comments')->insert([
        //     'comment' => 'test_comment_3',
        //     'post_id' => 3
        // ]);
        // DB::table('comments')->insert([
        //     'comment' => 'test_comment_4',
        //     'post_id' => 4
        // ]);
        // DB::table('comments')->insert([
        //     'comment' => 'test_comment_5',
        //     'post_id' => 5
        // ]);
    }
}
