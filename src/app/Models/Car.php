<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'plate'
    ];

    public function model()
    {
        return $this->belongsTo(CarModel::class, 'car_model_id');
    }

    public function driver()
    {
        return $this->hasOne(Driver::class);
    }

    public function bookers()
    {
        return $this->hasMany(Booking::class);
    }
}
