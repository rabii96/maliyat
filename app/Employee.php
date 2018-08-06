<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function employee_account(){
        return $this->hasMany('App\EmployeeAccount');
    }
    public function task(){
        return $this->hasOne('App\Task');
    }
}
