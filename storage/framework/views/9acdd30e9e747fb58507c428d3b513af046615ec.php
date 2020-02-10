 
<?php $__env->startSection('content'); ?>
<h1 style="margin-top: 12px;" class="text-center">Editar Producto</a></h1>
<br>
 
<form action="<?php echo e(route('products.update', $product_info->id)); ?>" method="POST" name="update_product">
    <?php echo e(csrf_field()); ?>

    <?php echo method_field('PATCH'); ?>
    
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Titulo</strong>
                <input type="text" name="title" class="form-control" placeholder="Ingrese Titulo" value="<?php echo e($product_info->title); ?>">
                <span class="text-danger"><?php echo e($errors->first('title')); ?></span>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Código</strong>
                <input type="text" name="product_code" class="form-control" placeholder="Ingrese Codigo" value="<?php echo e($product_info->product_code); ?>">
                <span class="text-danger"><?php echo e($errors->first('product_code')); ?></span>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Descripción</strong>
                <textarea class="form-control" col="4" name="description" placeholder="Ingrese Descripción" ><?php echo e($product_info->description); ?></textarea>
                <span class="text-danger"><?php echo e($errors->first('description')); ?></span>
            </div>
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Editar</button>
        </div>
    </div>
 
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/TestSoho/resources/views/product/edit.blade.php ENDPATH**/ ?>