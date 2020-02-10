 <?php $__env->startSection('title'); ?>  
   Crear Producto
 <?php $__env->stopSection(); ?>  

<?php $__env->startSection('content'); ?>
<div class="container">     
    <h1 class="text-center">Crear Producto</h1>
    <form action="<?php echo e(route('products.store')); ?>" method="POST" name="add_product">
        <?php echo e(csrf_field()); ?>

        
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Titulo</strong>
                    <input type="text" name="title" class="form-control" placeholder="Ingrese Titulo">
                    <span class="text-danger"><?php echo e($errors->first('title')); ?></span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Código</strong>
                    <input type="text" name="product_code" class="form-control" placeholder="Ingrese Codigo">
                    <span class="text-danger"><?php echo e($errors->first('product_code')); ?></span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Descripción</strong>
                    <textarea class="form-control" col="4" name="description" placeholder="Ingrese Descripción"></textarea>
                    <span class="text-danger"><?php echo e($errors->first('description')); ?></span>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
        </div>
    
    </form>
</div>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/TestSoho/resources/views/product/create.blade.php ENDPATH**/ ?>