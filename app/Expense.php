<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public function project(){
        return $this->belongsTo('App\Project', 'project_id');
    }

    public function service(){
        return $this->belongsTo('App\Service', 'service_id');
    }

    public function employee(){
        return $this->belongsTo('App\Employee', 'employee_id');
    }

    public function percentage(){
        return $this->belongsTo('App\Percentage', 'percentage_id');
    }

    public function transfer_method(){
        return $this->belongsTo('App\TransferMethod', 'transfer_method_id');
    }

    public function bank(){
        return $this->belongsTo('App\Bank', 'bank_id');
    }

    public function expense_type(){
        return $this->belongsTo('App\ExpenseType', 'expense_type_id');
    }

    public function getDates(){
        return [
            'date',
            'created_at',
            'updates_at'
        ];
    }
}
