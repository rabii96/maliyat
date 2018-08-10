<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeAccount extends Model
{
    public function employee(){
        return $this->belongsTo('App\Employee', 'employee_id');
    }
    public function transfer_method(){
        return $this->belongsTo('App\TransferMethod', 'transfer_method_id');
    }
}
