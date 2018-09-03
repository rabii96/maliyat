@extends('layouts.base')

@section('content')
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<!-- BEGIN CONTENT BODY -->
		<div class="page-content">
			
			<a href="{{ route('addPayment') }}"><button type="button" class="btn blue-hoki pull-right">إضافة دفعة</button></a>
			
			@include('includes.pageHeader')
			<!-- BEGIN DASHBOARD STATS 1-->
			<div class="row clearfix">
				<div class="col-md-12">
					@include('includes.messages')
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet light ">
						<div class="portlet-title">
							<div class="caption font-dark">
								<i class="icon-layers font-dark"></i>
								<span class="caption-subject bold uppercase">كل الدفعات</span>
							</div>
							
							<div class="tools"> </div>
						</div>
						<div class="portlet-body">
							
							
						<div class="col-md-3">

						<div class="marketplace__content">  
						<div class="marketplace__aside">
						<div class="filters__container filters__container--vertical filters__container--collapsed">
						<form class="filters__form nomargin">
						<h3 class="marketplace__title no-margin">
						أدوات التصفية<i class="mdi mdi-chevron-down mdi-24px"></i>
						</h3>
						<div class="filters filters--vertical">
						<div class="filters__section filters__section--category filters__section--vertical">
						
						
						<div class="filters__section-content">


						<div>
							<input id="all" value="all" class="checkbox-style" name="time" checked type="radio">
							<label for="all" class="checkbox-style-3-label">
								الكل
							</label>
						</div>
						<div>
							<input id="last_week" value="last_week" class="checkbox-style" name="time" type="radio">
							<label for="last_week" class="checkbox-style-3-label">
								اخر اسبوع
							</label>
						</div>

						<div>
							<input id="last_month" value="last_month" class="checkbox-style" name="time" type="radio">
							<label for="last_month" class="checkbox-style-3-label">
								اخر شهر
							</label>
						</div>

						<div>
							<input id="last_year" value="last_year" class="checkbox-style" name="time" type="radio">
							<label for="last_year" class="checkbox-style-3-label">
								اخر سنة
							</label>
						</div>

						<div class="col-md-12">
							<hr>
						</div>

						<div>
							<input id="limited_time" class="checkbox-style" name="time" id="limited_time" value="limited_time" type="radio">
							<label for="limited_time" class="checkbox-style-3-label">
								فترة محددة
							</label>
							<div class="col-md-12">
								<input type="text" class="form-control date" id="from" name="from" disabled placeholder="من تاريخ">
							</div>
							<hr>
							<div class="col-md-12">
								<input type="text" class="form-control date" id="to" name="to" disabled placeholder="إلى تاريخ">
							</div>
						</div>

					
						<div class="col-md-12">
							<hr>
						</div>
						
						<div>
							<input id="project_filter" class="checkbox-style" name="project_filter" value="false" type="checkbox">
							<label for="project_filter" class="checkbox-style-3-label">
								جميع مدفوعات مشروع
							</label>
							<div class="col-md-12">
								<select disabled id="p_filter" class="form-control select2 ">
									<option></option>
									@foreach ($projects as $p)
										<option value="{{ $p->name }}">{{ $p->name }}</option>
									@endforeach
								</select>
							</div>
						</div>

					
						<div class="col-md-12">
							<hr>
						</div>
						
						<div>
							<input id="client_filter" class="checkbox-style" name="client_filter" value="false" type="checkbox">
							<label for="client_filter" class="checkbox-style-3-label">
								جميع مدفوعات عميل
							</label>
							<div class="col-md-12">
								<select disabled id="c_filter" class="form-control select2 ">
									<option></option>
									@foreach ($clients as $client)
										<option value="{{ $client->name }}">{{ $client->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						

						<div class="clearfix"></div>
							
						<div class="text-center margin-top-30">
							<button onclick="applyFilters()" type="button" class="btn green ">عـرض</button>
						</div>

						</div>
						</div>
						<script>
						var from = '';
							$("#from").on("change",function(){
								var selected = $(this).val();
								from = selected;
							});
							var to = '';
							$("#to").on("change",function(){
								var selected = $(this).val();
								to = selected;
							});

							$('[name="time"]').on('click',function(){
								if($('[name="time"]:checked').val() == 'limited_time'){
									$('#from').removeAttr('disabled');
									$('#to').removeAttr('disabled');
								}else{
									$('#from').val('');
									$('#from').attr('disabled','disabled');
									$('#to').val('');
									$('#to').attr('disabled','disabled');
								}
							});
							$('#project_filter').on('click', function(){
								if($('#project_filter').val()=="true"){
									$("#p_filter").attr('disabled', 'disabled').trigger('change');
									$("#p_filter").val(null).trigger('change');
									$('#project_filter').val('false');
								}else{
									$("#p_filter").removeAttr('disabled').trigger('change');
									$('#project_filter').val('true');
								}
							});
							$('#client_filter').on('click', function(){
								if($('#client_filter').val()=="true"){
									$("#c_filter").attr('disabled', 'disabled').trigger('change');
									$("#c_filter").val(null).trigger('change');
									$('#client_filter').val('false');
								}else{
									$("#c_filter").removeAttr('disabled').trigger('change');
									$('#client_filter').val('true');
								}
							});

							function applyFilters(){
								var table = $('#allPaymentsTable').DataTable();
								table.draw();
								window.scrollTo(0, 0);
							}

							$.fn.dataTable.ext.search.push(
								function( settings, data, dataIndex ) {
									var time = $("[name='time']:checked").val();
									var date = data[6];
									var timeMatches = true;
									if(time == 'all'){
										timeMatches = true;
									}else if(time == 'last_week'){
										@php
									        $last_week = (new Date('-7 days'))->format('m/d/Y');
										@endphp
										var last_week = '{{ $last_week }}';
										if((moment(date).isAfter(last_week)) || (moment(date).isSame(last_week))){
											timeMatches = true;
										}else{
											timeMatches = false;
										}
									}else if(time == 'last_month'){
										@php
									        $last_month = (new Date('-30 days'))->format('m/d/Y');
										@endphp
										var last_month = '{{ $last_month }}';
										if((moment(date).isAfter(last_month)) || (moment(date).isSame(last_month))){
											timeMatches = true;
										}else{
											timeMatches = false;
										}
									}else if(time == 'last_year'){
										@php
									        $last_year = (new Date('-365 days'))->format('m/d/Y');
										@endphp
										var last_year = '{{ $last_year }}';
										if((moment(date).isAfter(last_year)) || (moment(date).isSame(last_year))){
											timeMatches = true;
										}else{
											timeMatches = false;
										}
									}else if(time == 'limited_time'){
										timeMatches = false;
										if((from == '')&&(to == '')){
											timeMatches = true;
										}else if(from == ''){
											if	(
													(moment(date).isBefore(to)) || 
													(moment(date).isSame(to))
												)
											{
												timeMatches = true;
											}
										}else if(to == ''){
											if	(
													(moment(date).isAfter(from)) || 
													(moment(date).isSame(from))
												)
											{
												timeMatches = true;
											}
										}else{
											if	( 
													(
														(moment(date).isBefore(to)) || 
														(moment(date).isSame(to))
													) && 
													(
														(moment(date).isAfter(from)) || 
														(moment(date).isSame(from))
													)
												) 
											{
												timeMatches = true;
											}
										}
									}
									var client_filter = $('#client_filter').val();
									var clientMatches = true;
									var project_filter = $('#project_filter').val();
									var projectMatches = true;
									if(client_filter == 'false'){
										clientMatches = true;
									}else{
										var c_filter = $("#c_filter").val();
										var client = data[5];
										if(c_filter == client){
											clientMatches = true;
										}else{
											clientMatches = false;
										}
									}
									if(project_filter == 'false'){
										projectMatches = true;
									}else{
										var p_filter = $("#p_filter").val();
										var project = data[2];
										if(p_filter == project){
											projectMatches = true;
										}else{
											projectMatches = false;
										}
									}
									
									return timeMatches && clientMatches && projectMatches;
							});
						
						</script>

						</div></form></div></div>
						</div>

							</div>
							
							
						<div class="line visible-xs-block"></div>

							
						<div class="col-md-9 clearfix">

						<table class="table table-striped table-bordered table-hover dt-responsive grd_view" width="100%" id="allPaymentsTable">
							<thead>
								<tr>
									<th class="desktop">م</th>
									<th class="all no-padding"></th>
									<th class="min-phone-l">اسم المشروع</th>
									<th class="min-phone-l">رقم المدفوع</th>
									<th class="min-tablet">المبلغ</th>
									<th class="none">العميل</th>
									<th class="desktop">التفاصيل</th>
								</tr>
							</thead>
							<tbody>
								@if($realPayments)
									@foreach($realPayments as $realPayment)
										<tr>
											<td>{{ $loop->iteration }}</td>
											<td class="p-relative">
												@if($realPayment->project->finished == true)
													<div class="por-indicator bg-red"></div>
												@else
													<div class="por-indicator bg-default"></div>
												@endif
											</td>
											<td>{{ $realPayment->project->name }}</td>
											<td>{{ $realPayment->id }}</td>
											<td>{{ $realPayment->paid_value }} ريال</td>
											<td>{{ $realPayment->project->client->name }}</td>
											<td data-search="{{ $realPayment->date->format('m/d/Y') }}" class="text-center">
												<div class="btn-group">
													<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
														<i class="fa fa-angle-down"></i>
													</a>
													<ul class="dropdown-menu pull-right">
														<li>
															<a class="font-purple" data-toggle="modal" data-target="#showPayment{{ $realPayment->id }}">
															<i class="icon-eye font-purple"></i> عـرض</a>
														</li>
														<li>
															<a href="{{ route('editPayment', ['id' => $realPayment->id]) }}" class="font-blue">
															<i class="icon-note font-blue"></i> تعديل</a>
														</li>														
														<li>
															<a href="#deletePayment{{ $realPayment->id }}" class="font-red" data-toggle="modal">
															<i class="icon-trash font-red"></i> حـذف</a>
														</li>														
														<li>
															<a href="{{ route('downloadPayment', ['id' => $realPayment->id]) }}" class="font-green">
															<i class="icon-cloud-download font-green"></i> تحميل</a>
														</li>													
													</ul>
												</div>
											</td>
										</tr>
										<div class="modal fade" id="showPayment{{ $realPayment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h4 class="modal-title pull-left" id="exampleModalLabel">بيانات الدفعة</h4>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
											
															<div class="form-group">
																<h4 class="font-purple">اسم المشروع </h4>
																<h4>{{ $realPayment->project->name}}</h4>
															</div>
															
															<div class="form-group">
																	<h4 class="font-purple">رقم الدفعة</h4>
																	<h4>{{ $realPayment->expected_payment->index }}</h4>
															</div>

															<div class="form-group">
																	<h4 class="font-purple">المبلغ الأصلي للدفعة</h4>
																	<h4>{{ $realPayment->expected_payment->value }} ريال</h4>
															</div>

															<div class="form-group">
																	<h4 class="font-purple">المبلغ المدفوع في هذه الدفعة</h4>
																	<h4>{{ $realPayment->paid_value }} ريال</h4>
															</div>

															<div class="form-group">
																	<h4 class="font-purple">المبلغ المتبقي للدفعة</h4>
																	<h4>{{ $realPayment->expected_payment->remaining_value }} ريال</h4>
															</div>

															<div class="form-group">
																	<h4 class="font-purple"> طريقة التحويل في هذه الدفعة</h4>
																	@if($realPayment->transfer_method)
																		<h4>إسم طريقة التحويل : 
																			{{ $realPayment->transfer_method->name }}
																		</h4>
																		@if(@$realPayment->transfer_method->name == 'باي بال')
																			<h4>الايميل : 
																			{{ $realPayment->paypal_email }}</h4>
																		@elseif(@$realPayment->transfer_method->name == 'بنك')
																			<h4>إسم البنك : 
																			{{ @$realPayment->from_bank->name }}</h4>
																			<h4>رقم الحساب : 
																			{{ $realPayment->from_bank_number }}</h4>
																		@elseif(@$realPayment->transfer_method->name == 'شيك')
																			<h4>إسم البنك : 
																				{{ @$realPayment->from_bank->name }}</h4>
																			<h4>رقم الشيك : 
																			{{ $realPayment->check_number }}</h4>
																		@else
																			<h4>رقم الحساب : 
																			{{ @$realPayment->from_bank_number }}</h4>
																		@endif
																	@else
																		<h4>إسم طريقة التحويل : 
																			كاش
																		</h4>
																		<h4>إسم المحول :
																			{{ $realPayment->transferer_name }}
																		</h4>
																	@endif
																	<?php
																		$month = $realPayment->date->format('M');
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
																		$ar_month = $arabic_months[$month];
																	?>

																	<div class="form-group">
																			<h4 class="font-purple">البنك المحول إليه</h4>
																			<h4>{{ $realPayment->to_bank->name }}</h4>
																			<h4 class="font-purple">رقم حسابه</h4>
																			<h4>{{ $realPayment->to_bank->account_number }}</h4>
																	</div>

																	<div class="form-group">
																			<h4 class="font-purple">تاريخ الدفعة</h4>
																			<h4>{{ $realPayment->date->format('d') }} {{$ar_month}} {{ $realPayment->date->format('Y') }}</h4>
																	</div>

																	@if( $realPayment->attachement)
																		<div class="form-group">
																				<h4 class="font-purple">الملف المرفق</h4>
																				<h4><a dir="rtl" href="{{ asset('storage/attachements/') }}/{{ $realPayment->attachement }}" download>{{ $realPayment->attachement }}</a></h4>
																		</div>
																	@endif
															</div>
									
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">إغـلاق</button>
														</div>
													</div>
												</div>
										</div>
										<div class="modal fade" id="deletePayment{{ $realPayment->id }}" tabindex="-1" role="basic" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content del-modal font-white">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
															<h4 class="modal-title"></h4>
														</div>
														<div class="modal-body text-center">
															<h3>
																<i class="fa fa-3x fa-trash"></i>
															</h3>
															متأكد أنك تريد حـذف هذه الدفعة ؟
											
														</div>
														<div class="modal-footer">
															<button type="button" class="btn dark btn-default" data-dismiss="modal">إغلاق</button>
															<a href="{{ route('deletePayment', ['id' => $realPayment->id]) }}" class="btn btn-danger">حـذف</a>
														</div>
													</div>
													<!-- /.modal-content -->
												</div>
												<!-- /.modal-dialog -->
										</div>
									@endforeach
								@endif
							</tbody>
						</table>

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