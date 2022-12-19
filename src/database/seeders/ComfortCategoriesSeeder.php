<?php

namespace Database\Seeders;

use App\Models\ComfortCategory;

use Illuminate\Database\Seeder;

class ComfortCategoriesSeeder extends Seeder
{

    protected $path = "/Data/ComfortCategories.json";

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
                ComfortCategory::updateOrCreate([
                    'name' => $item->name,
                ]);
            }
        }

    }
}
