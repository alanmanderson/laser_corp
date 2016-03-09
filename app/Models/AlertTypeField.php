<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlertTypeField extends Model
{
    public function alertType(){
        return $this->belongsTo('App\Models\AlertType');
    }
}
