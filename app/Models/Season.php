<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Season;

class Season extends Model
{
    use HasFactory;
        //
    public function episodes(){
        return $this->hasMany(Episode::class, 'season_id');
    }

    public function series(){
        return $this->belongsTo(Series::class, 'series_id' , 'series_id');
    }
}
