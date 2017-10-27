<?php

use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('photos')->insert(['user_id' => '1','description' => 'Jaya', 'url' => '67261.jpg']);
        DB::table('photos')->insert(['user_id' => '1','description' => 'Jaya', 'url' => '67262.jpg']);
        DB::table('photos')->insert(['user_id' => '1','description' => 'Jaya', 'url' => '67263.jpg']);
        DB::table('photos')->insert(['user_id' => '1','description' => 'Jaya', 'url' => '67264.jpg']);
        DB::table('photos')->insert(['user_id' => '1','description' => 'Jaya', 'url' => '67265.jpg']);
        DB::table('photos')->insert(['user_id' => '1','description' => 'Jaya', 'url' => '67266.jpg']);
        DB::table('photos')->insert(['user_id' => '1','description' => 'Jaya', 'url' => '67267.jpg']);
        DB::table('photos')->insert(['user_id' => '1','description' => 'Jaya', 'url' => '67268.jpg']);
    }
}
