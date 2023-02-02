<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;
        //
    public function episodes(){
        return $this->hasMany('App\Models\Episode', 'season_id');
    }

    public function series(){
        return $this->belongsTo('App\Models\Series', 'series_id' , 'series_id');
    }
}
