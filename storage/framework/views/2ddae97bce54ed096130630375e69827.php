<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <?php echo $__env->make('layouts.title-meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<?php $__env->startSection('body'); ?>

    <body class="authentication-bg">
    <?php echo $__env->yieldSection(); ?>
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('layouts.vendor-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH /home/user/htdocs/srv617279.hstgr.cloud/resources/views/layouts/master-without-nav.blade.php ENDPATH**/ ?>