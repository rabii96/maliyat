@extends('layouts.base')

@section('content')
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<!-- BEGIN CONTENT BODY -->
		<div class="page-content">
			@php
				$permissions = unserialize(Auth::user()->permissions);
				if($permissions == null){
					$permissions = [];
				}
			@endphp 
			@if((in_array('expenseAdd',$permissions)))
				<a href="{{ route('addExpense') }}"><button type="button" class="btn blue-hoki pull-right">إضافة مصروف</button></a>
			@endif
			
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
								<span class="caption-subject bold uppercase">كل المصروفات</span>
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
							<input id="selectAll" class="checkbox-style" name="type_filter" type="checkbox" checked>
							<label for="selectAll" class="checkbox-style-3-label">
								الكل
							</label>
						</div>

						@foreach($expenseTypes as $e)
							<div>
								<input id="{{ $e->name }}" value="{{ $e->name }}" class="checkbox-style" name="type[]" checked type="checkbox">
								<label for="{{ $e->name }}" class="checkbox-style-3-label">
									{{ $e->name }}
								</label>
							</div>
						@endforeach

						

						<div class="col-md-12">
							<hr>
						</div>

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
								جميع مصروفات مشروع
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
								جميع مصروفات عميل
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
							<button onclick="applyFilters()" type="button" class="btn green">عـرض</button>
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

								$('#selectAll').on('change', function(){
									if($('#selectAll').val() == '1'){
										$("input[name='type[]']:not(:checked)").each(function(){
											$(this).trigger('click').trigger('change');
										});
										$('#selectAll').val('0');
									}else{
										$("input[name='type[]']:checked").each(function(){
											$(this).trigger('click').trigger('change');
										});
										$('#selectAll').val('1');
									}
								});
	
								function applyFilters(){
									var table = $('#allExpensesTable').DataTable();
									table.draw();
									window.scrollTo(0, 0);
								}
	
								$.fn.dataTable.ext.search.push(
									function( settings, data, dataIndex ) {
										var time = $("[name='time']:checked").val();
										var typeFilters = [];
										$("[name='type[]']:checked").each(function(){
											typeFilters.push($(this).val());
										});
										var date = data[7];
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
											var client = data[6];
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
										var type = data[3] ;
										typeMatches = true;
										if ( jQuery.inArray(type,typeFilters) !== -1)
										{
											typeMatches = true;
										}else{
											typeMatches = false;
										}
										
										return timeMatches && clientMatches && projectMatches && typeMatches;
								});
							
							</script>

						</div></form></div></div>
						</div>

							</div>
							
							
						<div class="line visible-xs-block"></div>

							
						<div class="col-md-9 clearfix">

						<table class="table table-striped table-bordered table-hover dt-responsive grd_view" width="100%" id="allExpensesTable">
							<thead>
								<tr>
									<th class="desktop">م</th>
									<th class="all no-padding"></th>
									<th class="min-phone-l">اسم المشروع/الخدمة</th>
									<th class="desktop">النوع</th>
									<th class="min-phone-l">رقم المصروف</th>
									<th class="min-tablet">المبلغ</th>
									<th class="none">العميل</th>
									<th class="desktop">التفاصيل</th>
								</tr>
							</thead>
							<tbody>
								@if($expenses)
									@foreach ($expenses as $ex)
										<tr>
											<td>{{ $loop->iteration }}</td>
											<td class="p-relative">
												 @if ($ex->project)
													 @if ($ex->project->finished == true)
													 	<div class="por-indicator bg-red"></div>
													 @else
													 	<div class="por-indicator bg-default"></div>
													 @endif
												 @else
												 	@if ($ex->service->finished == true)
														<div class="por-indicator bg-red"></div>
													@else
														<div class="por-indicator bg-default"></div>
													@endif
												 @endif
											</td>
											<td>
												@if($ex->project)
													{{ $ex->project->name }}
												@else
													{{ $ex->service->name }}
												@endif
											</td>
											<td>
												{{ $ex->expense_type->name }}
											</td>
											<td>
												{{ $ex->id }}
											</td>
											<td>{{ $ex->value_plus_percentage }} ريال</td>
											<td>
												@if($ex->project)
													{{ $ex->project->client->name }}
												@endif
											</td>
											<td data-search="{{ $ex->date->format('m/d/Y') }}" class="text-center">
												<div class="btn-group">
													<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
														<i class="fa fa-angle-down"></i>
													</a>
													<ul class="dropdown-menu pull-right">
														@if((in_array('expenseShow',$permissions)))
															<li>
																<a class="font-purple" data-toggle="modal" data-target="#showExpense{{ $ex->id }}">
																<i class="icon-eye font-purple"></i> عـرض</a>
															</li>	
														@endif	
														@if((in_array('expenseEdit',$permissions)))												
															<li><a href="{{ route('editExpense' , ['id' => $ex->id]) }}" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
														@endif
														@if((in_array('expenseDelete',$permissions)))
															<li>
																<a href="#deleteExpense{{ $ex->id }}" class="font-red" data-toggle="modal">
																<i class="icon-trash font-red"></i> حـذف</a>
															</li>	
														@endif		
														@if((in_array('expenseDownloadPain',$permissions)) ||(in_array('expenseDownloadReceived',$permissions)))											
															<li><a href="{{ route('downloadExpense', ['id' => $ex->id]) }}" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
														@endif
													</ul>
												</div>
											</td>
										</tr>
										<div class="modal fade" id="showExpense{{ $ex->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h4 class="modal-title pull-left" id="exampleModalLabel">بيانات المصروف</h4>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															
															<div class="form-group">
																<h4 class="font-purple">اسم المصروف</h4>
																<h4>{{ $ex->name }}</h4>
															</div>

															<div class="form-group">
																<h4 class="font-purple">نوع المصروف</h4>
																<h4>{{ @$ex->expense_type->name }}</h4>
															</div>

															@if ($ex->details)
																<div class="form-group">
																	<h4 class="font-purple">التفاصيل</h4>
																	<h4>{{ $ex->details }}</h4>
																</div>
															@endif

															@if($ex->project)
																<div class="form-group">
																	<h4 class="font-purple">اسم المشروع </h4>
																	<h4>{{ $ex->project->name}}</h4>
																</div>
															@endif

															@if($ex->service)
																<div class="form-group">
																	<h4 class="font-purple">اسم الخدمة </h4>
																	<h4>{{ $ex->service->name}}</h4>
																</div>
															@endif
															
															<div class="form-group">
																<h4 class="font-purple">رقم المصروف</h4>
																<h4>{{ $ex->id }}</h4>
															</div>

															<div class="form-group">
																<h4 class="font-purple">صاحب المصروف</h4>
																<h4>{{ $ex->employee->name }}</h4>
															</div>

															<div class="form-group">
																<h4 class="font-purple">المبلغ</h4>
																<h4>{{ $ex->value }} ريال</h4>
															</div>

															<div class="form-group">
																<h4 class="font-purple">النسبة</h4>
																<h4>{{ $ex->percentage->name }} ({{ $ex->percentage->value}}%)</h4>
															</div>

															<div class="form-group">
																<h4 class="font-purple">إجمالى المبلغ مع النسبة</h4>
																<h4>{{ $ex->value_plus_percentage }} ريال</h4>
															</div>

															<div class="form-group">
																<h4 class="font-purple">طريقة التحويل</h4>
																<h4>{{ $ex->transfer_method->name }}</h4>
															</div>

															<div class="form-group">
																<h4 class="font-purple">الحساب المحول منه</h4>
																<h4>{{ $ex->bank->name }}</h4>
															</div>

															<?php
																$month = $ex->date->format('M');
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
																	<h4 class="font-purple">تاريخ المصروف</h4>
																	<h4>{{ $ex->date->format('d') }} {{$ar_month}} {{ $ex->date->format('Y') }}</h4>
															</div>

															@if ($ex->remarks)
																<div class="form-group">
																	<h4 class="font-purple">ملاحظات</h4>
																	<h4>{{ $ex->remarks }}</h4>
																</div>
															@endif

															@if( $ex->attachement)
																<div class="form-group">
																	<h4 class="font-purple">الملف المرفق</h4>
																	<h4><a dir="rtl" href="{{ asset('storage/attachements/') }}/{{ $ex->attachement }}" download>{{ $ex->attachement }}</a></h4>
																</div>
															@endif
									
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">إغـلاق</button>
														</div>
													</div>
												</div>
										</div>
										<div class="modal fade" id="deleteExpense{{ $ex->id }}" tabindex="-1" role="basic" aria-hidden="true">
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
															متأكد أنك تريد حـذف المصروف {{ $ex->name }} ؟
											
														</div>
														<div class="modal-footer">
															<button type="button" class="btn dark btn-default" data-dismiss="modal">إغلاق</button>
															<a href="{{ route('deleteExpense', ['id' => $ex->id]) }}" class="btn btn-danger">حـذف</a>
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