<?php $__env->startSection('main'); ?>

<div class="super_container_inner">
    <div class="super_overlay"></div>
    <div class="products">
        <div class="container">
            <div class="row products_row">
               
              <?php
              //print_r($products);
              ?>

              <?php echo $__env->make('product.brick-standard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>                     

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('js/mainIndex.js')); ?>"></script>
<script>
$(document).ready(function(){
   //header_search_button
   $('.header_search_button').click(function() {
      BaseRecord.search = $('.search_input').val();
      BaseRecord.showSearch();
   });
});
</script>    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('product.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/product/index.blade.php ENDPATH**/ ?>