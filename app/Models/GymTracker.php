<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GymTracker extends Model
{
    protected $table = 'gym_trackers';
    protected $fillable = ['user_id', 'calories', 'protein', 'weight']; 
    public $timestamps = true; 
}
