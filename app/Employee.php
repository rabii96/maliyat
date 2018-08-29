<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function employee_accounts(){
        return $this->hasMany('App\EmployeeAccount');
    }
    public function task(){
        return $this->belongsTo('App\Task', 'task_id');
    }

    public function expenses(){
        return $this->hasMany('App\Expense');
    }
}
