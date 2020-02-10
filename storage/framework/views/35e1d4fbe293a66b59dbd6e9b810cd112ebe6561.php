<?php $__env->startSection('content'); ?>   
   <?php if(Auth::check()): ?>
      <index-component></index-component>
   <?php else: ?>
      <list-component></list-component>
   <?php endif; ?>
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/TestSoho/resources/views/product/list.blade.php ENDPATH**/ ?>