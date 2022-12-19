<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingController extends Controller
{
    public static function index(Request $request)
    {
        $user = User::where('name', "Васильев Василий Васильевич")->first();
        $startDate = new \DateTime(env('BOOKING_DATE_START'));
        $endDate = new \DateTime(env('BOOKING_DATE_START'));

        $modelName = $request->get('model');
        $comfortCategory = $request->get('category');
        $startHours = (int)$request->get('start');
        $endHours = (int)$request->get('end');

        if ($startHours && $endHours) {
            $startDate->add(new \DateInterval("PT{$startHours}H"));
            $endDate->add(new \DateInterval("PT{$endHours}H"));

            $collection = Car::with(['model', 'model.comfortCategory'])
                ->whereHas('bookers', fn(Builder $query) =>
                    $query->where('start_booking_at', '>=', $endDate)
                        ->orWhere('end_booking_at', '<=', $startDate)
                )
                ->whereHas('model', fn(Builder $query) =>
                    $query->whereHas('comfortCategory', fn(Builder $query) =>
                        $query->whereHas('posts', fn(Builder $query) =>
                            $query->whereHas('users', fn(Builder $query) =>
                                $query->where('id', $user->id)
                            )
                        )
                    )
                )
                ->when(!empty($modelName), fn(Builder $query) =>
                    $query->whereHas('model', fn(Builder $query) =>
                        $query->where('name', $modelName)
                            ->when(!empty($comfortCategory), fn(Builder $query) =>
                                $query->whereHas('comfortCategory', fn(Builder $query) =>
                                    $query->where('name', $comfortCategory)
                                )
                            )
                    )
                )
                ->get();

            return JsonResource::collection($collection);
        } else {
            return new JsonResource(['error' => 'empty start/end interval']);
        }
    }

}
