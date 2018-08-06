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
							<span class="caption-subject bold uppercase">كل المستخدمين</span>
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
												أدوات التصفية
												<i class="mdi mdi-chevron-down mdi-24px"></i>
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
																المستخدمين
															</label>
														</div>

														<div>
															<input id="checkbox-3" class="checkbox-style" name="checkbox-3" type="checkbox">
															<label for="checkbox-3" class="checkbox-style-3-label">
																مقدم خدمة
															</label>
														</div>

														<div>
															<input id="checkbox-4" class="checkbox-style" name="checkbox-4" type="checkbox">
															<label for="checkbox-4" class="checkbox-style-3-label">
																عميل
															</label>
														</div>







														<div class="clearfix"></div>

														<div class="text-center margin-top-30">
															<button type="button" class="btn green">عـرض</button>
														</div>

													</div>
												</div>

											</div>
										</form>
									</div>
								</div>
							</div>

						</div>


						<div class="line visible-xs-block"></div>


						<div class="col-md-9 clearfix">

							<table class="table table-striped table-bordered table-hover dt-responsive grd_view" width="100%" id="sample_1">
								<thead>
									<tr>
										<th class="desktop">م</th>
										<th class="min-phone-l">اسم المستخدم</th>
										<th class="min-phone-l">النوع</th>
										<th class="desktop">التفاصيل</th>
									</tr>
								</thead>
								<tbody>
									@php
										$i = 1;
									@endphp
									@if($users)
										@foreach($users as $user)
											<tr>
												<td>{{ $i++ }}</td>
												<td>{{ $user->username }}</td>
												<td>مستخدم</td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown" data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li>
																<a href="#" class="font-purple">
																	<i class="icon-eye font-purple"></i> عـرض</a>
															</li>
															<li>
																<a href="#" class="font-blue">
																	<i class="icon-note font-blue"></i> تعديل</a>
															</li>
															<li>
																<a href="#basic" class="font-red" data-toggle="modal">
																	<i class="icon-trash font-red"></i> حـذف</a>
															</li>
															<li>
																<a href="#" class="font-green">
																	<i class="icon-cloud-download font-green"></i> تحميل</a>
															</li>
														</ul>
													</div>
												</td>
											</tr>
										@endforeach

										@foreach($clients as $client)
											<tr>
												<td>{{ $i++ }}</td>
												<td>{{ $client->name }}</td>
												<td>عميل</td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown" data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li>
																<a href="#" class="font-purple">
																	<i class="icon-eye font-purple"></i> عـرض</a>
															</li>
															<li>
																<a href="#" class="font-blue">
																	<i class="icon-note font-blue"></i> تعديل</a>
															</li>
															<li>
																<a href="#basic" class="font-red" data-toggle="modal">
																	<i class="icon-trash font-red"></i> حـذف</a>
															</li>
															<li>
																<a href="#" class="font-green">
																	<i class="icon-cloud-download font-green"></i> تحميل</a>
															</li>
														</ul>
													</div>
												</td>
											</tr>
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