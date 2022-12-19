<?php

namespace Database\Seeders;

use App\Models\CarModel;
use App\Models\ComfortCategory;

use Illuminate\Database\Seeder;

class CarModelsSeeder extends Seeder
{

    protected $path = "/Data/CarModels.json";

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
                $comfortCategory = ComfortCategory::where("name", $item->comfortCategoryName)->first();

                CarModel::updateOrCreate(
                    [
                        'name' => $item->name,
                    ],
                    [
                        'comfort_category_id' => $comfortCategory->id
                    ]
                );
            }
        }

    }
}
