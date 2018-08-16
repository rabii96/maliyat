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
												
													<form action="<?php echo e(route('applySettings')); ?>" method="post" enctype="multipart/form-data">
														<?php echo csrf_field(); ?>
														<div class="form-group">
															<label class="control-label col-md-2">شعار الموقع</label>
															<div class="col-md-8">
																<div class="fileinput fileinput-new" data-provides="fileinput">
																	<div class="fileinput-new thumbnail" style="max-width: 200px; max-height: 150px;">
																		<img name="image" src="<?php echo e(asset('storage/photos/logo.png ')); ?>" alt="logo" /> </div>
																	<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
																	<div>
																		<span class="btn default btn-file">
																			<span class="fileinput-new"> إختر صورة الشعار </span>
																			<span class="fileinput-exists"> تغيير </span>
																			<input type="file" name="photo" accept="image/*"> </span>
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
																	<input type="text" name="title" class="form-control" value="<?php echo e($settings->title); ?>"> 
																</div>
															</div>
														</div>
														
														<div class="form-actions">
															<div class="row">
																<div class="col-md-offset-3 col-md-9">
																	<button id="applySettings" type="submit" class="btn btn-lg green">
																		<i class="fa fa-check"></i> موافـق</button>
																</div>
															</div>
														</div>
													</form>

												
												
												</div>
												

											</div>
											
											<div class="col-md-4 col-sm-12">
												<fieldset>
												<legend class="font-purple">مهام مقدمين الخدمة</legend>
													<form action="<?php echo e(route('addTask')); ?>" method="post">
														<?php echo csrf_field(); ?>
														<div class="form-group">
															<label>اسم المهمة </label>
															<div class="input-icon">
																<i class="fa fa-tasks font-green "></i>
																<input required type="text" id="taskName" name="taskName" class="form-control" placeholder=""> 
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
																		<th>الأمر</th>
																	</tr>
																</thead>
																<tbody>
																	<?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																		<tr>
																			<td><?php echo e($loop->iteration); ?></td>
																			<td><?php echo e($task->name); ?></td>
																			<td>
																				<form action="<?php echo e(route('deleteTask')); ?>" method="GET">
																					<?php echo csrf_field(); ?>
																					<button onclick="deleteTask(<?php echo e($task->id); ?>)" type="button" class="btn red">حذف</button>																				
																				</form>
																			</td>
																		</tr>
																		<script>
																				function deleteTask(id){
																					$.ajax ({
																						url: "<?php echo e(route('deleteTask')); ?>",
																						method: 'GET',
																						data: { 'taskId': id} ,
																						dataType: 'JSON' , 
																						success: function (data){
																							$('#tasks-wrapper').load(window.location + ' #tasks');
																						}
																					});
																					$('#tasks-wrapper').load(window.location + ' #tasks');
																				}
																		</script>
																	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
													<form action="<?php echo e(route('addExpenseType')); ?>" method="post">
														<?php echo csrf_field(); ?>
														<div class="form-group">
															<label>نوع المصروف </label>
															<div class="input-icon">
																<i class="fa fa-money font-green "></i>
																<input type="text" name="expenseTypeName" id="expenseTypeName" class="form-control" placeholder=""> 
															</div>
														</div>


														<div class="col-md-12">
															<div class="form-group text-center">

															<button type="submit" id="addExpenseType" name="addExpenseType" class="btn green margin-right-10">إضافة</button>
																
															</div>
														</div>
													</form>


													<div class="col-md-12">
												
													<div class="form-group">
													<div class="table-responsive" id="expenses-wrapper">
														<div id="expenses">
															<table class="table">
																<thead>
																	<tr>
																		<th> # </th>
																		<th> نوع المصروف </th>
																		<th>الأمر</th>
																	</tr>
																</thead>
																<tbody>
																	<?php $__currentLoopData = $expenseTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expenseType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																		<tr>
																			<td><?php echo e($loop->iteration); ?></td>
																			<td><?php echo e($expenseType->name); ?></td>
																			<td>
																				<form action="<?php echo e(route('deleteExpenseType')); ?>" method="GET">
																					<?php echo csrf_field(); ?>
																					<button onclick="deleteExpense(<?php echo e($expenseType->id); ?>)" type="button" class="btn red">حذف</button>																				
																				</form>
																			</td>
																		</tr>
																	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																	<script>
																		function deleteExpense(id){
																			$.ajax ({
																				url: "<?php echo e(route('deleteExpenseType')); ?>",
																				method: 'GET',
																				data: { 'expenseTypeId': id} ,
																				dataType: 'JSON' , 
																				success: function (data){
																					$('#expenses-wrapper').load(window.location + ' #expenses');
																				}
																			});
																			$('#expenses-wrapper').load(window.location + ' #expenses');
																		}
																	</script>
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
												<legend class="font-purple">طرق التحويل</legend>
													<form action="<?php echo e(route('addTransferMethod')); ?>" method="post">
														<?php echo csrf_field(); ?>
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
																	<th>الأمر</th>
																</tr>
															</thead>
															<tbody>
																<?php $__currentLoopData = $transferMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transferMethod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																	<tr>
																		<td><?php echo e($loop->iteration); ?></td>
																		<td><?php echo e($transferMethod->name); ?></td>
																		<td>
																			<form action="<?php echo e(route('deleteTransferMethod')); ?>" method="GET">
																				<?php echo csrf_field(); ?>
																				<button onclick="deleteTransferMethod(<?php echo e($transferMethod->id); ?>)" type="button" class="btn red">حذف</button>																				
																			</form>
																		</td>
																	</tr>
																	<script>
																			function deleteTransferMethod(id){
																				$.ajax ({
																					url: "<?php echo e(route('deleteTransferMethod')); ?>",
																					method: 'GET',
																					data: { 'transferMethodId': id} ,
																					dataType: 'JSON' , 
																					success: function (data){
																						$('#transferMethods-wrapper').load(window.location + ' #transferMethods');
																					}
																				});
																				$('#transferMethods-wrapper').load(window.location + ' #transferMethods');
																			}
																		</script>
																<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
											
											
										</div>
										
										
										
									
									</div>
									<div class="tab-pane" id="tab_2">
										
										<form method="POST" action="<?php echo e(route('addBank')); ?>" class="form-horizontal form-bordered">
											<?php echo csrf_field(); ?>
											<div class="form-body">
													
													
												<div class="col-md-12">
													

													<div class="col-md-6 col-xs-12">
														<div class="form-group">
															<label class="control-label col-md-3">اسم البنك</label>
															<div class="col-md-9">
																<div class="input-icon">
																	<i class="fa fa-bank font-green "></i>
																	<input name="bank_name" id="bank_name" type="text" class="form-control" placeholder="" required> 
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
																	<input dir="ltr" style="text-align: right" required name="account_number" id="account_number" type="text" class="form-control" placeholder=""> 
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
																	<input dir="ltr" style="text-align: right" required name="initial_balance" id="initial_balance" type="text" class="form-control" placeholder=""> 
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
																	<input dir="ltr" style="text-align: right" required name="iban_number" id="iban_number" type="text" class="form-control" placeholder=""> 
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
																	<input name="percentage_name" id="percentage_name" type="text" class="form-control" placeholder=""> 
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
																	<input name="percentage_value" id="percentage_value" type="text" class="form-control" placeholder=""> 
																</div>
															</div>
														</div>	
													</div>
													
													
												</div>
												
												
											</div>
												
											<div class="form-actions">
												<div class="row">
													<div class="col-md-12 text-center">
														<button id="addBank" type="submit" class="btn btn-lg green">
															<i class="fa fa-check"></i> موافـق</button>
													</div>
												</div>
											</div>
											
										</form>	
									
										<hr>
											
									<div id="banks-wrapper">
										<div id="banks" class="row margin-top-40">
											<?php if($banks): ?>
												<?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<div class="col-md-4">
														<div class="portlet mt-element-ribbon bg-grey-steel portlet-fit ">
															<div dir="ltr" class="ribbon ribbon-right ribbon-shadow ribbon-color-success">
																<div class="ribbon-sub ribbon-right"></div>
																	<?php echo e($bank->account_number); ?>

															</div>
															<div class="portlet-title">
																<div class="caption">
																	<i class="fa fa-bank font-green "></i>
																	<span class="caption-subject font-green bold uppercase"><?php echo e($bank->name); ?></span>
																</div>
															</div>
															<div class="portlet-body bnk">
																<?php echo e($bank->current_balance); ?> ريال
															</div>
															<a class="more" href="javascript:;"> التفاصيل
																<i class="m-icon-swapleft m-icon-dark"></i>
															</a>
														</div>
													</div>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
										</div>
									</div>	
									
									
									</div>
									<div class="tab-pane" id="tab_3">
									<form id="addTransferForm" action="<?php echo e(route('addBankTransfer')); ?>" method="POST" enctype="multipart/form-data">
										<?php echo csrf_field(); ?>
										<div class="row">
										<div class="col-md-10 col-md-offset-1 col-xs-12">
										<div class="col-md-6 col-xs-12">
											<div class="form-group">
												<label class="control-label col-md-3 no-margin margin-top-5">حول من بنك <span>*</span></label>
												<div class="col-md-9">
													<select id="select_from_bank" name="select_from_bank" class="form-control select2 ">
														<option value=""></option>
														<?php if($banks): ?>
															<?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																<option value="<?php echo e($bank->id); ?>"><?php echo e($bank->name); ?></option>
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														<?php endif; ?>
													</select>
													<?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<input type="hidden" id="fromB_number<?php echo e($bank->id); ?>" value="<?php echo e($bank->account_number); ?>">
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
														<?php if($banks): ?>
															<?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																<option value="<?php echo e($bank->id); ?>"><?php echo e($bank->name); ?></option>
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														<?php endif; ?>
													</select>
													<?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<input type="hidden" id="toB_number<?php echo e($bank->id); ?>" value="<?php echo e($bank->account_number); ?>">
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
													<input type="text" id="bank_from_number" class="form-control" placeholder="" disabled> 
												</div>
											<div class="clearfix"></div>
											</div>
										</div>
										<div class="col-md-6 col-xs-12">
											<div class="form-group">
												<label class="control-label col-md-3 no-margin margin-top-5">رقم حسابه <span>*</span></label>
												<div class="col-md-9">
													<input type="text" id="bank_to_number" class="form-control" placeholder="" disabled> 
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
														<input id="transfer_amount" dir="ltr" style="text-align: right" name="transfer_amount" onkeypress="return isNumber(event)" type="text" class="form-control" placeholder=""> 
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
														<?php if($percentages): ?>
															<?php $__currentLoopData = $percentages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																<option value="<?php echo e($p->id); ?>" data-value="<?php echo e($p->value); ?>"><?php echo e($p->name); ?></option>
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														<?php endif; ?>
													</select>
												</div>
											<div class="clearfix"></div>
											</div>
										</div>
										<input type="hidden" name="transfer_percentage_value" id="transfer_percentage_value" value="0">
										<div class="col-md-4 col-xs-12">
											<div class="form-group">
												<label class="control-label col-md-5 no-margin margin-top-5">صافى المبلغ </label>
												<div class="col-md-7">
													<div class="input-icon">
														<i class="fa fa-money font-green "></i>
														<input id="net_transfer_amount" name="net_transfer_amount" type="text" class="form-control" placeholder="" disabled> 
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
										
													
											<div class="row">
												<div class="col-md-6 col-md-offset-3 col-sm-12 text-center">
													<button id="addBankTransfer" type="submit" class="btn btn-lg green">
														<i class="fa fa-check"></i> حـول</button>
												</div>
											</div>
									</form>
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
										<input id="any_time" class="checkbox-style" name="time" id="any_time" value="any_time" type="radio" checked>
										<label for="any_time" class="checkbox-style-3-label">
											اى وقت
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
										<input id="checkbox-2" class="checkbox-style" name="checkbox-2" type="checkbox">
										<label for="checkbox-2" class="checkbox-style-3-label">
											جميع تحويلات بنك
										</label>
										<div class="col-md-12">
										<select name="filters[]" class="form-control select2 " multiple>
											<?php if($banks): ?>
												<?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo e($bank->name); ?>" selected><?php echo e($bank->name); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
										</select>
										</div>
									</div>

									

									<div class="clearfix"></div>

									<div class="text-center margin-top-30">
										<button type="button" class="btn green" onclick="applyFilters();">عـرض</button>
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
											$('#from').attr('disabled','disabled');
											$('#to').attr('disabled','disabled');
										});
										function applyFilters(){
											var table = $('#bankTransfers_table').DataTable();
											table.draw();
										}
										$.fn.dataTable.ext.search.push(
											function( settings, data, dataIndex ) {
												var filters = []
												$("select[name='filters[]'] :selected").each(function(){
													filters.push($(this).val());
												});
												var time = $("input[name='time']:checked" ).val();
												var fromBank = data[1] ;
												var toBank = data[2] ;
												var date = data[5];
												var inRange;
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
										
												if (
														inRange &&
														(
															( jQuery.inArray(fromBank,filters) !== -1 )	||
															( jQuery.inArray(toBank,filters) !== -1 )
														)
													)
												{
													return true;
												}
												return false;
											}
										);
									</script>

									</div>
									</div>

									</div>
								</form>
								</div>
								</div>
									
							</div>

								
							</div>
							
							
								<div class="line visible-xs-block"></div>

							
									<div id="bankTransfers-wrapper" class="col-md-9 clearfix">
									
									<div id="bankTransfers" class="table-responsive">
										<table class="table table-striped table-bordered table-hover dt-responsive grd_view" width="100%" id="bankTransfers_table">
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
											<?php if($bankTransfers): ?>
												<?php $__currentLoopData = $bankTransfers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bankTransfer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<tr>
														<td><?php echo e($loop->iteration); ?></td>
														<td><?php echo e($bankTransfer->from_bank->name); ?></td>
														<td><?php echo e($bankTransfer->to_bank->name); ?></td>
														<td><?php echo e($bankTransfer->transfer_percentage); ?> ريال</td>
														<td><?php echo e($bankTransfer->transfer_amount); ?> ريال</td>
														<?php
															$month = $bankTransfer->updated_at->format('M');
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
														<td data-search="<?php echo e($bankTransfer->updated_at->format('m/d/Y')); ?>"><?php echo e($bankTransfer->updated_at->format('d')); ?> <?php echo e($ar_month); ?> <?php echo e($bankTransfer->updated_at->format('Y')); ?></td>
														<td class="text-center">
															<div class="btn-group">
																<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
																	<i class="fa fa-angle-down"></i>
																</a>
																<ul class="dropdown-menu pull-right">
																	<li>
																		<a class="font-purple" data-toggle="modal" data-target="#showBankTransfer<?php echo e($bankTransfer->id); ?>">
																			<i class="icon-eye font-purple"></i> عـرض</a>
																	</li>
																	<li>
																		<a href="<?php echo e(route('editBankTransfer', ['id' => $bankTransfer->id])); ?>" class="font-blue">
																			<i class="icon-note font-blue"></i> تعديل</a>
																	</li>
																	<li>
																		<a href="#deleteBankTransfer<?php echo e($bankTransfer->id); ?>" class="font-red" data-toggle="modal">
																			<i class="icon-trash font-red"></i> حـذف</a>
																	</li>																	<li>
																		<a href="<?php echo e(route('downloadBankTransfer', ['id' => $bankTransfer->id])); ?>" class="font-green">
																			<i class="icon-cloud-download font-green"></i> تحميل</a>
																	</li>																
																</ul>
															</div>
														</td>
													</tr>
													<div class="modal fade" id="showBankTransfer<?php echo e($bankTransfer->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
														<div class="modal-dialog" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title pull-left" id="exampleModalLabel">بيانات التحويل</h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body">
																	<?php
																		$month = $bankTransfer->updated_at->format('M');
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
																		<label class="font-purple">تاريخ التحويل</label>
																		<h4><?php echo e($bankTransfer->updated_at->format('d')); ?> <?php echo e($ar_month); ?> <?php echo e($bankTransfer->updated_at->format('Y')); ?></h4>
																	</div>

																	<div class="form-group">
																		<label class="font-purple">من البنك</label>
																		<h4><?php echo e($bankTransfer->from_bank->name); ?></h4>
																	</div>

																	<div class="form-group">
																		<label class="font-purple">إلى البنك</label>
																		<h4><?php echo e($bankTransfer->to_bank->name); ?></h4>
																	</div>

																	<div class="form-group">
																		<label class="font-purple">المبلغ المحول</label>
																		<h4><?php echo e($bankTransfer->transfer_amount); ?> ريال</h4>
																	</div>

																	<?php if($bankTransfer->percentage): ?>
																	<div class="form-group">
																		<label class="font-purple">النسبة المقتطعة</label>
																		<h4><?php echo e($bankTransfer->percentage->name); ?> (<?php echo e($bankTransfer->percentage->value); ?>%)</h4>
																	</div>

																	<div class="form-group">
																		<label class="font-purple">قيمة النسبة المقتطعة</label>
																		<h4><?php echo e($bankTransfer->transfer_percentage); ?> ريال</h4>
																	</div>

																	<div class="form-group">
																		<label class="font-purple">صافي المبلغ المحول</label>
																		<h4><?php echo e($bankTransfer->net_transfer_amount); ?> ريال</h4>
																	</div>
																	<?php endif; ?>
																	
																	<?php if( $bankTransfer->attachement): ?>
																		<div class="form-group">
																				<label class="font-purple">الملف المرفق</label>
																				<h5><a dir="ltr" href="<?php echo e(asset('storage/attachements/')); ?>/<?php echo e($bankTransfer->attachement); ?>" download><?php echo e($bankTransfer->attachement); ?></a></h5>
																		</div>
																	<?php endif; ?>
											
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">إغـلاق</button>
																</div>
															</div>
														</div>
													</div>
													<div class="modal fade" id="deleteBankTransfer<?php echo e($bankTransfer->id); ?>" tabindex="-1" role="basic" aria-hidden="true">
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
																		متأكد أنك تريد حـذف التحويل ؟
																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn dark btn-default" data-dismiss="modal">إغلاق</button>
																		<a href="<?php echo e(route('deleteBankTransfer', ['id' => $bankTransfer->id])); ?>" class="btn btn-danger">حـذف</a>
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
									

									</div>
							
									<div class="clearfix"></div>
							
									</div>
									
									
									
									
									</div>
									<div class="tab-pane" id="tab_4">
										
										
									<form method="POST" action="<?php echo e(route('addPercentage')); ?>" class="form-horizontal form-bordered">
										<?php echo csrf_field(); ?>
										<div class="form-body">

												<div class="col-md-10 col-md-offset-1 col-xs-12">
												
												
											<div class="form-group">
												<label class="control-label col-md-3">اسم النسبة</label>
												<div class="col-md-6">
													<div class="input-icon">
														<i class="fa fa-calculator font-green "></i>
														<input name="percentageName" id="percentageName" type="text" class="form-control" placeholder=""> 
													</div>
												</div>
											</div>
												
											<div class="form-group">
												<label class="control-label col-md-3">القيمة</label>
												<div class="col-md-6">
													<div class="input-icon">
														<i class="fa fa-money font-green "></i>
														<input name="percentageValue" id="percentageValue" type="text" class="form-control" placeholder=""> 
													</div>
												</div>
											</div>
											
											<div class="form-group">
												<label class="control-label col-md-3">ملاحظات</label>
												<div class="col-md-6">
													<textarea name="remarks" id="remarks" class="form-control" rows="5"></textarea>
												</div>
											</div>
									
									
												</div>
									
									

										</div>
												
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-1 col-md-10 text-center">
														<button type="submit" id="addPercentage" class="btn btn-lg green">
															<i class="fa fa-check"></i> إضـافة</button>
													</div>
												</div>
											</div>
										</form>
			
									<hr>

									<h4 class="text-center font-purple margin-bottom-5 no-margin">
										جميع النسب
									</h4>
									
									<div class="row">
									<div class="col-md-12 text-center"><hr style="width: 20%;margin: 5px auto 20px auto;"></div>
									</div>
									
									<div class="row">
																
									<div id="percentages-wrapper" class="col-md-8 col-md-offset-2 col-xs-12 clearfix">
									
										<div id="percentages" class="table-responsive">
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
													<?php if($percentages): ?>
														<?php $__currentLoopData = $percentages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $percentage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<tr>
																<td>1</td>
																<td><?php echo e($percentage->name); ?></td>
																<td><?php echo e($percentage->value); ?>%</td>
																<td class="text-center">
																	<div class="btn-group">
																		<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
																			<i class="fa fa-angle-down"></i>
																		</a>
																		<ul class="dropdown-menu pull-right">
																			<li>
																				<a class="font-purple" data-toggle="modal" data-target="#showPercentage<?php echo e($percentage->id); ?>">
																					<i class="icon-eye font-purple"></i> عـرض</a>
																			</li>
																			<li>
																				<a href="#deletePercentage<?php echo e($percentage->id); ?>" class="font-red" data-toggle="modal">
																					<i class="icon-trash font-red"></i> حـذف</a>
																			</li>
																		</ul>
																	</div>
																</td>
															</tr>
															<div class="modal fade" id="showPercentage<?php echo e($percentage->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
																	<div class="modal-dialog" role="document">
																		<div class="modal-content">
																			<div class="modal-header">
																				<h5 class="modal-title pull-left" id="exampleModalLabel">بيانات النسبة</h5>
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																					<span aria-hidden="true">&times;</span>
																				</button>
																			</div>
																			<div class="modal-body">
																
																				<div class="form-group">
																					<label class="font-purple">اسم النسبة </label>
																					<h4><?php echo e($percentage->name); ?></h4>
																				</div>

																				<div class="form-group">
																					<label class="font-purple">القيمة</label>
																					<h4><?php echo e($percentage->value); ?> %</h4>
																				</div>
																				
																				<?php if( $percentage->remarks): ?>
																					<div class="form-group">
																						<label class="font-purple">ملاحظات</label>
																						<h4><?php echo e($percentage->remarks); ?></h4>
																					</div>
																				<?php endif; ?>
																				
																			</div>
																			<div class="modal-footer">
																				<button type="button" class="btn btn-secondary" data-dismiss="modal">إغـلاق</button>
																			</div>
																		</div>
																	</div>
															</div>
															<div class="modal fade" id="deletePercentage<?php echo e($percentage->id); ?>" tabindex="-1" role="basic" aria-hidden="true">
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
																				متأكد أنك تريد حـذف النسبة <?php echo e($percentage->name); ?> ؟
																
																			</div>
																			<div class="modal-footer">
																				<button type="button" class="btn dark btn-default" data-dismiss="modal">إغلاق</button>
																				<a href="<?php echo e(route('deletePercentage', ['id' => $percentage->id])); ?>" class="btn btn-danger">حـذف</a>
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
										<input id="checkbox-1" name="checkbox-1" type="checkbox" checked>
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

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>