<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    public function bankTransfers(){
        return $this->hasMany('App\BankTransfer');
    }

    public function real_payments(){
        return $this->hasMany('App\RealPayment');
    }

    public function expenses(){
        return $this->hasMany('App\Expense');
    }

}
