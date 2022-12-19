<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name'
    ];

    public function comfortCategory()
    {
        return $this->belongsTo(ComfortCategory::class, 'comfort_category_id');
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
