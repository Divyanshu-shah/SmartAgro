<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class PesticideRequest extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'pesticide_requests';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'farm_size',
        'crop_type',
        'pest_problem',
        'symptoms',
        'pesticide_used',
        'images',
    ];
}
