<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlertType extends Model
{
    public function alertTypeFields(){
        return $this->hasMany('App\Models\AlertTypeField');
    }
}
