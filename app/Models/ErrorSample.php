<?php

namespace App\Models;

class Error {
    public function episodes(){
		return $this->belongsTo('App\Models\Error');
	}
}