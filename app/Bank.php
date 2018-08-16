<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    public function bankTransfers(){
        return $this->hasMany('App\BankTransfer');
    }

}
