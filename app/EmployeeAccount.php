<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeAccount extends Model
{
    public function employee(){
        return $this->belongsTo('App\Employee');
    }
    public function transfer_method(){
        return $this->hasOne('App\TransferMethod');
    }
}
