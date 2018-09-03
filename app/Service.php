<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    public function expenses(){
        return $this->hasMany('App\Expense');
    }
    
    public function getDates(){
        return [
            'start_date',
            'end_date',
            'created_at',
            'updated_at'
        ];
    }
}
