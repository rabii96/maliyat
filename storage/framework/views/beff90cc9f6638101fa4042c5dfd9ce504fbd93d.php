<!-- BEGIN CONTAINER -->
    <div class="page-container">
        <?php echo $__env->make('includes.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
<!-- END CONTAINER -->
    