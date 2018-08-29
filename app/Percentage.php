<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Percentage extends Model
{
    public function bankTransfers(){
        return $this->hasMany('App\BankTransfer');
    }

    public function expenses(){
        return $this->hasMany('App\Expense');
    }
}
