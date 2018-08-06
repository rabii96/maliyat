<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransferMethod extends Model
{
    public function employee_account(){
        return $this->belongsTo('App\EmployeeAccount');
    }
}
