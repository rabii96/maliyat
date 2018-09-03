<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RealPayment extends Model
{
    public function project(){
        return $this->belongsTo('App\Project', 'project_id');
    }

    public function transfer_method(){
        return $this->belongsTo('App\TransferMethod', 'transfer_method_id');
    }

    public function expected_payment(){
        return $this->belongsTo('App\ExpectedPayment', 'expected_payment_id');
    }

    public function from_bank(){
        return $this->belongsTo('App\Bank','from_bank_id');
    }

    public function to_bank(){
        return $this->belongsTo('App\Bank', 'to_bank_id');
    }

    public function getDates(){
        return [
            'date',
            'created_at',
            'updated_at'
        ];
    }
}
