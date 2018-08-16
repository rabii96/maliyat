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
                    @include('includes.messages')
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <form method="POST" action="{{ route('editBankTransfer' , ['id' => $bankTransfer->id ]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="portlet light ">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <i class="icon-layers font-dark"></i>
                                    <span class="caption-subject bold uppercase">تعديل التحويل</span>
                                </div>
                                
                                <div class="tools"> </div>
                            </div>
                            <div class="portlet-body">
                
                                    <div class="row">
                                    <div class="col-md-10 col-md-offset-1 col-xs-12">
                                    <div class="col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 no-margin margin-top-5">حول من بنك <span>*</span></label>
                                            <div class="col-md-9">
                                                <select id="select_from_bank" name="select_from_bank" class="form-control select2 ">
                                                    <option value=""></option>
                                                    @if($banks)
                                                        @foreach($banks as $bank)
                                                            <option value="{{ $bank->id }}" {{ $bankTransfer->from_bank->id == $bank->id ? 'selected' : '' }}>{{ $bank->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @foreach($banks as $bank)
                                                    <input type="hidden" id="fromB_number{{ $bank->id }}" value="{{ $bank->account_number }}">
                                                @endforeach
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 no-margin margin-top-5">الى بنك <span>*</span></label>
                                            <div class="col-md-9">
                                                <select id="select_to_bank" name="select_to_bank" class="form-control select2 ">
                                                    <option value=""></option>
                                                    @if($banks)
                                                        @foreach($banks as $bank)
                                                            <option value="{{ $bank->id }}" {{ $bankTransfer->to_bank->id == $bank->id ? 'selected' : '' }}>{{ $bank->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @foreach($banks as $bank)
                                                    <input type="hidden" id="toB_number{{ $bank->id }}" value="{{ $bank->account_number }}">
                                                @endforeach
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-10 col-md-offset-1 col-xs-12">
                                    <div class="col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 no-margin margin-top-5">رقم حسابه <span>*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" value="{{ $bankTransfer->from_bank->account_number }}" id="bank_from_number" class="form-control" placeholder="" disabled> 
                                            </div>
                                        <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 no-margin margin-top-5">رقم حسابه <span>*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" value="{{ $bankTransfer->to_bank->account_number }}" id="bank_to_number" class="form-control" placeholder="" disabled> 
                                            </div>
                                        <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                    
                                    
                                    <div class="row">
                                    <div class="col-md-6 col-md-offset-3 col-xs-12">
                                        <hr>
                                    </div>
                                    </div>
                                    
                                    <div class="row">
                                    <div class="col-md-10 col-md-offset-1 col-xs-12">
                                    
                                    <div class="col-md-4 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 no-margin margin-top-5">مبلغ قدره <span>*</span></label>
                                            <div class="col-md-8">
                                                <div class="input-icon">
                                                    <i class="fa fa-money font-green "></i>
                                                    <input id="transfer_amount" value="{{ $bankTransfer->transfer_amount }}" dir="ltr" style="text-align: right" name="transfer_amount" onkeypress="return isNumber(event)" type="text" class="form-control" placeholder=""> 
                                                </div>
                                            </div>
                                        <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <script>
                                        function isNumber(evt) {
                                            evt = (evt) ? evt : window.event;
                                            var charCode = (evt.which) ? evt.which : evt.keyCode;
                                            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                                                return false;
                                            }
                                            return true;
                                        }
                                    </script>
                                    <div id="transfer_percentage-wrapper" class="col-md-4 col-xs-12">
                                        <div id="transfer_percentage-div" class="form-group">
                                            <label for="transfer_percentage" class="control-label col-md-5 no-margin margin-top-5">اقتطاع نسبه </label>
                                            <div class="col-md-7">
                                                <select id="transfer_percentage" name="transfer_percentage" class="form-control select2 select-hide" style="width: 100%;">
                                                    <option>-- إختر --</option>
                                                    @if($percentages)
                                                        @foreach($percentages as $p)
                                                            <option value="{{ $p->id }}" data-value="{{ $p->value }}" {{ @$bankTransfer->percentage->id == $p->id ? 'selected' : '' }}>{{ $p->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="transfer_percentage_value" id="transfer_percentage_value" value="{{ $bankTransfer->transfer_percentage }}">
                                    <div class="col-md-4 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 no-margin margin-top-5">صافى المبلغ </label>
                                            <div class="col-md-7">
                                                <div class="input-icon">
                                                    <i class="fa fa-money font-green "></i>
                                                    <input id="net_transfer_amount" value="{{ $bankTransfer->net_transfer_amount }}" name="net_transfer_amount" type="text" class="form-control" placeholder="" readonly> 
                                                </div>
                                            </div>
                                        <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    
                                    </div>
                                                            
                                        
                                
                                    </div>
                                    
                                    
                                    <div class="row">
                                    <div class="col-md-6 col-md-offset-3 col-xs-12">
                                        <hr>
                                    </div>
                                    </div>
                            
                            
                                        <div class="col-md-6 col-md-offset-3 col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 no-margin margin-top-5">مرفق </label>
                                            <div class="col-md-9">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="input-group input-large">
                                                        <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                                            <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                            <span class="fileinput-filename"> </span>
                                                        </div>
                                                        <span class="input-group-addon btn default btn-file">
                                                            <span class="fileinput-new"> إختر المرفق </span>
                                                            <span class="fileinput-exists"> تغيير </span>
                                                            <input type="file" name="attachement" id="attachement"> </span>
                                                        <a id="dismissAttachement" href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> حذف </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        </div> 
                                    
                                                

                                                                    
                                <div class="col-md-6 col-md-offset-3 col-sm-12">
                                <hr>
                                </div>
                                
                                
                                                                                        
                                                                    
                                <div class="col-md-6 col-md-offset-3 col-sm-12 text-center">
                                
                            <button type="submit" class="btn btn-lg green pull-right margin-right-10">تعديل</button>
                
                                </div>
                                
                                <div class="clearfix"></div>
                                
                            </div>
                        </div>
                    </form>
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