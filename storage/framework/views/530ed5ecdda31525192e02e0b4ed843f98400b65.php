  
   
 <?php $__env->startSection('title'); ?>  
   Cambio de contraseña  
 <?php $__env->stopSection(); ?>  
   
 <?php $__env->startSection('content'); ?>  
   <div class="container">  
     <div class="row">  
       <div class="col-md-8 col-md-offset-2">  
         <div class="panel panel-default">  
           <div class="panel-heading">Cambiar Contraseña</div>  
           <div class="panel-body">  
             <form class="form-horizontal" method="POST" role="form" action="<?php echo e(route('password.change.post')); ?>">  
               <?php if(count($errors) > 0): ?>  
                 <div class="alert alert-danger">  
                   <ul>  
                     <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                       <li><?php echo e($error); ?></li>  
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                   </ul>  
                 </div>  
               <?php endif; ?>  
               <?php echo e(csrf_field()); ?>                   
   
                 
               <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">  
                 <label for="password" class="col-md-4 control-label">Contraseña Nueva</label>  
   
                 <div class="col-md-6">  
                   <input id="password" type="password" class="form-control" name="password" required>  
   
                   <?php if($errors->has('password')): ?>  
                     <span class="help-block">  
                     <strong><?php echo e($errors->first('password')); ?></strong>  
                   </span>  
                   <?php endif; ?>  
                 </div>  
               </div>  
   
                 
               <div class="form-group">  
                 <label for="password-confirm" class="col-md-4 control-label">Confirma Contraseña Nueva</label>  
   
                 <div class="col-md-6">  
                   <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>  
                 </div>  
               </div>  
   
                 
               <div class="form-group">  
                 <div class="col-md-6 col-md-offset-4">  
                   <button type="submit" class="btn btn-primary">  
                     Cambiar
                   </button>  
                 </div>  
               </div>  
   
             </form>  
           </div>  
         </div>  
       </div>  
     </div>  
   </div>  
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/TestSoho/resources/views/auth/passwords/change.blade.php ENDPATH**/ ?>