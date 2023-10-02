<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

        <div class="row padding_body">
           <div class="col-md-12">
              <div class="box box-primary">
                 <div class="box-body container">
                    <div class="row">
                      <div class="col-lg-1 border font-weight-bold p-2">Update</div>
                      <div class="col-lg-4 border font-weight-bold p-2">Name</div>
                      <div class="col-lg-2 border font-weight-bold p-2">Price</div>
                      <div class="col-lg-3 border font-weight-bold p-2">Photo</div>
                      <div class="col-lg-2 border font-weight-bold p-2">Created_At</div>
                    </div>
                    <div class="user_item_list">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row">
                      <div class="col-lg-1 border p-2 text-center">
                        <a class="btn btn-primary listbuttonupdate" href="<?php echo e(route('products.edit', $product->id)); ?>">
                           <i class="fa fa-edit" aria-hidden="true"></i>
                        </a>                          
                      </div>
                      <div class="col-lg-4 border p-2"><?php echo e($product->name); ?></div>
                      <div class="col-lg-2 border p-2"><?php echo e($product->price); ?></div>
                      <div class="col-lg-3 border p-2 text-center"><img class="img_little" src="<?php echo e(asset('images/' . $product->image)); ?>" /></div>
                      <div class="col-lg-2 border p-2"><?php echo e($product->created_at); ?></div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    </div>
                    <hr>                       
                   </div>  
                 </div>
              </div> 
           </div>         
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/products.blade.php ENDPATH**/ ?>