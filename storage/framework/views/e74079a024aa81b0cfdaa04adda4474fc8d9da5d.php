 
<?php $__env->startSection('content'); ?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<!-- BEGIN CONTENT BODY -->
	<div class="page-content">


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
											<div id="myFilter-wrapper" class="filters filters--vertical">
												<div id="myFilters" class="filters__section filters__section--category filters__section--vertical">

													
													<div class="filters__section-content">


														<div>
															<input id="selectUsers" class="checkbox-style" name="filter[]" value="مستخدم" checked type="checkbox">
															<label for="selectUsers" class="checkbox-style-3-label">
																المستخدمين
															</label>
														</div>

														<div>
															<input id="selectEmployees" class="checkbox-style" name="filter[]" value="مقدم خدمة" checked type="checkbox">
															<label for="selectEmployees" class="checkbox-style-3-label">
																مقدم خدمة
															</label>
														</div>

														<div>
															<input id="selectClients" class="checkbox-style" name="filter[]" value="عميل" checked type="checkbox">
															<label for="selectClients" class="checkbox-style-3-label">
																عميل
															</label>
														</div>


														<script>
															
															function applyFilters(){
																var table = $('#sample_1').DataTable();
																table.draw();
															}

															$.fn.dataTable.ext.search.push(
																function( settings, data, dataIndex ) {
																	var filters = []
																	$("input[name='filter[]']:checked").each(function(){
																		filters.push($(this).val());
																	});
																	var type = data[2] ;
															
																	if ( jQuery.inArray(type,filters) !== -1)
																	{
																		return true;
																	}
																	return false;
																}
															);

															
														</script>




														<div class="clearfix"></div>

														<div class="text-center margin-top-30">
															<button onclick="applyFilters()" type="button" class="btn green">عـرض</button>
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

							<table class="table table-striped table-bordered table-hover dt-responsive grd_view" width="100%" id="allUsers_table">
								<thead>
									<tr>
										<th class="desktop">م</th>
										<th class="min-phone-l">اسم المستخدم</th>
										<th class="min-phone-l">النوع</th>
										<th class="desktop">التفاصيل</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$i = 1;
									?>
									<?php if($users): ?>
										<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td><?php echo e($i++); ?></td>
												<td><?php echo e($user->username); ?></td>
												<td>مستخدم</td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown" data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li>
																<a class="font-purple" data-toggle="modal" data-target="#showUser<?php echo e($user->id); ?>">
																	<i class="icon-eye font-purple"></i> عـرض</a>
															</li>
															<li>
																<a href="<?php echo e(route('editUser', ['id' => $user->id])); ?>" class="font-blue">
																	<i class="icon-note font-blue"></i> تعديل</a>
															</li>
															<li>
																<a href="#deleteUser<?php echo e($user->id); ?>" class="font-red" data-toggle="modal">
																	<i class="icon-trash font-red"></i> حـذف</a>
															</li>
															<li>
																<a href="<?php echo e(route('downloadUser', ['id' => $user->id])); ?>" class="font-green">
																	<i class="icon-cloud-download font-green"></i> تحميل</a>
															</li>
														</ul>
													</div>
												</td>
											</tr>
											<div class="modal fade" id="showUser<?php echo e($user->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title pull-left" id="exampleModalLabel">بيانات المستخدم</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
												
																<div class="form-group">
																	<label class="font-purple">اسم المستخدم </label>
																	<h4><?php echo e($user->username); ?></h4>
																</div>
																<div class="form-group">
																		<label class="font-purple">الصورة</label><br><br>
																		<img src="<?php echo e(asset('storage/photos')); ?>/<?php echo e($user->photo); ?>" width="150px" alt="photo">
																</div>
																<div class="form-group">
																	<label class="font-purple">الايميل </label>
																	<h4><?php echo e($user->email); ?></h4>
																</div>
																<div class="form-group">
																	<label class="font-purple">الجوال </label>
																	<h4 dir="ltr" style="text-align: right"><?php echo e($user->phone); ?></h4>
																</div>
																<?php if( $user->description): ?>
																	<div class="form-group">
																		<label class="font-purple">نبذة</label>
																		<h4><?php echo e($user->description); ?></h4>
																	</div>
																<?php endif; ?>
																<?php
																	$permissions = unserialize($user->permissions);
																?>
																	<div class="form-group">
																		<label class="font-purple">الصلاحيات</label>
																		<?php if($permissions): ?>
																			<?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																				<ul>
																					<li>
																						<h4><?php echo e(__('permissions.'.$permission)); ?></h4>
																					</li>
																				</ul>
																			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																		<?php else: ?>
																			<h4>لا توجد</h4>
																		<?php endif; ?>

																	</div>
																
												
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">إغـلاق</button>
															</div>
														</div>
													</div>
											</div>
										
											<div class="modal fade" id="deleteUser<?php echo e($user->id); ?>" tabindex="-1" role="basic" aria-hidden="true">
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
																متأكد أنك تريد حـذف المستخدم <?php echo e($user->username); ?> ؟
												
															</div>
															<div class="modal-footer">
																<button type="button" class="btn dark btn-default" data-dismiss="modal">إغلاق</button>
																<a href="<?php echo e(route('deleteUser', ['id' => $user->id])); ?>" class="btn btn-danger">حـذف</a>
															</div>
														</div>
														<!-- /.modal-content -->
													</div>
													<!-- /.modal-dialog -->
											</div>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
									<?php if($clients): ?>
										<?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td><?php echo e($i++); ?></td>
												<td><?php echo e($client->name); ?></td>
												<td>عميل</td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown" data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li>
																<a class="font-purple" data-toggle="modal" data-target="#showClient<?php echo e($client->id); ?>">
																	<i class="icon-eye font-purple"></i> عـرض</a>
															</li>
															<li>
																<a href="<?php echo e(route('editClient', ['id' => $client->id])); ?>" class="font-blue">
																	<i class="icon-note font-blue"></i> تعديل</a>
															</li>
															<li>
																<a href="#deleteClient<?php echo e($client->id); ?>" class="font-red" data-toggle="modal">
																		<i class="icon-trash font-red"></i> حـذف</a>
															</li>
															<li>
																	<a href="<?php echo e(route('downloadClient', ['id' => $client->id])); ?>" class="font-green">
																		<i class="icon-cloud-download font-green"></i> تحميل</a>
															</li>
														</ul>
													</div>
												</td>
											</tr>
											<div class="modal fade" id="showClient<?php echo e($client->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title pull-left" id="exampleModalLabel">بيانات العميل</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
												
																<div class="form-group">
																	<label class="font-purple">اسم العميل </label>
																	<h4><?php echo e($client->name); ?></h4>
																</div>
																
																<?php if( $client->description): ?>
																	<div class="form-group">
																		<label class="font-purple">نبذة</label>
																		<h4><?php echo e($client->description); ?></h4>
																	</div>
																<?php endif; ?>
																<?php if( $client->attachement): ?>
																	<div class="form-group">
																			<label class="font-purple">الملف المرفق</label>
																			<h5><a dir="ltr" href="<?php echo e(asset('storage/attachements/')); ?>/<?php echo e($client->attachement); ?>" download><?php echo e($client->attachement); ?></a></h5>
																	</div>
																<?php endif; ?>
										
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">إغـلاق</button>
															</div>
														</div>
													</div>
											</div>
											<div class="modal fade" id="deleteClient<?php echo e($client->id); ?>" tabindex="-1" role="basic" aria-hidden="true">
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
																متأكد أنك تريد حـذف العميل <?php echo e($client->name); ?> ؟
												
															</div>
															<div class="modal-footer">
																<button type="button" class="btn dark btn-default" data-dismiss="modal">إغلاق</button>
																<a href="<?php echo e(route('deleteClient', ['id' => $client->id])); ?>" class="btn btn-danger">حـذف</a>
															</div>
														</div>
														<!-- /.modal-content -->
													</div>
													<!-- /.modal-dialog -->
											</div>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
									<?php if($employees): ?>
										<?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td><?php echo e($i++); ?></td>
												<td><?php echo e($employee->name); ?></td>
												<td>مقدم خدمة</td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown" data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li>
																<a class="font-purple" data-toggle="modal" data-target="#showEmployee<?php echo e($employee->id); ?>">
																	<i class="icon-eye font-purple"></i> عـرض</a>
															</li>
															<li>
																<a href="<?php echo e(route('editEmployee', ['id' => $employee->id])); ?>" class="font-blue">
																	<i class="icon-note font-blue"></i> تعديل</a>
															</li>
															<li>
																<a href="#deleteEmployee<?php echo e($employee->id); ?>" class="font-red" data-toggle="modal">
																		<i class="icon-trash font-red"></i> حـذف</a>
															</li>
															<li>
																	<a href="<?php echo e(route('downloadEmployee', ['id' => $employee->id])); ?>" class="font-green">
																		<i class="icon-cloud-download font-green"></i> تحميل</a>
															</li>
														</ul>
													</div>
												</td>
											</tr>
											<div class="modal fade" id="showEmployee<?php echo e($employee->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title pull-left" id="exampleModalLabel">بيانات مقدم الخدمة</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
												
																<div class="form-group">
																	<label class="font-purple">اسم مقدم الخدمة </label>
																	<h4><?php echo e($employee->name); ?></h4>
																</div>
																
																<div class="form-group">
																	<label class="font-purple">الايميل </label>
																	<h4><?php echo e($employee->email); ?></h4>
																</div>
																<div class="form-group">
																	<label class="font-purple">الجوال </label>
																	<h4 dir="ltr" style="text-align: right"><?php echo e($employee->phone); ?></h4>
																</div>
																<?php if( $employee->description): ?>
																	<div class="form-group">
																		<label class="font-purple">نبذة</label>
																		<h4><?php echo e($employee->description); ?></h4>
																	</div>
																<?php endif; ?>
																<div class="form-group">
																		<label class="font-purple">المهمة</label>
																		<h4><?php echo e(@$employee->task->name); ?></h4>
																</div>
																<div class="form-group">
																	<?php if(@$employee->employee_accounts): ?>
																		<label class="font-purple">طرق التحويل</label>
																		<?php if(@$employee->employee_accounts[0]->transfer_method->name != 'أخرى'): ?>
																			<h5>إسم طريقة التحويل : 
																			<?php echo e(@$employee->employee_accounts[0]->transfer_method->name); ?></h5>
																		<?php endif; ?>
																		<?php $__currentLoopData = @$employee->employee_accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																			<?php if(@$account->transfer_method->name == 'باي بال'): ?>
																				<h5>الايميل : 
																				<?php echo e($account->paypal_email); ?></h5>
																			<?php elseif(@$account->transfer_method->name == 'بنك'): ?>
																				<h5>إسم البنك : 
																				<?php echo e($account->bank_name); ?></h5>
																				<h5>رقم الحساب : 
																				<?php echo e($account->bank_account_number); ?></h5>
																			<?php elseif(@$account->transfer_method->name == 'شيك'): ?>
																				<h5>رقم الشيك : 
																				<?php echo e($account->check_number); ?></h5>
																			<?php elseif(@$account->transfer_method->name == 'أخرى'): ?>
																				<h5>إسم طريقة التحويل : 
																				<?php echo e($account->other_method_name); ?></h5>
																				<h5>رقم الحساب : 
																				<?php echo e($account->other_method_number); ?></h5>
																			<?php else: ?>
																				<h5>رقم الحساب : 
																				<?php echo e(@$account->default_number); ?></h5>
																			<?php endif; ?>
																			<hr>
																			
																		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																	<?php endif; ?>
																</div>
																<?php if( $employee->attachement): ?>
																	<div class="form-group">
																			<label class="font-purple">الملف المرفق</label>
																			<h5><a dir="rtl" href="<?php echo e(asset('storage/attachements/')); ?>/<?php echo e($employee->attachement); ?>" download><?php echo e($employee->attachement); ?></a></h5>
																	</div>
																<?php endif; ?>
																
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">إغـلاق</button>
															</div>
														</div>
													</div>
											</div>
											<div class="modal fade" id="deleteEmployee<?php echo e($employee->id); ?>" tabindex="-1" role="basic" aria-hidden="true">
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
																متأكد أنك تريد حـذف مقدم الخدمة <?php echo e($employee->name); ?> ؟
												
															</div>
															<div class="modal-footer">
																<button type="button" class="btn dark btn-default" data-dismiss="modal">إغلاق</button>
																<a href="<?php echo e(route('deleteEmployee', ['id' => $employee->id])); ?>" class="btn btn-danger">حـذف</a>
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