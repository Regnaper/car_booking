<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\ComfortCategory;

use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{

    protected $path = "/Data/Posts.json";

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (file_exists(__DIR__ . $this->path)) {
            $data = json_decode(file_get_contents(__DIR__ . $this->path));

            foreach ($data as $item) {
                $model = Post::updateOrCreate([
                    'name' => $item->name,
                ]);

                foreach ($item->comfortCategories as $comfortCategoryName) {
                    $comfortCategory = ComfortCategory::where("name", $comfortCategoryName)->first();
                    $model->comfortCategories()->attach($comfortCategory->id);
                }
            }
        }

    }
}
