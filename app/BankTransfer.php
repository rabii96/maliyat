<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankTransfer extends Model
{
    public function from_bank(){
        return $this->belongsTo('App\Bank','from_bank_id');
    }
    public function to_bank(){
        return $this->belongsTo('App\Bank', 'to_bank_id');
    }
    public function percentage(){
        return $this->belongsTo('App\Percentage', 'percentage_id');
    }

    public function getDates()
    {
        return ['created_at', 'updated_at'];
    }
}
