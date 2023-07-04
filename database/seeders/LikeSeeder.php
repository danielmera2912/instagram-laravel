<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Like;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Like::insert([
            ["user_id" => 1, "image_id" => 1, "created_at"=> now(), "updated_at" => now()],
            ["user_id" => 1, "image_id" => 2, "created_at"=> now(), "updated_at" => now()],
            ["user_id" => 2, "image_id" => 2, "created_at"=> now(), "updated_at" => now()],
            ["user_id" => 3, "image_id" => 2, "created_at"=> now(), "updated_at" => now()],
            ["user_id" => 4, "image_id" => 2, "created_at"=> now(), "updated_at" => now()],
            ["user_id" => 5, "image_id" => 2, "created_at"=> now(), "updated_at" => now()],
            ["user_id" => 6, "image_id" => 2, "created_at"=> now(), "updated_at" => now()],
            ["user_id" => 7, "image_id" => 2, "created_at"=> now(), "updated_at" => now()],
        ]);
    }
}
