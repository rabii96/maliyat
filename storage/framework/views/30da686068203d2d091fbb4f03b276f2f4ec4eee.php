<?php $__env->startSection('content'); ?>
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<!-- BEGIN CONTENT BODY -->
		<div class="page-content">
			
			<a href="<?php echo e(route('addPayment')); ?>"><button type="button" class="btn blue-hoki pull-right">إضافة دفعة</button></a>
			
			<?php echo $__env->make('includes.pageHeader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<!-- BEGIN DASHBOARD STATS 1-->
			<div class="row clearfix">
				<div class="col-md-12">
					<?php echo $__env->make('includes.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
								اخر اسبوع
							</label>
						</div>

						<div>
							<input id="checkbox-3" class="checkbox-style" name="checkbox-3" type="checkbox">
							<label for="checkbox-3" class="checkbox-style-3-label">
								اخر شهر
							</label>
						</div>

						<div>
							<input id="checkbox-4" class="checkbox-style" name="checkbox-4" type="checkbox">
							<label for="checkbox-4" class="checkbox-style-3-label">
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
								جميع مدفوعات مشروع
							</label>
							<div class="col-md-12">
								<select id="single" class="form-control select2 ">
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
								جميع مدفوعات عميل
							</label>
							<div class="col-md-12">
								<select id="single0" class="form-control select2 ">
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
									<th class="min-phone-l">اسم المشروع</th>
									<th class="min-phone-l">رقم المدفوع</th>
									<th class="min-tablet">المبلغ</th>
									<th class="none">العميل</th>
									<th class="desktop">التفاصيل</th>
								</tr>
							</thead>
							<tbody>
								<?php if($realPayments): ?>
									<?php $__currentLoopData = $realPayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $realPayment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
											<td><?php echo e($loop->iteration); ?></td>
											<td class="p-relative">
												<?php if($realPayment->project->finished == true): ?>
													<div class="por-indicator bg-red"></div>
												<?php else: ?>
													<div class="por-indicator bg-default"></div>
												<?php endif; ?>
											</td>
											<td><?php echo e($realPayment->project->name); ?></td>
											<td><?php echo e($realPayment->id); ?></td>
											<td><?php echo e($realPayment->paid_value); ?> ريال</td>
											<td><?php echo e($realPayment->project->client->name); ?></td>
											<td class="text-center">
												<div class="btn-group">
													<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
														<i class="fa fa-angle-down"></i>
													</a>
													<ul class="dropdown-menu pull-right">
														<li>
															<a class="font-purple" data-toggle="modal" data-target="#showPayment<?php echo e($realPayment->id); ?>">
															<i class="icon-eye font-purple"></i> عـرض</a>
														</li>
														<li>
															<a href="<?php echo e(route('editPayment', ['id' => $realPayment->id])); ?>" class="font-blue">
															<i class="icon-note font-blue"></i> تعديل</a>
														</li>														
														<li>
															<a href="#deletePayment<?php echo e($realPayment->id); ?>" class="font-red" data-toggle="modal">
															<i class="icon-trash font-red"></i> حـذف</a>
														</li>														
														<li>
															<a href="<?php echo e(route('downloadPayment', ['id' => $realPayment->id])); ?>" class="font-green">
															<i class="icon-cloud-download font-green"></i> تحميل</a>
														</li>													
													</ul>
												</div>
											</td>
										</tr>
										<div class="modal fade" id="showPayment<?php echo e($realPayment->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
																<h4><?php echo e($realPayment->project->name); ?></h4>
															</div>
															
															<div class="form-group">
																	<h4 class="font-purple">رقم الدفعة</h4>
																	<h4><?php echo e($realPayment->expected_payment->index); ?></h4>
															</div>

															<div class="form-group">
																	<h4 class="font-purple">المبلغ الأصلي للدفعة</h4>
																	<h4><?php echo e($realPayment->expected_payment->value); ?> ريال</h4>
															</div>

															<div class="form-group">
																	<h4 class="font-purple">المبلغ المدفوع في هذه الدفعة</h4>
																	<h4><?php echo e($realPayment->paid_value); ?> ريال</h4>
															</div>

															<div class="form-group">
																	<h4 class="font-purple">المبلغ المتبقي للدفعة</h4>
																	<h4><?php echo e($realPayment->expected_payment->remaining_value); ?> ريال</h4>
															</div>

															<div class="form-group">
																	<h4 class="font-purple"> طريقة التحويل في هذه الدفعة</h4>
																	<?php if($realPayment->transfer_method): ?>
																		<h4>إسم طريقة التحويل : 
																			<?php echo e($realPayment->transfer_method->name); ?>

																		</h4>
																		<?php if(@$realPayment->transfer_method->name == 'باي بال'): ?>
																			<h4>الايميل : 
																			<?php echo e($realPayment->paypal_email); ?></h4>
																		<?php elseif(@$realPayment->transfer_method->name == 'بنك'): ?>
																			<h4>إسم البنك : 
																			<?php echo e(@$realPayment->from_bank->name); ?></h4>
																			<h4>رقم الحساب : 
																			<?php echo e($realPayment->from_bank_number); ?></h4>
																		<?php elseif(@$realPayment->transfer_method->name == 'شيك'): ?>
																			<h4>إسم البنك : 
																				<?php echo e(@$realPayment->from_bank->name); ?></h4>
																			<h4>رقم الشيك : 
																			<?php echo e($realPayment->check_number); ?></h4>
																		<?php else: ?>
																			<h4>رقم الحساب : 
																			<?php echo e(@$realPayment->from_bank_number); ?></h4>
																		<?php endif; ?>
																	<?php else: ?>
																		<h4>إسم طريقة التحويل : 
																			كاش
																		</h4>
																		<h4>إسم المحول :
																			<?php echo e($realPayment->transferer_name); ?>

																		</h4>
																	<?php endif; ?>
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
																			<h4><?php echo e($realPayment->to_bank->name); ?></h4>
																			<h4 class="font-purple">رقم حسابه</h4>
																			<h4><?php echo e($realPayment->to_bank->account_number); ?></h4>
																	</div>

																	<div class="form-group">
																			<h4 class="font-purple">تاريخ الدفعة</h4>
																			<h4><?php echo e($realPayment->date->format('d')); ?> <?php echo e($ar_month); ?> <?php echo e($realPayment->date->format('Y')); ?></h4>
																	</div>

																	<?php if( $realPayment->attachement): ?>
																		<div class="form-group">
																				<h4 class="font-purple">الملف المرفق</h4>
																				<h4><a dir="rtl" href="<?php echo e(asset('storage/attachements/')); ?>/<?php echo e($realPayment->attachement); ?>" download><?php echo e($realPayment->attachement); ?></a></h4>
																		</div>
																	<?php endif; ?>
															</div>
									
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">إغـلاق</button>
														</div>
													</div>
												</div>
										</div>
										<div class="modal fade" id="deletePayment<?php echo e($realPayment->id); ?>" tabindex="-1" role="basic" aria-hidden="true">
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
															<a href="<?php echo e(route('deletePayment', ['id' => $realPayment->id])); ?>" class="btn btn-danger">حـذف</a>
														</div>
													</div>
													<!-- /.modal-content -->
												</div>
												<!-- /.modal-dialog -->
										</div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>