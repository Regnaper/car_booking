<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Driver;
use App\Models\CarModel;

use App\Models\User;
use Illuminate\Database\Seeder;

class CarsSeeder extends Seeder
{

    protected $path = "/Data/Cars.json";

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
                $carModel = CarModel::where("name", $item->carModelName)->first();
                $driverUser = User::where("name", $item->driverName)->first();
                $driver = Driver::where("user_id", $driverUser->id)->first();

                $model = Car::updateOrCreate(
                    [
                        'plate' => $item->plate,
                    ],
                    [
                        'car_model_id' => $carModel->id,
                        'driver_id' => $driver->id,
                    ]
                );
            }
        }

    }
}
