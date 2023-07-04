<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Image;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Image::insert([
            ["user_id" => 1, "image_path" => "user_images/default1.png", "description" => "una buena imagen", "created_at"=> now(), "updated_at" => now()],
            ["user_id" => 2, "image_path" => "user_images/default2.jpg", "description" => "una mala imagen", "created_at"=> now(), "updated_at" => now()],
            ["user_id" => 3, "image_path" => "user_images/default1.png", "description" => "una muy buena imagen", "created_at"=> now(), "updated_at" => now()],
            ["user_id" => 4, "image_path" => "user_images/default2.jpg", "description" => "una muy mala imagen", "created_at"=> now(), "updated_at" => now()]
        ]);
    }
}
