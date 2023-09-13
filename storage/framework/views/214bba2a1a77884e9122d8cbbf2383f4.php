<?php $__env->startSection('title', 'Shop'); ?>


<!-- MAIN PAGE CONTENT STARTS -->
<?php $__env->startSection('content'); ?>

        <!---------------------------------------------------------->
    
        <?php echo $__env->make('components/inc_main_slide_banner_section_shop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        <?php echo $__env->make('components/inc_category1_section_shop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('components/inc_brand_section_shop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!---------------------------------------------------------->

<?php $__env->stopSection(); ?> 
<!-- MAIN PAGE CONTENT STOPS -->



<?php echo $__env->make('layouts.base_shop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\accessmydrugs.com\resources\views/pages/shop.blade.php ENDPATH**/ ?>