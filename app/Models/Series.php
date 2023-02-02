<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;
    public function seasons(){

        return $this->hasMany('App\Models\Season', 'series_id');

    }
    public function episodes(){

        return $this->hasMany('App\Models\Episode', 'series_id');

    }
}
