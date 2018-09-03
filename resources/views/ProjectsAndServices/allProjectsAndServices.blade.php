@extends('layouts.base')

@section('content')
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<!-- BEGIN CONTENT BODY -->
		<div class="page-content">
			
			<a href="{{ route('addService') }}"><button type="button" class="btn blue-hoki pull-right">إضافة خدمة</button></a>
			<a href="{{ route('addProject') }}"><button type="button" class="btn blue-madison pull-right margin-right-10">إضافة مشروع</button></a>
			
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
								<span class="caption-subject bold uppercase">كل المشاريع والخدمات</span>
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
						<input id="selectAll" class="checkbox-style" name="selectAll" value="0" checked type="checkbox">
						<label for="selectAll" class="checkbox-style-3-label">
						إختر الكل
						</label>
						</div>
						
						<div class="filters__section-content">

						
						<div>
							<input id="projects" class="checkbox-style" name="filter[]" value="مشروع" type="checkbox" checked>
							<label for="projects" class="checkbox-style-3-label">
								المشاريع
							</label>
						</div>

						<div>
							<input id="services" class="checkbox-style" name="filter[]" value="خدمة" type="checkbox" checked>
							<label for="services" class="checkbox-style-3-label">
								الخدمات
							</label>
						</div>

						<div>
							<input id="winning" class="checkbox-style" name="financialState[]" value="winning" checked type="checkbox">
							<label for="winning" class="checkbox-style-3-label">
								المشاريع الناجحة
							</label>
						</div>

						<div>
							<input id="losing" class="checkbox-style" name="financialState[]" value="losing" checked type="checkbox">
							<label for="losing" class="checkbox-style-3-label">
								المشاريع الخاسرة
							</label>
						</div>

						<div>
							<input id="equal" class="checkbox-style" name="financialState[]" value="equal" checked type="checkbox">
							<label for="equal" class="checkbox-style-3-label">
								المشاريع المتعادلة
							</label>
						</div>
						
						<div class="col-md-12">
							<hr>
						</div>
						

						<div>
							<input id="any_time" class="checkbox-style" name="time" id="any_time" value="any_time" type="radio" checked>
							<label for="any_time" class="checkbox-style-3-label">
								اى وقت
							</label>
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
							<input id="finished" class="checkbox-style" name="state[]" value="finished" checked type="checkbox">
							<label for="finished" class="checkbox-style-3-label">
								المنتهية
							</label>
						</div>

						<div>
							<input id="unfinished" class="checkbox-style" name="state[]" value="unfinished" checked type="checkbox">
							<label for="unfinished" class="checkbox-style-3-label">
								الجارية
							</label>
						</div>

						<div class="clearfix"></div>
							
						<div class="text-center margin-top-30">
							<button onclick="applyFilters()" type="button" class="btn green">عـرض</button>
						</div>

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

							$('#limited_time').on('click',function(){
								$('#from').removeAttr('disabled');
								$('#to').removeAttr('disabled');
							});
							$('#any_time').on('click',function(){
								$('#from').val('');
								$('#from').attr('disabled','disabled');
								$('#to').val('');
								$('#to').attr('disabled','disabled');
							});

							function applyFilters(){
								var table = $('#projectsAndServices_table').DataTable();
								table.draw();
							}

							$('#selectAll').on('change', function(){
								if($('#selectAll').val() == '1'){
									$("input[name='filter[]']:not(:checked)").each(function(){
										$(this).trigger('click').trigger('change');
									});
									$("input[name='financialState[]']:not(:checked)").each(function(){
										$(this).trigger('click').trigger('change');
									});
									$("input[name='state[]']:not(:checked)").each(function(){
										$(this).trigger('click').trigger('change');
									});
									$('#selectAll').val('0');
								}else{
									$("input[name='filter[]']:checked").each(function(){
										$(this).trigger('click').trigger('change');
									});
									$("input[name='financialState[]']:checked").each(function(){
										$(this).trigger('click').trigger('change');
									});
									$("input[name='state[]']:checked").each(function(){
										$(this).trigger('click').trigger('change');
									});
									$('#selectAll').val('1');
								}
							});


							$.fn.dataTable.ext.search.push(
								function( settings, data, dataIndex ) {
									var filters = [];
									var state = [];
									var financialState = [];
									var time = $("input[name='time']:checked" ).val();
									var test = true;
									var typeMatches = true;
									var stateMatches = true;
									var financialStateMatches = true;
									var inRange = true;
									$("input[name='filter[]']:checked").each(function(){
										filters.push($(this).val());
									});
									var type = data[4] ;
							
									if ( jQuery.inArray(type,filters) !== -1)
									{
										typeMatches = true;
									}else{
										typeMatches = false;
									}

									$("input[name='state[]']:checked").each(function(){
										state.push($(this).val());
									});
									var finished = data[1] ;
							
									if ( jQuery.inArray(finished,state) !== -1)
									{
										stateMatches = true;
									}else{
										stateMatches = false;
									}

									$("input[name='financialState[]']:checked").each(function(){
										financialState.push($(this).val());
									});
									financialState.push(' ');
									var fstate = data[5] ;
							
									if ( jQuery.inArray(fstate,financialState) !== -1)
									{
										financialStateMatches = true;
									}else{
										financialStateMatches = false;
									}
									var date = data[6];
									if(time == 'any_time'){
										inRange = true;
									}else{
										inRange = false;
										if((from == '')&&(to == '')){
											inRange = true;
										}else if(from == ''){
											if	(
													(moment(date).isBefore(to)) || 
													(moment(date).isSame(to))
												)
											{
												inRange = true;
											}
										}else if(to == ''){
											if	(
													(moment(date).isAfter(from)) || 
													(moment(date).isSame(from))
												)
											{
												inRange = true;
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
												inRange = true;
											}
										}
									}


									test = typeMatches && stateMatches && financialStateMatches && inRange;
									return test;
								}
							);

							
						</script>
					
								</form>
							</div>
						</div>
						</div>

							</div>
							
							
						<div class="line visible-xs-block"></div>

							
						<div class="col-md-9 clearfix">

						<table class="table table-striped table-bordered table-hover dt-responsive grd_view" width="100%" id="projectsAndServices_table">
							<thead>
								<tr>
									<th class="desktop">م</th>
									<th class="all no-padding"></th>
									<th class="min-phone-l">الإسم</th>
									<th class="min-phone-l">الرقم</th>
									<th class="min-tablet">النوع</th>
									<th class="none">العميل</th>
									<th class="desktop">التفاصيل</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i = 1;
								?>
								@if($projects)
									@foreach($projects as $project)
										<tr>
											<td>{{ $i++ }}</td>
											<td data-search="{{ $project->finished==true ? 'finished' : 'unfinished' }}" class="p-relative">
												@if($project->finished == true)
													<div class="por-indicator bg-red"><p class="hidden">finished</p></div>
												@else
													<div class="por-indicator bg-default"><p class="hidden">unfinished</p></div>
												@endif
											</td>
											<td>{{ $project->name }}</td>
											<td>{{ $project->id }}</td>
											<td>مشروع</td>
											@php
												$projectFinancialState = '';
												$project_exp = 0;
												$project_rp = 0;
												foreach ($project->expenses as $ex) {
													$project_exp += $ex->value_plus_percentage ;
												}
												foreach ($project->real_payments as $rp){
													$project_rp += $rp->paid_value;
												}
												$project_net = $project_rp - $project_exp;
												if($project_net>0){
													$projectFinancialState = 'winning';
												}else if($project_net<0){
													$projectFinancialState = "losing";
												}else{
													$projectFinancialState = "equal";
												}
											@endphp		
											<td data-search="{{ $projectFinancialState }}">{{ $project->client->name }}</td>
											<td data-search="{{ $project->created_at->format('m/d/Y') }}" class="text-center">
												<div class="btn-group">
													<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown" data-close-others="true"> إخـتر الأمـر
														<i class="fa fa-angle-down"></i>
													</a>
													<ul class="dropdown-menu pull-right bg-grey-cararra">
														<li><a href="{{ route('projectDetails', ['id' => $project->id]) }}" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
														<li><a href="{{ route('editProject', ['id' => $project->id]) }}" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
														<li>
															<a href="#deleteProject{{ $project->id }}" class="font-red" data-toggle="modal">
															<i class="icon-trash font-red"></i> حـذف</a>
														</li>
														<li>
															<a href="{{ route('downloadProject', ['id' => $project->id]) }}" class="font-green">
															<i class="icon-cloud-download font-green"></i> تحميل</a>
														</li>	
													</ul>
												</div>
											</td>
										</tr>
										<div class="modal fade" id="deleteProject{{ $project->id }}" tabindex="-1" role="basic" aria-hidden="true">
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
														متأكد أنك تريد حـذف المشروع {{ $project->name }} ؟
										
													</div>
													<div class="modal-footer">
														<button type="button" class="btn dark btn-default" data-dismiss="modal">إغلاق</button>
														<a href="{{ route('deleteProject', ['id' => $project->id]) }}" class="btn btn-danger">حـذف</a>
													</div>
												</div>
												<!-- /.modal-content -->
											</div>
											<!-- /.modal-dialog -->
									</div>
									@endforeach
								@endif

								@if($services)
									@foreach($services as $service)
										<tr>
											<td>{{ $i++ }}</td>
											<td data-search="{{ $service->finished==true ? 'finished' : 'unfinished' }}" class="p-relative">
												@if($service->finished == true)
													<div class="por-indicator bg-red"><p class="hidden">finished</p></div>
												@else
													<div class="por-indicator bg-default"><p class="hidden">unfinished</p></div>
												@endif
											</td>
											<td>{{ $service->name }}</td>
											<td>{{ $service->id }}</td>
											<td>خدمة</td>
											<td data-search=" "></td>
											<td data-search="{{ $service->created_at->format('m/d/Y') }}" class="text-center">
												<div class="btn-group">
													<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown" data-close-others="true"> إخـتر الأمـر
														<i class="fa fa-angle-down"></i>
													</a>
													<ul class="dropdown-menu pull-right bg-grey-cararra">
														<li><a href="{{ route('serviceDetails', ['id' => $service->id]) }}" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
														<li><a href="{{ route('editService', ['id' => $service->id]) }}" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
														<li>
															<a href="#deleteService{{ $service->id }}" class="font-red" data-toggle="modal">
															<i class="icon-trash font-red"></i> حـذف</a>
														</li>
														<li>
															<a href="{{ route('downloadService', ['id' => $service->id]) }}" class="font-green">
															<i class="icon-cloud-download font-green"></i> تحميل</a>
														</li>													
													</ul>
												</div>
											</td>
										</tr>
										<div class="modal fade" id="deleteService{{ $service->id }}" tabindex="-1" role="basic" aria-hidden="true">
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
															متأكد أنك تريد حـذف الخدمة {{ $service->name }} ؟
											
														</div>
														<div class="modal-footer">
															<button type="button" class="btn dark btn-default" data-dismiss="modal">إغلاق</button>
															<a href="{{ route('deleteService', ['id' => $service->id]) }}" class="btn btn-danger">حـذف</a>
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