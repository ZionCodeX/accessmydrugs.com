<!DOCTYPE html>
<html class="loading" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" data-textdirection="ltr">

<head>
    <base href="../../">
    <meta charset="utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title'); ?> | Access My Drugs </title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Buy original, branded perfumes, gold jewelry and bars from Dubai. We buy and ship to you when you order.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
        <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/icon/amd-icon.png">
  
    <?php echo $__env->make('components/inc_header_links_shop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>







<body>

    <!-- Main Wrapper Start -->
        <?php echo $__env->make('components/inc_header_top_section_shop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        <?php echo $__env->make('components/inc_navbar_section_shop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



                    <?php echo $__env->yieldContent('content'); ?>


        <?php echo $__env->make('components/inc_footer_content_shop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        <?php echo $__env->make('components/inc_footer_links_shop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


</body>

</html><?php /**PATH C:\xampp\htdocs\accessmydrugs.com\resources\views/layouts/base_shop.blade.php ENDPATH**/ ?>