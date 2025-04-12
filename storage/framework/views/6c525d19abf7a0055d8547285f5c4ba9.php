<?php $__env->startSection('title'); ?>
    Lock Screen
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <!-- Password toggle CSS -->
    <link href="<?php echo e(URL::asset('assets/css/password-toggle.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="account-pages">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div>
                        <br>
                        <a href="<?php echo e(url('/')); ?>" class="mb-2 d-block auth-logo">
                            <img src="<?php echo e(config('settings.logo_dark') ? config('settings.logo_dark') : asset('assets/images/settings/Setna.jpg')); ?>" alt="" height="80" width="220"
                                 class="logo logo-dark">
                            <img src="<?php echo e(config('settings.logo_light') ? config('settings.logo_light') : asset('assets/images/settings/Setna.jpg')); ?>" alt="" height="80" width="220"
                                 class="logo logo-light">
                        </a>
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Lock Screen</h5>
                                    <p class="text-muted">Enter your password to unlock the screen!</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <div class="user-thumb text-center mb-4">
                                        <!-- Dynamic user avatar -->
                                        <img src="<?php echo e(Auth::user()->image ? Storage::url(Auth::user()->image) : URL::asset('/assets/images/users/avatar-4.jpg')); ?>"
                                             class="rounded-circle img-thumbnail avatar-lg" alt="thumbnail">
                                        <!-- Dynamic username -->
                                        <h5 class="font-size-15 mt-3"><?php echo e(Auth::user()->name); ?></h5>
                                    </div>
                                    <!-- Unlock form -->
                                    <form action="<?php echo e(route('unlock')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div class="mb-3">
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
                                                       id="userpassword" name="password" placeholder="Enter password" required>
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

                                        <div class="mt-3 text-end">
                                            <button class="btn btn-primary w-sm waves-effect waves-light"
                                                    type="submit">Unlock</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <p class="mb-0">Not you? <a href="<?php echo e(route('logout')); ?>" class="fw-medium text-primary"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign In</a></p>
                                        </div>
                                    </form>

                                    <!-- Logout form -->
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 text-center">
                            <p>© <script>document.write(new Date().getFullYear())</script> <?php echo e(config('settings.title')); ?>  By <a href="https://arwaj.com.pk" target="_blank" class="text-reset">Arwaj</a></p>
                        </div>
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
    <script>
        // Define variables for session check in password-toggle.js
        var checkSessionRoute = '<?php echo e(route("check.session")); ?>';
        var loginRoute = '<?php echo e(route("login")); ?>';
        var csrfToken = '<?php echo e(csrf_token()); ?>';
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/user/htdocs/srv617279.hstgr.cloud/resources/views/auth/lock-screen.blade.php ENDPATH**/ ?>