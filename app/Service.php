<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function getDates(){
        return [
            'start_date',
            'end_date'
        ];
    }
}
