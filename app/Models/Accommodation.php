<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'description', 
        'max_capacity', 
        'current_capacity', 
        'breakfast_option',
        'arrival_date',
        'departure_date',
        'number_of_people',
        'price'
    ];
}
