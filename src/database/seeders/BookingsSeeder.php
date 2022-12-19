<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Car;
use App\Models\User;

use Illuminate\Database\Seeder;

class BookingsSeeder extends Seeder
{

    protected $path = "/Data/Bookings.json";

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
                $car = Car::where('plate', $item->carPlate)->first();
                $user = User::where('name', $item->userName)->first();

                $startTime = new \DateTime(env('BOOKING_DATE_START'));
                $endTime = new \DateTime(env('BOOKING_DATE_START'));

                Booking::updateOrCreate(
                    [
                        'car_id' => $car->id,
                        'user_id' => $user->id,
                    ],
                    [
                        'start_booking_at' => $startTime->add(new \DateInterval($item->start_booking_at)),
                        'end_booking_at' => $endTime->add(new \DateInterval($item->end_booking_at))
                    ]
                );
            }
        }

    }
}
