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
								<span class="caption-subject bold uppercase">الإعدادات</span>
							</div>
							
							<div class="tools"> </div>
						</div>
						<div class="portlet-body">

							
						
							
									
									
						<div class="tabbable-line">
								<ul class="nav nav-tabs"><!-- nav-justified-->
									<li class="active">
										<a href="#tab_1" data-toggle="tab"> عام </a>
									</li>
									<li>
										<a href="#tab_2" data-toggle="tab"> حسابات الشركة </a>
									</li>
									<li>
										<a href="#tab_3" data-toggle="tab"> التحويلات </a>
									</li>
									<li>
										<a href="#tab_4" data-toggle="tab"> النسب </a>
									</li>
									<li>
										<a href="#tab_5" data-toggle="tab"> تقارير النسب </a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab_1">
										
										<div class="form-horizontal form-bordered">
											<div class="form-body">
											
												
												<div class="col-md-10 col-md-offset-1 col-xs-12">
												

												<div class="form-group">
													<label class="control-label col-md-2">شعار الموقع</label>
													<div class="col-md-8">
														<div class="fileinput fileinput-new" data-provides="fileinput">
															<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
																<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
															<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
															<div>
																<span class="btn default btn-file">
																	<span class="fileinput-new"> إختر صورة الشعار </span>
																	<span class="fileinput-exists"> تغيير </span>
																	<input type="file" name="..."> </span>
																<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> حذف </a>
															</div>
														</div>
													</div>
												</div>
												
												<div class="form-group">
													<label class="control-label col-md-2">عنوان النظام</label>
													<div class="col-md-10">
														<div class="input-icon">
															<i class="fa fa-dashboard font-green "></i>
															<input type="text" class="form-control" placeholder=""> 
														</div>
													</div>
												</div>
												
												
												

												
												
												</div>
												

											</div>
											
											<div class="col-md-4 col-sm-12">
												<fieldset>
												<legend class="font-purple">مهام مقدمين الخدمة</legend>
													<form action="{{ route('addTask')}}" method="post">
														@csrf
														<div class="form-group">
															<label>اسم المهمة </label>
															<div class="input-icon">
																<i class="fa fa-tasks font-green "></i>
																<input type="text" id="taskName" name="taskName" class="form-control" placeholder=""> 
															</div>
														</div>


														<div class="col-md-12">
															<div class="form-group text-center">

																<button type="submit" id="addTask" class="btn green margin-right-10">إضافة</button>

															</div>
														</div>
													</form>


													<div class="col-md-12">
												
													<div class="form-group">
													<div id="tasks-wrapper" class="table-responsive">
														<div id="tasks">
															<table class="table">
																<thead>
																	<tr>
																		<th> # </th>
																		<th> اسم المهمة </th>
																	</tr>
																</thead>
																<tbody>
																	@foreach($tasks as $task)
																		<tr>
																			<td>{{ $loop->iteration }}</td>
																			<td>{{ $task->name }}</td>
																		</tr>
																	@endforeach
																</tbody>
															</table>
														</div>
													</div>
													</div>

													</div>


												</fieldset> 
												</div>
												
												
												<div class="col-md-4 col-sm-12">
												<fieldset>
												<legend class="font-purple">نوع المصروف</legend>

													<div class="form-group">
													<label>نوع المصروف </label>
													<div class="input-icon">
														<i class="fa fa-money font-green "></i>
														<input type="text" class="form-control" placeholder=""> 
													</div>
													</div>


													<div class="col-md-12">
													<div class="form-group text-center">

													<button type="button" class="btn green margin-right-10">إضافة</button>

													</div>
													</div>


													<div class="col-md-12">
												
													<div class="form-group">
													<div class="table-responsive">
													<table class="table">
														<thead>
															<tr>
																<th> # </th>
																<th> نوع المصروف </th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td> 1 </td>
																<td> مشروع </td>
															</tr>
															<tr>
																<td> 2 </td>
																<td> خدمة </td>
															</tr>
															<tr>
																<td> 3 </td>
																<td> مكافئة </td>
															</tr>
														</tbody>
													</table>
													</div>
													</div>

													</div>


												</fieldset> 
												</div>
												
												
												<div class="col-md-4 col-sm-12">
												<fieldset>
												<legend class="font-purple">طرق التحويل</legend>
													<form action="{{ route('addTransferMethod')}}" method="post">
														@csrf
														<div class="form-group">
															<label>طريقة تحويل </label>
															<div class="input-icon">
																<i class="fa fa-random font-green "></i>
																<input name="transferMethodName" id="transferMethodName" type="text" class="form-control" placeholder=""> 
															</div>
														</div>


														<div class="col-md-12">
														<div class="form-group text-center">

															<button type="submit" id="addTransferMethod" class="btn green margin-right-10">إضافة</button>

															</div>
														</div>
													</form>

													<div class="col-md-12">
												
													<div id="transferMethods-wrapper" class="form-group">
														<div id="transferMethods" class="table-responsive">
														<table class="table">
															<thead>
																<tr>
																	<th> # </th>
																	<th> طريقة التحويل </th>
																</tr>
															</thead>
															<tbody>
																@foreach($transferMethods as $transferMethod)
																	<tr>
																		<td>{{ $loop->iteration }}</td>
																		<td>{{ $transferMethod->name }}</td>
																	</tr>
																@endforeach
															</tbody>
														</table>
														</div>
													</div>

													</div>


												</fieldset> 
												</div>
												
											<div class="col-md-6 col-md-offset-3 col-sm-12">
												<hr>
											</div>
											
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<a href="javascript:;" class="btn btn-lg green">
															<i class="fa fa-check"></i> موافـق</a>
													</div>
												</div>
											</div>
										</div>
										
										
										
									
									</div>
									<div class="tab-pane" id="tab_2">
										
										<div class="form-horizontal form-bordered">
										<div class="form-body">
												
												
												<div class="col-md-12">
												

												<div class="col-md-6 col-xs-12">
											<div class="form-group">
												<label class="control-label col-md-3">اسم البنك</label>
												<div class="col-md-9">
													<div class="input-icon">
														<i class="fa fa-bank font-green "></i>
														<input type="text" class="form-control" placeholder=""> 
													</div>
												</div>
											</div>
												</div>
												<div class="col-md-6 col-xs-12">
											<div class="form-group">
												<label class="control-label col-md-3">رقم الحساب</label>
												<div class="col-md-9">
													<div class="input-icon">
														<i class="fa fa-barcode font-green "></i>
														<input type="text" class="form-control" placeholder=""> 
													</div>
												</div>
											</div>
												</div>
												<div class="col-md-6 col-xs-12">
											<div class="form-group">
												<label class="control-label col-md-3">الرصيد الافتتاحى</label>
												<div class="col-md-9">
													<div class="input-icon">
														<i class="fa fa-money font-green "></i>
														<input type="text" class="form-control" placeholder=""> 
													</div>
												</div>
											</div>
												</div>
												<div class="col-md-6 col-xs-12">
											<div class="form-group">
												<label class="control-label col-md-3">رقم الأيبان</label>
												<div class="col-md-9">
													<div class="input-icon">
														<i class="fa fa-asterisk font-green "></i>
														<input type="text" class="form-control" placeholder=""> 
													</div>
												</div>
											</div>
												</div>
												<div class="col-md-6 col-xs-12">
											<div class="form-group">
												<label class="control-label col-md-3">اسم النسبة</label>
												<div class="col-md-9">
													<div class="input-icon">
														<i class="fa fa-bar-chart font-green "></i>
														<input type="text" class="form-control" placeholder=""> 
													</div>
												</div>
											</div>
												</div>
												<div class="col-md-6 col-xs-12">
											<div class="form-group">
												<label class="control-label col-md-3">قيمة النسبة</label>
												<div class="col-md-9">
													<div class="input-icon">
														<i class="fa fa-money font-green "></i>
														<input type="text" class="form-control" placeholder=""> 
													</div>
												</div>
											</div>	
												</div>
												
												
												</div>
											
											
										</div>
												
											<div class="form-actions">
												<div class="row">
													<div class="col-md-12 text-center">
														<a href="javascript:;" class="btn btn-lg green">
															<i class="fa fa-check"></i> موافـق</a>
													</div>
												</div>
											</div>
											
										</div>	
									
										<hr>
											
									
									<div class="row margin-top-40">
										
										<div class="col-md-4">
											<div class="portlet mt-element-ribbon bg-grey-steel portlet-fit ">
												<div class="ribbon ribbon-right ribbon-shadow ribbon-color-success">
													<div class="ribbon-sub ribbon-right"></div>
														562-525-251 
												</div>
												<div class="portlet-title">
													<div class="caption">
														<i class="fa fa-bank font-green"></i>
														<span class="caption-subject font-green bold uppercase">بنك الراجحى</span>
													</div>
												</div>
												<div class="portlet-body bnk">
													10000 ريال
												</div>
												<a class="more" href="javascript:;"> التفاصيل
													<i class="m-icon-swapleft m-icon-dark"></i>
												</a>
											</div>
										</div>
										<div class="col-md-4">
											<div class="portlet mt-element-ribbon bg-grey-steel portlet-fit ">
												<div class="ribbon ribbon-right ribbon-shadow ribbon-color-success">
													<div class="ribbon-sub ribbon-right"></div>
														562-525-251 
												</div>
												<div class="portlet-title">
													<div class="caption">
														<i class="fa fa-bank font-green"></i>
														<span class="caption-subject font-green bold uppercase">بنك مصـر</span>
													</div>
												</div>
												<div class="portlet-body bnk">
													10000 ريال
												</div>
												<a class="more" href="javascript:;"> التفاصيل
													<i class="m-icon-swapleft m-icon-dark"></i>
												</a>
											</div>
										</div>
										<div class="col-md-4">
											<div class="portlet mt-element-ribbon bg-grey-steel portlet-fit ">
												<div class="ribbon ribbon-right ribbon-shadow ribbon-color-success">
													<div class="ribbon-sub ribbon-right"></div>
														562-525-251 
												</div>
												<div class="portlet-title">
													<div class="caption">
														<i class="fa fa-bank font-green "></i>
														<span class="caption-subject font-green bold uppercase">بنك الراجحى</span>
													</div>
												</div>
												<div class="portlet-body bnk">
													10000 ريال
												</div>
												<a class="more" href="javascript:;"> التفاصيل
													<i class="m-icon-swapleft m-icon-dark"></i>
												</a>
											</div>
										</div>
										
									</div>
									
									
									
									</div>
									<div class="tab-pane" id="tab_3">
										
										
									<div class="row">
									<div class="col-md-10 col-md-offset-1 col-xs-12">
									<div class="col-md-6 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-3 no-margin margin-top-5">حول من بنك <span>*</span></label>
											<div class="col-md-9">
												<select class="form-control select2 ">
													<option></option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
												</select>
											</div>
										<div class="clearfix"></div>
										</div>
									</div>
									<div class="col-md-6 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-3 no-margin margin-top-5">الى بنك <span>*</span></label>
											<div class="col-md-9">
												<select class="form-control select2 ">
													<option></option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
												</select>
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
												<select class="form-control select2 ">
													<option></option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
												</select>
											</div>
										<div class="clearfix"></div>
										</div>
									</div>
									<div class="col-md-6 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-3 no-margin margin-top-5">رقم حسابه <span>*</span></label>
											<div class="col-md-9">
												<select class="form-control select2 ">
													<option></option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
												</select>
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
													<input type="text" class="form-control" placeholder=""> 
												</div>
											</div>
										<div class="clearfix"></div>
										</div>
									</div>
									<div class="col-md-4 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-5 no-margin margin-top-5">اقتطاع نسبه </label>
											<div class="col-md-7">
												<select class="form-control select2 select-hide" style="width: 100%;">
													<option>-- إختر --</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
												</select>
											</div>
										<div class="clearfix"></div>
										</div>
									</div>
									<div class="col-md-4 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-5 no-margin margin-top-5">صافى المبلغ </label>
											<div class="col-md-7">
												<div class="input-icon">
													<i class="fa fa-money font-green "></i>
													<input type="text" class="form-control" placeholder="" disabled> 
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
														<input type="file" name="..."> </span>
													<a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> حذف </a>
												</div>
												</div>
											</div>
											<div class="clearfix"></div>
										</div>
										</div> 
									
												
										<div class="row">
											<div class="col-md-6 col-md-offset-3 col-sm-12 text-center">
												<a href="javascript:;" class="btn btn-lg green">
													<i class="fa fa-check"></i> حـول</a>
											</div>
										</div>
			
									<hr>

									<h4 class="text-center font-purple margin-bottom-5 no-margin">
										التحويلات السابقة
									</h4>
									
									<div class="row">
									<div class="col-md-12 text-center"><hr style="width: 20%;margin: 5px auto 20px auto;"></div>
									</div>
									
									<div class="row">
							
							
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
										<input id="checkbox-1" class="checkbox-style" name="checkbox-1" type="checkbox" checked>
										<label for="checkbox-1" class="checkbox-style-3-label">
											اى وقت
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
										<input id="checkbox-2" class="checkbox-style" name="checkbox-2" type="checkbox">
										<label for="checkbox-2" class="checkbox-style-3-label">
											جميع تحويلات بنك
										</label>
										<div class="col-md-12">
										<select class="form-control select2 " multiple>
											<option>-- إختر --</option>
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
									
									<div class="table-responsive">
										<table class="table table-striped table-bordered table-hover dt-responsive grd_view" width="100%" id="sample_1">
										<thead>
											<tr>
												<th class="desktop no-padding">م</th>
												<th class="min-phone-l">البنك المحول منه</th>
												<th class="min-phone-l">البنك المحول اليه</th>
												<th class="desktop">النسبة</th>
												<th class="desktop">المبلغ</th>
												<th class="desktop">التاريخ</th>
												<th class="desktop">التفاصيل</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>بنك الراجحى</td>
												<td>بنك مصر</td>
												<td>20 ريال</td>
												<td>1000 ريال</td>
												<td>15 يناير 2015</td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
															<li><a href="#" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
															<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
															<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
														</ul>
													</div>
												</td>
											</tr>
											<tr>
												<td>2</td>
												<td>بنك الراجحى</td>
												<td>بنك مصر</td>
												<td>20 ريال</td>
												<td>1000 ريال</td>
												<td>15 يناير 2015</td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
															<li><a href="#" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
															<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
															<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
														</ul>
													</div>
												</td>
											</tr>
											<tr>
												<td>3</td>
												<td>بنك الراجحى</td>
												<td>بنك مصر</td>
												<td>20 ريال</td>
												<td>1000 ريال</td>
												<td>15 يناير 2015</td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
															<li><a href="#" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
															<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
															<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
														</ul>
													</div>
												</td>
											</tr>
											<tr>
												<td>4</td>
												<td>بنك الراجحى</td>
												<td>بنك مصر</td>
												<td>20 ريال</td>
												<td>1000 ريال</td>
												<td>15 يناير 2015</td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
															<li><a href="#" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
															<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
															<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
														</ul>
													</div>
												</td>
											</tr>
											<tr>
												<td>5</td>
												<td>بنك الراجحى</td>
												<td>بنك مصر</td>
												<td>20 ريال</td>
												<td>1000 ريال</td>
												<td>15 يناير 2015</td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
															<li><a href="#" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
															<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
															<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
														</ul>
													</div>
												</td>
											</tr>
											<tr>
												<td>6</td>
												<td>بنك الراجحى</td>
												<td>بنك مصر</td>
												<td>20 ريال</td>
												<td>1000 ريال</td>
												<td>15 يناير 2015</td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
															<li><a href="#" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
															<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
															<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
														</ul>
													</div>
												</td>
											</tr>
											<tr>
												<td>7</td>
												<td>بنك الراجحى</td>
												<td>بنك مصر</td>
												<td>20 ريال</td>
												<td>1000 ريال</td>
												<td>15 يناير 2015</td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
															<li><a href="#" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
															<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
															<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
														</ul>
													</div>
												</td>
											</tr>
											<tr>
												<td>8</td>
												<td>بنك الراجحى</td>
												<td>بنك مصر</td>
												<td>20 ريال</td>
												<td>1000 ريال</td>
												<td>15 يناير 2015</td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
															<li><a href="#" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
															<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
															<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
														</ul>
													</div>
												</td>
											</tr>
											<tr>
												<td>9</td>
												<td>بنك الراجحى</td>
												<td>بنك مصر</td>
												<td>20 ريال</td>
												<td>1000 ريال</td>
												<td>15 يناير 2015</td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
															<li><a href="#" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
															<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
															<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
														</ul>
													</div>
												</td>
											</tr>
											<tr>
												<td>10</td>
												<td>بنك الراجحى</td>
												<td>بنك مصر</td>
												<td>20 ريال</td>
												<td>1000 ريال</td>
												<td>15 يناير 2015</td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
															<li><a href="#" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
															<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
															<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
														</ul>
													</div>
												</td>
											</tr>
											<tr>
												<td>11</td>
												<td>بنك الراجحى</td>
												<td>بنك مصر</td>
												<td>20 ريال</td>
												<td>1000 ريال</td>
												<td>15 يناير 2015</td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
															<li><a href="#" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
															<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
															<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
														</ul>
													</div>
												</td>
											</tr>
											<tr>
												<td>12</td>
												<td>بنك الراجحى</td>
												<td>بنك مصر</td>
												<td>20 ريال</td>
												<td>1000 ريال</td>
												<td>15 يناير 2015</td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
															<li><a href="#" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
															<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
															<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
														</ul>
													</div>
												</td>
											</tr>
											<tr>
												<td>13</td>
												<td>بنك الراجحى</td>
												<td>بنك مصر</td>
												<td>20 ريال</td>
												<td>1000 ريال</td>
												<td>15 يناير 2015</td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
															<li><a href="#" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
															<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
															<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
														</ul>
													</div>
												</td>
											</tr>
											<tr>
												<td>14</td>
												<td>بنك الراجحى</td>
												<td>بنك مصر</td>
												<td>20 ريال</td>
												<td>1000 ريال</td>
												<td>15 يناير 2015</td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
															<li><a href="#" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
															<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
															<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
														</ul>
													</div>
												</td>
											</tr>
											<tr>
												<td>15</td>
												<td>بنك الراجحى</td>
												<td>بنك مصر</td>
												<td>20 ريال</td>
												<td>1000 ريال</td>
												<td>15 يناير 2015</td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
															<li><a href="#" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
															<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
															<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
														</ul>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
									</div>
									

									</div>
							
									<div class="clearfix"></div>
							
									</div>
									
									
									
									
									</div>
									<div class="tab-pane" id="tab_4">
										
										
									<div class="form-horizontal form-bordered">
										<div class="form-body">

												<div class="col-md-10 col-md-offset-1 col-xs-12">
												
												
											<div class="form-group">
												<label class="control-label col-md-3">اسم النسبة</label>
												<div class="col-md-6">
													<div class="input-icon">
														<i class="fa fa-calculator font-green "></i>
														<input type="text" class="form-control" placeholder=""> 
													</div>
												</div>
											</div>
												
											<div class="form-group">
												<label class="control-label col-md-3">القيمة</label>
												<div class="col-md-6">
													<div class="input-icon">
														<i class="fa fa-money font-green "></i>
														<input type="text" class="form-control" placeholder=""> 
													</div>
												</div>
											</div>
											
											<div class="form-group">
												<label class="control-label col-md-3">ملاحظات</label>
												<div class="col-md-6">
													<textarea class="form-control" rows="5"></textarea>
												</div>
											</div>
									
									
												</div>
									
									

										</div>
												
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-1 col-md-10 text-center">
														<a href="javascript:;" class="btn btn-lg green">
															<i class="fa fa-check"></i> إضـافة</a>
													</div>
												</div>
											</div>
									</div>
			
									<hr>

									<h4 class="text-center font-purple margin-bottom-5 no-margin">
										جميع النسب
									</h4>
									
									<div class="row">
									<div class="col-md-12 text-center"><hr style="width: 20%;margin: 5px auto 20px auto;"></div>
									</div>
									
									<div class="row">
																
									<div class="col-md-8 col-md-offset-2 col-xs-12 clearfix">
									
									<div class="table-responsive">
										<table class="table table-striped table-bordered table-hover dt-responsive grd_view" width="100%" id="sample_1">
										<thead>
											<tr>
												<th class="desktop no-padding">م</th>
												<th class="min-phone-l">اسم النسبة</th>
												<th class="min-phone-l">قيمة النسبة</th>
												<th class="desktop">التفاصيل</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>نسبة تشغيلية</td>
												<td>10%</td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
															<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
														</ul>
													</div>
												</td>
											</tr>
											<tr>
												<td>2</td>
												<td>عمولة</td>
												<td>10%</td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
															<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
														</ul>
													</div>
												</td>
											</tr>
											<tr>
												<td>3</td>
												<td>عمولة</td>
												<td>10%</td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
															<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
														</ul>
													</div>
												</td>
											</tr>
											<tr>
												<td>4</td>
												<td>عمولة</td>
												<td>10%</td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
															<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
														</ul>
													</div>
												</td>
											</tr>
											<tr>
												<td>5</td>
												<td>عمولة</td>
												<td>10%</td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
															<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
														</ul>
													</div>
												</td>
											</tr>
											<tr>
												<td>6</td>
												<td>عمولة</td>
												<td>10%</td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
															<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
														</ul>
													</div>
												</td>
											</tr>
											<tr>
												<td>7</td>
												<td>عمولة</td>
												<td>10%</td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
															<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
														</ul>
													</div>
												</td>
											</tr>
											<tr>
												<td>8</td>
												<td>عمولة</td>
												<td>10%</td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
															<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
														</ul>
													</div>
												</td>
											</tr>
											<tr>
												<td>9</td>
												<td>عمولة</td>
												<td>10%</td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
															<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
														</ul>
													</div>
												</td>
											</tr>
											<tr>
												<td>10</td>
												<td>عمولة</td>
												<td>10%</td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
															<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
														</ul>
													</div>
												</td>
											</tr>
											<tr>
												<td>11</td>
												<td>عمولة</td>
												<td>10%</td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
															<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
														</ul>
													</div>
												</td>
											</tr>
											<tr>
												<td>12</td>
												<td>عمولة</td>
												<td>10%</td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
															<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
														</ul>
													</div>
												</td>
											</tr>
											<tr>
												<td>13</td>
												<td>عمولة</td>
												<td>10%</td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
															<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
														</ul>
													</div>
												</td>
											</tr>
											<tr>
												<td>14</td>
												<td>عمولة</td>
												<td>10%</td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
															<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
														</ul>
													</div>
												</td>
											</tr>
											<tr>
												<td>15</td>
												<td>عمولة</td>
												<td>10%</td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
															<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
														</ul>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
									</div>
									
									</div>
							
									<div class="clearfix"></div>
							
									</div>
									
									
									
									
									
									</div>
									<div class="tab-pane" id="tab_5">
										
										
									
									
									<div class="row">
							
							
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
										<input id="checkbox-1" class="checkbox-style" name="checkbox-1" type="checkbox" checked>
										<label for="checkbox-1" class="checkbox-style-3-label">
											اى وقت
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
										<input id="checkbox-222" class="checkbox-style" name="checkbox-222" type="checkbox">
										<label for="checkbox-222" class="checkbox-style-3-label">
											جميع نسب مشروع
										</label>
										<div class="col-md-12">
										<select class="form-control select2 " multiple>
											<option>-- إختر --</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
										</select>
										</div>
									</div>
									

									<div>
										<input id="checkbox-333" class="checkbox-style" name="checkbox-333" type="checkbox">
										<label for="checkbox-333" class="checkbox-style-3-label">
											جميع نسب عميل
										</label>
										<div class="col-md-12">
										<select class="form-control select2 " multiple>
											<option>-- إختر --</option>
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
									
									<div class="table-responsive margin-top-40">
										<table class="table table-striped table-bordered table-hover dt-responsive grd_view" width="100%" id="sample_1">
										<thead>
											<tr>
												<th class="desktop no-padding">م</th>
												<th class="min-phone-l">اسم المشروع</th>
												<th class="min-phone-l">اسم العميل</th>
												<th class="desktop">نوع النسبة</th>
												<th class="desktop">قيمة النسبة</th>
												<th class="desktop">التفاصيل</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>تطبيق مياه</td>
												<td>احمد على</td>
												<td>عمولة</td>
												<td>100 ريال</td>
												<td class="text-center">
													<a class="btn btn-sm purple btn-outline" href="#"> عـرض
														<i class="icon-eye"></i>
													</a>
												</td>
											</tr>
											<tr>
												<td>2</td>
												<td>تطبيق مياه</td>
												<td>احمد على</td>
												<td>عمولة</td>
												<td>100 ريال</td>
												<td class="text-center">
													<a class="btn btn-sm purple btn-outline" href="#"> عـرض
														<i class="icon-eye font-purple"></i>
													</a>
												</td>
											</tr>
											<tr>
												<td>3</td>
												<td>تطبيق مياه</td>
												<td>احمد على</td>
												<td>عمولة</td>
												<td>100 ريال</td>
												<td class="text-center">
													<a class="btn btn-sm purple btn-outline" href="#"> عـرض
														<i class="icon-eye font-purple"></i>
													</a>
												</td>
											</tr>
											<tr>
												<td>4</td>
												<td>تطبيق مياه</td>
												<td>احمد على</td>
												<td>عمولة</td>
												<td>100 ريال</td>
												<td class="text-center">
													<a class="btn btn-sm purple btn-outline" href="#"> عـرض
														<i class="icon-eye font-purple"></i>
													</a>
												</td>
											</tr>
											<tr>
												<td>5</td>
												<td>تطبيق مياه</td>
												<td>احمد على</td>
												<td>عمولة</td>
												<td>100 ريال</td>
												<td class="text-center">
													<a class="btn btn-sm purple btn-outline" href="#"> عـرض
														<i class="icon-eye font-purple"></i>
													</a>
												</td>
											</tr>
											<tr>
												<td>6</td>
												<td>تطبيق مياه</td>
												<td>احمد على</td>
												<td>عمولة</td>
												<td>100 ريال</td>
												<td class="text-center">
													<a class="btn btn-sm purple btn-outline" href="#"> عـرض
														<i class="icon-eye font-purple"></i>
													</a>
												</td>
											</tr>
											<tr>
												<td>7</td>
												<td>تطبيق مياه</td>
												<td>احمد على</td>
												<td>عمولة</td>
												<td>100 ريال</td>
												<td class="text-center">
													<a class="btn btn-sm purple btn-outline" href="#"> عـرض
														<i class="icon-eye font-purple"></i>
													</a>
												</td>
											</tr>
											<tr>
												<td>8</td>
												<td>تطبيق مياه</td>
												<td>احمد على</td>
												<td>عمولة</td>
												<td>100 ريال</td>
												<td class="text-center">
													<a class="btn btn-sm purple btn-outline" href="#"> عـرض
														<i class="icon-eye font-purple"></i>
													</a>
												</td>
											</tr>
											<tr>
												<td>9</td>
												<td>تطبيق مياه</td>
												<td>احمد على</td>
												<td>عمولة</td>
												<td>100 ريال</td>
												<td class="text-center">
													<a class="btn btn-sm purple btn-outline" href="#"> عـرض
														<i class="icon-eye font-purple"></i>
													</a>
												</td>
											</tr>
											<tr>
												<td>10</td>
												<td>تطبيق مياه</td>
												<td>احمد على</td>
												<td>عمولة</td>
												<td>100 ريال</td>
												<td class="text-center">
													<a class="btn btn-sm purple btn-outline" href="#"> عـرض
														<i class="icon-eye font-purple"></i>
													</a>
												</td>
											</tr>
											<tr>
												<td>11</td>
												<td>تطبيق مياه</td>
												<td>احمد على</td>
												<td>عمولة</td>
												<td>100 ريال</td>
												<td class="text-center">
													<a class="btn btn-sm purple btn-outline" href="#"> عـرض
														<i class="icon-eye font-purple"></i>
													</a>
												</td>
											</tr>
											<tr>
												<td>12</td>
												<td>تطبيق مياه</td>
												<td>احمد على</td>
												<td>عمولة</td>
												<td>100 ريال</td>
												<td class="text-center">
													<a class="btn btn-sm purple btn-outline" href="#"> عـرض
														<i class="icon-eye font-purple"></i>
													</a>
												</td>
											</tr>
											<tr>
												<td>13</td>
												<td>تطبيق مياه</td>
												<td>احمد على</td>
												<td>عمولة</td>
												<td>100 ريال</td>
												<td class="text-center">
													<a class="btn btn-sm purple btn-outline" href="#"> عـرض
														<i class="icon-eye font-purple"></i>
													</a>
												</td>
											</tr>
											<tr>
												<td>14</td>
												<td>تطبيق مياه</td>
												<td>احمد على</td>
												<td>عمولة</td>
												<td>100 ريال</td>
												<td class="text-center">
													<a class="btn btn-sm purple btn-outline" href="#"> عـرض
														<i class="icon-eye font-purple"></i>
													</a>
												</td>
											</tr>
											<tr>
												<td>15</td>
												<td>تطبيق مياه</td>
												<td>احمد على</td>
												<td>عمولة</td>
												<td>100 ريال</td>
												<td class="text-center">
													<a class="btn btn-sm purple btn-outline" href="#"> عـرض
														<i class="icon-eye font-purple"></i>
													</a>
												</td>
											</tr>
										</tbody>
									</table>
									</div>
									

									</div>
							
									<div class="clearfix"></div>
							
									</div>
									
									
									
									
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

