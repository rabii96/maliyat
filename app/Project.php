<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function client(){
        return $this->belongsTo('App\Client', 'client_id');
    }

    public function expected_payments(){
        return $this->hasMany('App\ExpectedPayment');
    }

    public function expenses(){
        return $this->hasMany('App\Expense');
    }

    public function real_payments(){
        return $this->hasMany('App\RealPayment');
    }
    
    public function getDates()
    {
        return ['start_date', 'end_date'];
    }
}
