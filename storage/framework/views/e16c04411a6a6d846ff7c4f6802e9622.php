<?php $__env->startSection('title'); ?>
    Login
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <!-- Password toggle CSS -->
    <link href="<?php echo e(URL::asset('assets/css/password-toggle.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="account-pages">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <br>
                        <a href="<?php echo e(url('/')); ?>" class="mb-2 d-block auth-logo">
                            <img src="<?php echo e(config('settings.logo_dark') ? config('settings.logo_dark') : asset('assets/images/settings/Setna.jpg')); ?>" alt="" height="80" width="220"
                                 class="logo logo-dark">
                            <img src="<?php echo e(config('settings.logo_light') ? config('settings.logo_light') : asset('assets/images/settings/Setna.jpg')); ?>" alt="" height="80" width="220"
                                 class="logo logo-light">
                        </a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">

                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Welcome Back !</h5>
                                <p class="text-muted">Sign in to continue to <?php echo e(config('app.name')); ?>.</p>
                            </div>
                            <div class="p-2 mt-4">
                                <form method="POST" action="<?php echo e(route('login')); ?>">
                                    <?php echo csrf_field(); ?>

                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="text" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            name="email" value="<?php echo e(old('email')); ?>" id="email"
                                            placeholder="Enter Email address">
                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="mb-3">
                                        <div class="float-end">
                                            <?php if(Route::has('password.request')): ?>
                                                <a href="<?php echo e(route('password.request')); ?>" class="text-muted">Forgot
                                                    password?</a>
                                            <?php endif; ?>
                                        </div>
                                        <label class="form-label" for="userpassword">Password</label>
                                        <div class="password-field">
                                            <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                value="<?php echo e(old('password')); ?>" name="password" id="userpassword" placeholder="Enter password">
                                            <i class="fas fa-eye-slash password-toggle" onclick="togglePassword('userpassword', this)"></i>
                                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="">
                                        <input type="checkbox" class="form-check-input" id="auth-remember-check"
                                            name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                        <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                    </div>

                                    <div class="mt-3 text-end">
                                        <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Log
                                            In</button>
                                    </div>                                  
                                </form>
                            </div>

                        </div>
                    </div>

                    <div class="mt-2 text-center">
                        <p>© <script>
                                document.write(new Date().getFullYear())
                            </script> <?php echo e(config('settings.title')); ?> By <a href="https://arwaj.com.pk" target="_blank" class="text-reset">Arwaj</a></p>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <!-- Password toggle JS -->
    <script src="<?php echo e(URL::asset('assets/js/password-toggle.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/user/htdocs/srv617279.hstgr.cloud/resources/views/auth/login.blade.php ENDPATH**/ ?>