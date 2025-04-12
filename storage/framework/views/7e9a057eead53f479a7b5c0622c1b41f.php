<?php $__env->startSection('title'); ?> Edit Settings <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- Start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Edit Settings</h4>
            </div>
        </div>
    </div>
    <!-- End page title -->

    <!-- Display success message -->
    <?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
    <?php endif; ?>

    <!-- Edit form for settings -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('settings.update')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <!-- Site Settings Section -->
                        <h5 class="mt-4 mb-4">Site Settings</h5>
                        <div class="row">
                            <!-- Title -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="title" name="title" value="<?php echo e(old('title', $setting->title)); ?>" maxlength="255">
                                    <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="description" name="description" rows="3"><?php echo e(old('description', $setting->description)); ?></textarea>
                                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Logo Light -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="logo_light" class="form-label">Logo Light</label>
                                    <?php $__env->startComponent('common-components.dropzone', [
                                    'inputName' => 'logo_light',
                                    'existingFiles' => $setting->logo_light ? [asset($setting->logo_light)] : [],
                                    'acceptedFiles' => 'image/*',
                                    'maxFiles' => 1,
                                    'maxFileSize' => 2
                                    ]); ?> <?php echo $__env->renderComponent(); ?>
                                    <?php $__errorArgs = ['logo_light'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <!-- Logo Dark -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="logo_dark" class="form-label">Logo Dark</label>
                                    <?php $__env->startComponent('common-components.dropzone', [
                                    'inputName' => 'logo_dark',
                                    'existingFiles' => $setting->logo_dark ? [asset($setting->logo_dark)] : [],
                                    'acceptedFiles' => 'image/*',
                                    'maxFiles' => 1,
                                    'maxFileSize' => 2
                                    ]); ?> <?php echo $__env->renderComponent(); ?>
                                    <?php $__errorArgs = ['logo_dark'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <!-- Fav Icon -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="fav_icon" class="form-label">Fav Icon</label>
                                    <?php $__env->startComponent('common-components.dropzone', [
                                    'inputName' => 'fav_icon',
                                    'existingFiles' => $setting->fav_icon ? [asset($setting->fav_icon)] : [],
                                    'acceptedFiles' => 'image/*',
                                    'maxFiles' => 1,
                                    'maxFileSize' => 2
                                    ]); ?> <?php echo $__env->renderComponent(); ?>
                                    <?php $__errorArgs = ['fav_icon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Phone -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="phone" name="phone" value="<?php echo e(old('phone', $setting->phone)); ?>" maxlength="255">
                                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" name="email" value="<?php echo e(old('email', $setting->email)); ?>" maxlength="255">
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                           
                        </div>
                        <!-- Tax Settings Section -->
                        <h5 class="mt-4 mb-4">Tax Settings</h5>
                        <div class="row">
                             <!-- Tax Threshold -->
                             <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tax_threshold" class="form-label">Apply Tax If Amount Exceeds</label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['tax_threshold'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="tax_threshold" name="tax_threshold" value="<?php echo e(old('tax_threshold', $setting->tax_threshold)); ?>">
                                </div>
                                <?php $__errorArgs = ['tax_threshold'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <!-- Tax Percentage -->
                             <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tax_percentage" class="form-label">Tax Percentage (%)</label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['tax_percentage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="tax_percentage" name="tax_percentage" value="<?php echo e(old('tax_percentage', $setting->tax_percentage)); ?>">
                                </div>
                                <?php $__errorArgs = ['tax_percentage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            
                           
                        </div>

                        <!-- Email Settings Section -->
                        <h5 class="mt-4 mb-4">Email Settings</h5>

                        <div class="row">
                            <!-- SMTP Email -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="smtp_email" class="form-label">SMTP Email</label>
                                    <input type="email" class="form-control <?php $__errorArgs = ['smtp_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="smtp_email" name="smtp_email" value="<?php echo e(old('smtp_email', $setting->smtp_email)); ?>" maxlength="255">
                                    <?php $__errorArgs = ['smtp_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <!-- SMTP Host -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="smtp_host" class="form-label">SMTP Host</label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['smtp_host'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="smtp_host" name="smtp_host" value="<?php echo e(old('smtp_host', $setting->smtp_host)); ?>" maxlength="255">
                                    <?php $__errorArgs = ['smtp_host'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- SMTP Password -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="smtp_password" class="form-label">SMTP Password</label>
                                    <input type="password" class="form-control <?php $__errorArgs = ['smtp_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="smtp_password" name="smtp_password" placeholder="Leave blank to keep current password">
                                    <?php $__errorArgs = ['smtp_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <!-- SMTP Port -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="smtp_port" class="form-label">SMTP Port</label>
                                    <input type="number" class="form-control <?php $__errorArgs = ['smtp_port'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="smtp_port" name="smtp_port" value="<?php echo e(old('smtp_port', $setting->smtp_port)); ?>">
                                    <?php $__errorArgs = ['smtp_port'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <!-- Encryption -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="encryption" class="form-label">Encryption</label>
                                    <select class="form-control <?php $__errorArgs = ['encryption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="encryption" name="encryption">
                                        <option value="None" <?php echo e(old('encryption', $setting->encryption) == 'None' ? 'selected' : ''); ?>>None</option>
                                        <option value="SSL" <?php echo e(old('encryption', $setting->encryption) == 'SSL' ? 'selected' : ''); ?>>SSL</option>
                                        <option value="TLS" <?php echo e(old('encryption', $setting->encryption) == 'TLS' ? 'selected' : ''); ?>>TLS</option>
                                    </select>
                                    <?php $__errorArgs = ['encryption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <!-- Notification Settings -->
                        <h5 class="mt-4 mb-4">Notification Settings</h5>
                        <div class="row">
                            <!-- Enable Push Notifications -->
                            <div class="col-md-6 ">
                                <div class="mb-3">
                                    <label for="enable_push_notifications" class="form-label">Enable Push Notifications</label>
                                    <div class="form-check form-switch">
                                        <input class="form-input" type="checkbox" id="enable_push_notifications" name="enable_push_notifications" value="1" onchange="toggleOnesignal(this)" <?php echo e(old('enable_push_notifications', $setting->enable_push_notifications) ? 'checked' : ''); ?>>
                                        <label class="form-label" for="enable_push_notifications">Enable Push Notifications</label>
                                    </div>
                                    <?php $__errorArgs = ['enable_push_notifications'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <!-- Enable Email Notifications -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="enable_email_notifications" class="form-label">Enable Email Notifications</label>
                                    <div class="form-check form-switch">
                                        <input class="form-input" type="checkbox" id="enable_email_notifications" value="1" name="enable_email_notifications" <?php echo e(old('enable_email_notifications', $setting->enable_email_notifications) ? 'checked' : ''); ?>>
                                        <label class="form-label" for="enable_email_notifications">Enable Email Notifications</label>
                                    </div>
                                    <?php $__errorArgs = ['enable_email_notifications'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                        </div>

                        <div class="row" id="onesignal_config" style="display: none;">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="onesignal_app_id" class="form-label">OneSignal APP ID</label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['onesignal_app_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="onesignal_app_id" name="onesignal_app_id" value="<?php echo e(old('onesignal_app_id', $setting->onesignal_app_id)); ?>" maxlength="255">
                                    <?php $__errorArgs = ['onesignal_app_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="onesignal_api_key" class="form-label">OneSignal API Key</label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['onesignal_api_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="onesignal_api_key" name="onesignal_api_key" value="<?php echo e(old('onesignal_api_key', $setting->onesignal_api_key)); ?>" maxlength="255">
                                    <?php $__errorArgs = ['onesignal_api_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <!-- Security Settings -->
                        <h5 class="mt-4 mb-4">Security Settings</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="enable_2fa" class="form-label">Enable Two-Factor Authentication (2FA)</label>
                                    <div class="form-check form-switch">
                                        <input class="form-input" type="checkbox" id="enable_2fa" name="enable_2fa" value="1"
                                            onchange="toggleTwoFa(this)"
                                            <?php echo e(old('enable_2fa', $setting->enable_2fa) ? 'checked' : ''); ?>>
                                        <label class="form-label" for="enable_2fa">Enable 2FA</label>
                                    </div>
                                    <?php $__errorArgs = ['enable_2fa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-md-6" id="2fa_for_users" style="display: none;">
                                <div class="mb-3">
                                    <label for="require_2fa_for_users" class="form-label">Require 2FA for All Users</label>
                                    <div class="form-check form-switch">
                                        <input class="form-input" type="checkbox" id="require_2fa_for_users" name="require_2fa_for_users" value="1"
                                            <?php echo e(old('require_2fa_for_users', $setting->require_2fa_for_users) ? 'checked' : ''); ?>>
                                        <label class="form-label" for="require_2fa_for_users">Mandatory for All Users</label>
                                    </div>
                                    <?php $__errorArgs = ['require_2fa_for_users'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Update Settings</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to toggle div based on checkbox state
    function toggleOnesignal(checkbox) {
        const onesignal_config = document.getElementById('onesignal_config');
        if (checkbox.checked) {
            onesignal_config.style.display = 'flex'; // Show div
        } else {
            onesignal_config.style.display = 'none'; // Hide div
        }
    }

    // Function to toggle div based on checkbox state
    function toggleTwoFa(checkbox) {
        const two_fa_for_users = document.getElementById('2fa_for_users');
        if (checkbox.checked) {
            two_fa_for_users.style.display = 'flex'; // Show div
        } else {
            two_fa_for_users.style.display = 'none'; // Hide div
        }
    }

    // On page load, check if the checkbox is checked and toggle div accordingly
    window.onload = function() {
        const toggleonesignal = document.getElementById('enable_push_notifications');
        toggleOnesignal(toggleonesignal); // Check the initial state of the checkbox

        const enable2faCheckbox = document.getElementById('enable_2fa');
        toggleTwoFa(enable2faCheckbox);
    };

    //Function to validate the tax percentage
    document.addEventListener('DOMContentLoaded', function() {
        const taxInput = document.getElementById('tax_percentage');

        taxInput.addEventListener('input', function() {
            let value = this.value.trim();

            if (value === '') return; // Allow empty while typing

            let num = parseFloat(value);

            if (!isNaN(num)) {
                if (num < 0) {
                    this.value = 0;
                } else if (num > 100) {
                    this.value = 100;
                }
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/user/htdocs/srv617279.hstgr.cloud/resources/views/settings/edit.blade.php ENDPATH**/ ?>