<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

    <div class="row">
        <!-- left column -->
       <div class="col-md-3">
       </div>
        <!-- center column -->       
        <div class="col-md-6 margin">
            <!-- general form elements -->
            <div class="box box-primary">
                <!-- form start -->
                    <div class="box-body">
                        <?php echo $__env->yieldContent('form-open'); ?>  
                        <!-- 'bg-img/' . - custom -->
                        <input type="hidden" id="image" name="image" value="<?php if(isset($image)): ?><?php echo e('bg-img/' . $image); ?><?php elseif(old('image')): ?><?php echo e(old('image')); ?><?php elseif(isset($product)): ?><?php echo e($product->image); ?><?php else: ?><?php echo e('bg-img/nophoto.jpg'); ?><?php endif; ?>">
                        <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                            <label for="name"><?php echo app('translator')->get('Name'); ?></label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php if(isset($product)): ?><?php echo e($product->name); ?><?php elseif(old('name')): ?><?php echo e(old('name')); ?><?php endif; ?>" placeholder="Big Table"> 
                            <?php echo $errors->first('name', '<small class="help-block">:message</small>'); ?>

                        </div>
                        <div class="form-group <?php echo e($errors->has('price') ? 'has-error' : ''); ?>">
                            <label for="name"><?php echo app('translator')->get('Price'); ?></label>
                            <input type="text" class="form-control" id="price" name="price" value="<?php if(isset($product)): ?><?php echo e($product->price); ?><?php elseif(old('price')): ?><?php echo e(old('price')); ?><?php endif; ?>" placeholder="177.77"> 
                            <?php echo $errors->first('price', '<small class="help-block">:message</small>'); ?>

                        </div>                      
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('Submit'); ?></button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (right) -->
        <!-- right column -->
       <div class="col-md-3">
       </div> 
    </div>
    <!-- /.row -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
$(document).ready(function(){
  $("body").on("change", ".upload_field", function(){
    //alert('hi');
    $(".upload_submit").click();
  });
});       
</script>
<?php $__env->stopSection(); ?>  



<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/template.blade.php ENDPATH**/ ?>