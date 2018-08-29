@extends('layouts.base')

@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            
            
                @include('includes.pageHeader')
            <!-- BEGIN DASHBOARD STATS 1-->
            <div class="row clearfix">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-layers font-dark"></i>
                                <span class="caption-subject bold uppercase">مشروع رقم {{ $project->id }}</span>
                            </div>
                            @if($project->finished == false)
                                <a href="{{ route('receiveProject' , [ 'id' => $project->id]) }}" class="btn green pull-right"><i class="icon-check"></i> إستلام المشروع </a>
                            @endif
                            <div class="tools"> </div>
                        </div>
                        <div class="portlet-body">
                                                            
                                        
                                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>اسم المشروع </label>
                                <div class="input-icon">
                                    <i class="fa fa-file font-green "></i>
                                    <input type="text" class="form-control" value="{{ $project->name }}" disabled> 
                                </div>
                            </div>
                            </div>
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>التاريخ </label>
                                <div class="input-group date-picker input-daterange" data-date="24/02/2018" data-date-format="dd/mm/yyyy">
                                    <?php
                                        $start_month = $project->start_date->format('M');
                                        $end_month = $project->end_date->format('M');
                                        $arabic_months = [
                                            "Jan" => "يناير",
                                            "Feb" => "فبراير",
                                            "Mar" => "مارس",
                                            "Apr" => "أبريل",
                                            "May" => "مايو",
                                            "Jun" => "يونيو",
                                            "Jul" => "يوليو",
                                            "Aug" => "أغسطس",
                                            "Sep" => "سبتمبر",
                                            "Oct" => "أكتوبر",
                                            "Nov" => "نوفمبر",
                                            "Dec" => "ديسمبر"
                                        ];
                                        $st_month = $arabic_months[$start_month];
                                        $e_month = $arabic_months[$end_month];
                                    ?>
                                    <input type="text" class="form-control date col-md-6" name="from" value="{{ $project->start_date->format('d') }} {{ $st_month }} {{ $project->start_date->format('Y') }}" disabled>
                                    <span class="input-group-addon small-sp">  </span>
                                    <input type="text" class="form-control date col-md-6" name="to" value="{{ $project->end_date->format('d') }} {{ $e_month }} {{ $project->end_date->format('Y') }}" disabled> 
                                </div>
                            </div>
                            </div>                           
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>التفاصيل</label>
                                <textarea class="form-control" rows="5" disabled>{{ $project->details }}</textarea>
                            </div>
                            </div>
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>العميل </label>
                                <div class="input-icon">
                                    <i class="fa fa-user font-green "></i>
                                    <input type="text" class="form-control" value="{{ $project->client->name }}" disabled> 
                                </div>
                            </div>
                            </div>                           
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>تكلفة المشروع </label>
                                <div class="input-icon">
                                    <i class="fa fa-money font-green "></i>
                                    <input type="text" class="form-control" value="{{ $project->total_cost }} ريال" disabled> 
                                </div>
                            </div>
                            </div>
                            
                            
                            <div class="col-md-6 col-md-offset-3 col-sm-12">                                   
                            <fieldset>
                            <legend>
                                الدفعات
                            </legend>
                                                    
                            <div class="form-group">
                                <label>عدد الدفعات </label>
                                <div class="input-icon">
                                    <i class="fa fa-money font-green "></i>
                                    <input type="text" class="form-control" value="{{ $project->expected_payments->count() }}" disabled> 
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-12">
                            <div class="form-group">
                                <label>إجمالى المبلغ المستلم </label>
                                <div class="input-icon">
                                    <i class="fa fa-money font-green "></i>
                                    <?php
                                        $total_paid = 0;
                                        $total_remaining = 0;
                                        foreach($project->expected_payments as $p){
                                            $total_paid += $p->paid_value;
                                            $total_remaining += $p->remaining_value;
                                        }
                                    ?>
                                    <input type="text" class="form-control" value="{{ $total_paid }}" disabled> 
                                </div>
                            </div>
                            </div>   
                                                            
                            <div class="col-md-4 col-xs-12">
                                <div class="form-group">
                                <label>إجمالى المبلغ المتبقي </label>
                                <div class="input-icon">
                                    <i class="fa fa-money font-green "></i>
                                    <input type="text" class="form-control" value="{{ $total_remaining }}" disabled> 
                                </div>
                            </div>
                            </div>                       		
                            
                            <div class="col-md-4 col-xs-12">
                                <div class="form-group">
                                <label>إجمالى المبلغ المصروف </label>
                                <div class="input-icon">
                                    <i class="fa fa-money font-green "></i>
                                    @php
                                        $expenses = 0;
                                        if($project->expenses){
                                            foreach ($project->expenses as $ex) {
                                                $expenses += $ex->value_plus_percentage;
                                            }
                                        }
                                        $net_profit = $total_paid - $expenses;
                                    @endphp
                                    <input type="text" class="form-control" value="{{ $expenses }}" disabled> 
                                </div>
                            </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                <div class="mt-element-list">
                                <div class="mt-list-head list-simple ext-1 font-white bg-green-sharp">
                                    <div class="list-head-title-container">
                                        <h3 class="list-title">تفاصيل الدفعات</h3>
                                    </div>
                                </div>
                                <div class="mt-list-container list-simple ext-1 bg-white">
                                    <ul>
                                        @foreach($project->expected_payments as $p)
                                            @if($p->state == 'Paid')
                                                <li class="mt-list-item done">
                                                    <div class="list-icon-container">
                                                        <i class="icon-check"></i>
                                                    </div>
                                                    <div class="list-datetime">{{ $p->date->format('d/m/Y') }}</div>
                                                    <div class="list-item-content">
                                                        <h3 class="uppercase">
                                                            <a href="javascript:;">{{ $p->value }} ريال</a>
                                                        </h3>
                                                    </div>
                                                </li>
                                            @elseif($p->state == 'Unpaid')
                                                @if(strtotime($p->date) >= strtotime((new Date('-1 day'))))
                                                    <li class="mt-list-item wait">
                                                        <div class="list-icon-container">
                                                            <i class="icon-close"></i>
                                                        </div>
                                                        <div class="list-datetime">{{ $p->date->format('d/m/Y') }}</div>
                                                        <div class="list-item-content">
                                                            <h3 class="uppercase">
                                                                <a href="javascript:;">{{ $p->value }} ريال</a>
                                                            </h3>
                                                        </div>
                                                    </li>
                                                @else
                                                    <li class="mt-list-item late">
                                                        <div class="list-icon-container">
                                                            <i class="icon-close"></i>
                                                        </div>
                                                        <div class="list-datetime">{{ $p->date->format('d/m/Y') }}</div>
                                                        <div class="list-item-content">
                                                            <h3 class="uppercase">
                                                                <a href="javascript:;">{{ $p->value }} ريال</a>
                                                            </h3>
                                                        </div>
                                                    </li>
                                                @endif
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            </div>
                            </div>
                            
                            <div class="col-md-12 text-center">
                                <ul class="pay-indicator">
                                    <li>
                                        <span class="pay-status done"></span> تم الدفع
                                    </li>
                                    <li>
                                        <span class="pay-status late"></span> متأخر عن تاريخ الدفع
                                    </li>
                                    <li>
                                        <span class="pay-status wait"></span> لم يتم الدفع
                                    </li>
                                </ul>
                            </div>
                            
                            </fieldset> 
                            </div>    
                            
                                            
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>ملاحظات</label>
                                <textarea class="form-control" rows="5" disabled>{{ @$project->remarks }}</textarea>
                            </div>
                            </div>
                            
                                                
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <hr>
                            </div>
                            
                                                
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>صافى الربح</label>
                                <div class="col-md-12">
                                
                                    <input type="text" class="form-control" value="{{ $net_profit }} ريال" disabled>
                                    
                                </div>
                            </div>
                            </div> 
                            
                            <div class="clearfix"></div>
                            
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
                
            </div>
            <div class="clearfix"></div>
            <!-- END DASHBOARD STATS 1-->
            
            
            
            
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
@endsection