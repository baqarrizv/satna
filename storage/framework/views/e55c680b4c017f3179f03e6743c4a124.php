<meta charset="utf-8" />
<title><?php echo $__env->yieldContent('title'); ?> |  <?php echo e(config('settings.title')); ?> </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="<?php echo e(config('settings.description')); ?>" name="description" />
<meta content="Arwaj" name="author" />
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"> <!-- CSRF token meta tag -->

<link rel="manifest" href="<?php echo e(asset('manifest.json')); ?>">
<meta name="mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-status-bar-style" content="black">
<meta name="mobile-web-app-title" content="<?php echo e(config('settings.title')); ?>">

<!-- App favicon -->
<link rel="shortcut icon" href="<?php echo e(config('settings.fav_icon') ? config('settings.fav_icon') : asset('/assets/images/settings/SetnaSmall.jpg')); ?>"><?php /**PATH /home/user/htdocs/srv617279.hstgr.cloud/resources/views/layouts/title-meta.blade.php ENDPATH**/ ?>