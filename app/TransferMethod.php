<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransferMethod extends Model
{
    public function employee_account(){
        return $this->hasMany('App\EmployeeAccount');
    }
    
    public function expenses(){
        return $this->hasMany('App\Expense');
    }
}
