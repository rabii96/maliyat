<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpectedPayment extends Model
{
    public function project(){
        return $this->belongsTo('App\Project', 'project_id');
    }

    public function real_payments(){
        return $this->hasMany('App\RealPayment');
    }

    public function getDates(){
        return [
            'date'
        ];
    }
}
