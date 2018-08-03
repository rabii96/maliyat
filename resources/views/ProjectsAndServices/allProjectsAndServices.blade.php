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
								المشاريع
							</label>
						</div>

						<div>
							<input id="checkbox-3" class="checkbox-style" name="checkbox-3" type="checkbox">
							<label for="checkbox-3" class="checkbox-style-3-label">
								الخدمات
							</label>
						</div>

						<div>
							<input id="checkbox-4" class="checkbox-style" name="checkbox-4" type="checkbox">
							<label for="checkbox-4" class="checkbox-style-3-label">
								المشاريع الناجحة
							</label>
						</div>

						<div>
							<input id="checkbox-5" class="checkbox-style" name="checkbox-5" type="checkbox">
							<label for="checkbox-5" class="checkbox-style-3-label">
								المشاريع الخاسرة
							</label>
						</div>

						<div>
							<input id="checkbox-6" class="checkbox-style" name="checkbox-6" type="checkbox">
							<label for="checkbox-6" class="checkbox-style-3-label">
								المشاريع المتعادلة
							</label>
						</div>
						
						<div class="col-md-12">
							<hr>
						</div>
						

						<div>
							<input id="checkbox-9" class="checkbox-style" name="checkbox-9" type="checkbox">
							<label for="checkbox-9" class="checkbox-style-3-label">
								جميع الأوقات
							</label>
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
							<input id="checkbox-7" class="checkbox-style" name="checkbox-7" type="checkbox">
							<label for="checkbox-7" class="checkbox-style-3-label">
								المنتهية
							</label>
						</div>

						<div>
							<input id="checkbox-8" class="checkbox-style" name="checkbox-8" type="checkbox">
							<label for="checkbox-8" class="checkbox-style-3-label">
								الجارية
							</label>
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
									<th class="min-phone-l">اسم المشروع</th>
									<th class="min-phone-l">رقم المشروع</th>
									<th class="min-tablet">النوع</th>
									<th class="none">العميل</th>
									<th class="desktop">التفاصيل</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td class="p-relative">
										<div class="por-indicator bg-red"></div>
									</td>
									<td>تصميم وبرمجة متجر الكترونى</td>
									<td>2512412</td>
									<td>مشروع</td>
									<td>اسم العميل طالب المشروع</td>
									<td class="text-center">
										<div class="btn-group">
											<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown" data-close-others="true"> إخـتر الأمـر
												<i class="fa fa-angle-down"></i>
											</a>
											<ul class="dropdown-menu pull-right bg-grey-cararra">
												<li><a href="projectDetails.html" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
												<li><a href="addProject.html" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
												<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
												<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
											</ul>
										</div>
									</td>
								</tr>
								<tr>
									<td>2</td>
									<td class="p-relative">
										<div class="por-indicator bg-default"></div>
									</td>
									<td>تصميم وبرمجة متجر الكترونى</td>
									<td>2512412</td>
									<td>خدمة</td>
									<td>اسم العميل طالب الخدمة</td>
									<td class="text-center">
										<div class="btn-group">
											<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown" data-close-others="true"> إخـتر الأمـر
												<i class="fa fa-angle-down"></i>
											</a>
											<ul class="dropdown-menu pull-right">
												<li><a href="serviceDetails.html" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
												<li><a href="addService.html" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
												<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
												<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
											</ul>
										</div>
									</td>
								</tr>
								<tr>
									<td>3</td>
									<td class="p-relative">
										<div class="por-indicator bg-default"></div>
									</td>
									<td>تصميم وبرمجة متجر الكترونى</td>
									<td>2512412</td>
									<td>مشروع</td>
									<td>اسم العميل طالب المشروع</td>
									<td class="text-center">
										<div class="btn-group">
											<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown" data-close-others="true"> إخـتر الأمـر
												<i class="fa fa-angle-down"></i>
											</a>
											<ul class="dropdown-menu pull-right">
												<li><a href="projectDetails.html" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
												<li><a href="addProject.html" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
												<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
												<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
											</ul>
										</div>
									</td>
								</tr>
								<tr>
									<td>4</td>
									<td class="p-relative">
										<div class="por-indicator bg-red"></div>
									</td>
									<td>تصميم وبرمجة متجر الكترونى</td>
									<td>2512412</td>
									<td>خدمة</td>
									<td>اسم العميل طالب الخدمة</td>
									<td class="text-center">
										<div class="btn-group">
											<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown" data-close-others="true"> إخـتر الأمـر
												<i class="fa fa-angle-down"></i>
											</a>
											<ul class="dropdown-menu pull-right">
												<li><a href="serviceDetails.html" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
												<li><a href="addService.html" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
												<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
												<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
											</ul>
										</div>
									</td>
								</tr>
								<tr>
									<td>5</td>
									<td class="p-relative">
										<div class="por-indicator bg-default"></div>
									</td>
									<td>تصميم وبرمجة متجر الكترونى</td>
									<td>2512412</td>
									<td>خدمة</td>
									<td>اسم العميل طالب الخدمة</td>
									<td class="text-center">
										<div class="btn-group">
											<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown" data-close-others="true"> إخـتر الأمـر
												<i class="fa fa-angle-down"></i>
											</a>
											<ul class="dropdown-menu pull-right">
												<li><a href="serviceDetails.html" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
												<li><a href="addService.html" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
												<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
												<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
											</ul>
										</div>
									</td>
								</tr>
								<tr>
									<td>6</td>
									<td class="p-relative">
										<div class="por-indicator bg-red"></div>
									</td>
									<td>تصميم وبرمجة متجر الكترونى</td>
									<td>2512412</td>
									<td>مشروع</td>
									<td>اسم العميل طالب المشروع</td>
									<td class="text-center">
										<div class="btn-group">
											<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown" data-close-others="true"> إخـتر الأمـر
												<i class="fa fa-angle-down"></i>
											</a>
											<ul class="dropdown-menu pull-right">
												<li><a href="projectDetails.html" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
												<li><a href="addProject.html" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
												<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
												<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
											</ul>
										</div>
									</td>
								</tr>
								<tr>
									<td>7</td>
									<td class="p-relative">
										<div class="por-indicator bg-default"></div>
									</td>
									<td>تصميم وبرمجة متجر الكترونى</td>
									<td>2512412</td>
									<td>خدمة</td>
									<td>اسم العميل طالب الخدمة</td>
									<td class="text-center">
										<div class="btn-group">
											<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown" data-close-others="true"> إخـتر الأمـر
												<i class="fa fa-angle-down"></i>
											</a>
											<ul class="dropdown-menu pull-right">
												<li><a href="serviceDetails.html" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
												<li><a href="addService.html" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
												<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
												<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
											</ul>
										</div>
									</td>
								</tr>
								<tr>
									<td>8</td>
									<td class="p-relative">
										<div class="por-indicator bg-default"></div>
									</td>
									<td>تصميم وبرمجة متجر الكترونى</td>
									<td>2512412</td>
									<td>مشروع</td>
									<td>اسم العميل طالب المشروع</td>
									<td class="text-center">
										<div class="btn-group">
											<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown" data-close-others="true"> إخـتر الأمـر
												<i class="fa fa-angle-down"></i>
											</a>
											<ul class="dropdown-menu pull-right">
												<li><a href="projectDetails.html" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
												<li><a href="addProject.html" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
												<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
												<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
											</ul>
										</div>
									</td>
								</tr>
								<tr>
									<td>9</td>
									<td class="p-relative">
										<div class="por-indicator bg-red"></div>
									</td>
									<td>تصميم وبرمجة متجر الكترونى</td>
									<td>2512412</td>
									<td>خدمة</td>
									<td>اسم العميل طالب الخدمة</td>
									<td class="text-center">
										<div class="btn-group">
											<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown" data-close-others="true"> إخـتر الأمـر
												<i class="fa fa-angle-down"></i>
											</a>
											<ul class="dropdown-menu pull-right">
												<li><a href="serviceDetails.html" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
												<li><a href="addService.html" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
												<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
												<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
											</ul>
										</div>
									</td>
								</tr>
								<tr>
									<td>10</td>
									<td class="p-relative">
										<div class="por-indicator bg-red"></div>
									</td>
									<td>تصميم وبرمجة متجر الكترونى</td>
									<td>2512412</td>
									<td>مشروع</td>
									<td>اسم العميل طالب المشروع</td>
									<td class="text-center">
										<div class="btn-group">
											<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown" data-close-others="true"> إخـتر الأمـر
												<i class="fa fa-angle-down"></i>
											</a>
											<ul class="dropdown-menu pull-right">
												<li><a href="projectDetails.html" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
												<li><a href="addProject.html" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
												<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
												<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
											</ul>
										</div>
									</td>
								</tr>
								<tr>
									<td>11</td>
									<td class="p-relative">
										<div class="por-indicator bg-red"></div>
									</td>
									<td>تصميم وبرمجة متجر الكترونى</td>
									<td>2512412</td>
									<td>خدمة</td>
									<td>اسم العميل طالب الخدمة</td>
									<td class="text-center">
										<div class="btn-group">
											<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown" data-close-others="true"> إخـتر الأمـر
												<i class="fa fa-angle-down"></i>
											</a>
											<ul class="dropdown-menu pull-right">
												<li><a href="serviceDetails.html" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
												<li><a href="addService.html" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
												<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
												<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
											</ul>
										</div>
									</td>
								</tr>
								<tr>
									<td>12</td>
									<td class="p-relative">
										<div class="por-indicator bg-default"></div>
									</td>
									<td>تصميم وبرمجة متجر الكترونى</td>
									<td>2512412</td>
									<td>مشروع</td>
									<td>اسم العميل طالب المشروع</td>
									<td class="text-center">
										<div class="btn-group">
											<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown" data-close-others="true"> إخـتر الأمـر
												<i class="fa fa-angle-down"></i>
											</a>
											<ul class="dropdown-menu pull-right">
												<li><a href="projectDetails.html" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
												<li><a href="addProject.html" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
												<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
												<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
											</ul>
										</div>
									</td>
								</tr>
								<tr>
									<td>13</td>
									<td class="p-relative">
										<div class="por-indicator bg-red"></div>
									</td>
									<td>تصميم وبرمجة متجر الكترونى</td>
									<td>2512412</td>
									<td>خدمة</td>
									<td>اسم العميل طالب الخدمة</td>
									<td class="text-center">
										<div class="btn-group">
											<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown" data-close-others="true"> إخـتر الأمـر
												<i class="fa fa-angle-down"></i>
											</a>
											<ul class="dropdown-menu pull-right">
												<li><a href="serviceDetails.html" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
												<li><a href="addService.html" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
												<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
												<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
											</ul>
										</div>
									</td>
								</tr>
								<tr>
									<td>14</td>
									<td class="p-relative">
										<div class="por-indicator bg-default"></div>
									</td>
									<td>تصميم وبرمجة متجر الكترونى</td>
									<td>2512412</td>
									<td>مشروع</td>
									<td>اسم العميل طالب المشروع</td>
									<td class="text-center">
										<div class="btn-group">
											<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown" data-close-others="true"> إخـتر الأمـر
												<i class="fa fa-angle-down"></i>
											</a>
											<ul class="dropdown-menu pull-right">
												<li><a href="projectDetails.html" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
												<li><a href="addProject.html" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
												<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
												<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
											</ul>
										</div>
									</td>
								</tr>
								<tr>
									<td>15</td>
									<td class="p-relative">
										<div class="por-indicator bg-red"></div>
									</td>
									<td>تصميم وبرمجة متجر الكترونى</td>
									<td>2512412</td>
									<td>خدمة</td>
									<td>اسم العميل طالب الخدمة</td>
									<td class="text-center">
										<div class="btn-group">
											<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown" data-close-others="true"> إخـتر الأمـر
												<i class="fa fa-angle-down"></i>
											</a>
											<ul class="dropdown-menu pull-right">
												<li><a href="serviceDetails.html" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
												<li><a href="addService.html" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
												<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
												<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
											</ul>
										</div>
									</td>
								</tr>
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