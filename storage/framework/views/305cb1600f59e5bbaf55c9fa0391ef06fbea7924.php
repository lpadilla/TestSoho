   
<?php $__env->startSection('content'); ?>
   <div class="row">
        <div class="col-12">          
          <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>Id</th>
                 <th>Titulo</th>
                 <th>Código de producto</th>
                 <th>Descripción</th>
                 <th>Fecha</th>
              </tr>
           </thead>
           <tbody>
              <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                 <td><?php echo e($product->id); ?></td>
                 <td><?php echo e($product->title); ?></td>
                 <td><?php echo e($product->product_code); ?></td>
                 <td><?php echo e($product->description); ?></td>
                 <td><?php echo e(date('Y-m-d', strtotime($product->created_at))); ?></td>                 
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </tbody>
          </table>
          <?php echo $products->links(); ?>

       </div> 
   </div>
 <?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/TestSoho/resources/views/product/list_all.blade.php ENDPATH**/ ?>