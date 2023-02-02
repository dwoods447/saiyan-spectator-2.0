<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    
    public function seasons(){
        return $this->belongsTo('App\Models\Season', 'season_id', 'season_id');
    }

    public function series(){
        return $this->belongsTo('App\Models\Series', 'series_id', 'series_id');
    }

    public function errors(){
    	return $this->hasMany('App\Models\Error' , 'episode_id' , 'id');
	}

}
