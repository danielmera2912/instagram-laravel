<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::insert([
            ["user_id" => 1, "image_id" => 1, "content"=> "buen contenido", "created_at"=> now(), "updated_at" => now()],
            ["user_id" => 2, "image_id" => 2, "content"=> "mal contenido", "created_at"=> now(), "updated_at" => now()],
        ]);
    }
}
