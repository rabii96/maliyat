@extends('layouts.base')

@section('content')
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<!-- BEGIN CONTENT BODY -->
		<div class="page-content">
			
			<a href="{{ route('addExpense') }}"><button type="button" class="btn blue-hoki pull-right">إضافة مصروف</button></a>
			
			@include('includes.pageHeader')
			<!-- BEGIN DASHBOARD STATS 1-->
			<div class="row clearfix">
				<div class="col-md-12">
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
						
						<div class="filters__label filters__label--vertical">
						<input id="checkbox-0" class="checkbox-style" name="checkbox-0" type="checkbox" checked>
						<label for="checkbox-0" class="checkbox-style-3-label">
						إختر الكل
						</label>
						</div>
						
						<div class="filters__section-content">

						<div>
							<input id="checkbox-1" class="checkbox-style" name="checkbox-1" type="checkbox" checked>
							<label for="checkbox-1" class="checkbox-style-3-label">
								الكل
							</label>
						</div>

						<div>
							<input id="checkbox-2" class="checkbox-style" name="checkbox-2" type="checkbox">
							<label for="checkbox-2" class="checkbox-style-3-label">
								مصاريف المشاريع
							</label>
						</div>

						<div>
							<input id="checkbox-3" class="checkbox-style" name="checkbox-3" type="checkbox">
							<label for="checkbox-3" class="checkbox-style-3-label">
								مصاريف المدفوعات
							</label>
						</div>

						<div>
							<input id="checkbox-4" class="checkbox-style" name="checkbox-4" type="checkbox">
							<label for="checkbox-4" class="checkbox-style-3-label">
								مصاريف الخدمات
							</label>
						</div>

						<div>
							<input id="checkbox-5" class="checkbox-style" name="checkbox-5" type="checkbox">
							<label for="checkbox-5" class="checkbox-style-3-label">
								المصاريف التشغيلية
							</label>
						</div>

						<div>
							<input id="checkbox-6" class="checkbox-style" name="checkbox-6" type="checkbox">
							<label for="checkbox-6" class="checkbox-style-3-label">
								مكافئات
							</label>
							</div>

						<div>
							<input id="checkbox-7" class="checkbox-style" name="checkbox-7" type="checkbox">
							<label for="checkbox-7" class="checkbox-style-3-label">
								عمولات
							</label>
						</div>

						<div>
							<input id="checkbox-8" class="checkbox-style" name="checkbox-8" type="checkbox">
							<label for="checkbox-8" class="checkbox-style-3-label">
								حوافز
							</label>
						</div>

						<div class="col-md-12">
							<hr>
						</div>
						
						<div>
							<input id="checkbox-20" class="checkbox-style" name="checkbox-20" type="checkbox">
							<label for="checkbox-20" class="checkbox-style-3-label">
								اخر اسبوع
							</label>
						</div>

						<div>
							<input id="checkbox-30" class="checkbox-style" name="checkbox-30" type="checkbox">
							<label for="checkbox-30" class="checkbox-style-3-label">
								اخر شهر
							</label>
						</div>

						<div>
							<input id="checkbox-40" class="checkbox-style" name="checkbox-40" type="checkbox">
							<label for="checkbox-40" class="checkbox-style-3-label">
								اخر سنة
							</label>
						</div>
						

						<div class="col-md-12">
							<hr>
						</div>

						<div>
							<input id="checkbox-10" class="checkbox-style" name="checkbox-10" type="checkbox">
							<label for="checkbox-10" class="checkbox-style-3-label">
								فترة محددة
							</label>
							<div class="col-md-12">
								<input type="text" class="form-control date" name="from" placeholder="من تاريخ">
							</div>
							<hr>
							<div class="col-md-12">
								<input type="text" class="form-control date" name="to" placeholder="إلى تاريخ">
							</div>
						</div>

					
						<div class="col-md-12">
							<hr>
						</div>
						
						<div>
							<input id="checkbox-11" class="checkbox-style" name="checkbox-11" type="checkbox">
							<label for="checkbox-11" class="checkbox-style-3-label">
								جميع مصاريف مشروع
							</label>
							<div class="col-md-12">
								<select id="single" class="form-control select2 " multiple>
									<option></option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
								</select>
							</div>
						</div>

					
						<div class="col-md-12">
							<hr>
						</div>
						
						<div>
							<input id="checkbox-12" class="checkbox-style" name="checkbox-12" type="checkbox">
							<label for="checkbox-12" class="checkbox-style-3-label">
								جميع مصاريف عميل
							</label>
							<div class="col-md-12">
								<select id="single0" class="form-control select2 " multiple>
									<option></option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
								</select>
							</div>
						</div>
						

						<div class="clearfix"></div>
							
						<div class="text-center margin-top-30">
							<button type="button" class="btn green">عـرض</button>
						</div>

						</div>
						</div>

						</div></form></div></div>
						</div>

							</div>
							
							
						<div class="line visible-xs-block"></div>

							
						<div class="col-md-9 clearfix">

						<table class="table table-striped table-bordered table-hover dt-responsive grd_view" width="100%" id="sample_1">
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
												@if($ex->project)
													مشروع
												@else
													خدمة
												@endif
											
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
											<td class="text-center">
												<div class="btn-group">
													<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
														<i class="fa fa-angle-down"></i>
													</a>
													<ul class="dropdown-menu pull-right">
														<li>
															<a class="font-purple" data-toggle="modal" data-target="#showExpense{{ $ex->id }}">
															<i class="icon-eye font-purple"></i> عـرض</a>
														</li>														
														<li><a href="#" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
														<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
														<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
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
																	<h4 class="font-purple">تاريخ المصروف</h41>
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