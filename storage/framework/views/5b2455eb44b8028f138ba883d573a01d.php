<?php $__env->startSection('title'); ?> Create Doctor <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Create New Doctor</h4>
                <a href="<?php echo e(route('doctors.index')); ?>" class="btn btn-secondary">Back to Doctors</a>
            </div>
        </div>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('doctors.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <!-- Personal Information -->
                        <div class="row">
                            <h5 class="mb-5">Personal Information</h5>
                            <!-- Doctor Name -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Doctor Name <span class="text-danger">*</span></label>
                                    <input type="text" id="name" name="name" required class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('name')); ?>" autocomplete="name">
                                    <?php $__errorArgs = ['name'];
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

                            <!-- Date of Birth -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="date" id="dob" name="dob" class="form-control <?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('dob')); ?>" autocomplete="bday">
                                    <?php $__errorArgs = ['dob'];
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

                            <!-- Sex -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="sex" class="form-label">Sex</label>
                                    <select id="sex" name="sex" class="form-control <?php $__errorArgs = ['sex'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" autocomplete="sex">
                                        <option value="">Select Sex</option>
                                        <option value="Male" <?php echo e(old('sex') == 'Male' ? 'selected' : ''); ?>>Male</option>
                                        <option value="Female" <?php echo e(old('sex') == 'Female' ? 'selected' : ''); ?>>Female</option>
                                    </select>
                                    <?php $__errorArgs = ['sex'];
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
                            
                            <!-- Marital Status -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="marital_status" class="form-label">Marital Status</label>
                                    <select id="marital_status" name="marital_status" class="form-control <?php $__errorArgs = ['marital_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" autocomplete="marital-status">
                                        <option value="">Select Status</option>
                                        <option value="Single" <?php echo e(old('marital_status') == 'Single' ? 'selected' : ''); ?>>Single</option>
                                        <option value="Married" <?php echo e(old('marital_status') == 'Married' ? 'selected' : ''); ?>>Married</option>
                                        <option value="Divorced" <?php echo e(old('marital_status') == 'Divorced' ? 'selected' : ''); ?>>Divorced</option>
                                    </select>
                                    <?php $__errorArgs = ['marital_status'];
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
                            <!-- Religion -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="religion" class="form-label">Religion</label>
                                    <input type="text" id="religion" name="religion" class="form-control <?php $__errorArgs = ['religion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('religion')); ?>" autocomplete="religion">
                                    <?php $__errorArgs = ['religion'];
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

                            <!-- Contact Number -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="contact_number" class="form-label">Contact Number</label>
                                    <input type="text" id="contact_number" name="contact_number" class="phone form-control <?php $__errorArgs = ['contact_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('contact_number')); ?>">
                                    <?php $__errorArgs = ['contact_number'];
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

                            <!-- CNIC -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="cnic" class="form-label">CNIC</label>
                                    <input type="text" id="cnic" name="cnic" class="form-control <?php $__errorArgs = ['cnic'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('cnic')); ?>">
                                    <?php $__errorArgs = ['cnic'];
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
                            <!-- Profile Image -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Profile Image</label>
                                    <?php $__env->startComponent('common-components.dropzone', [
                                        'inputName' => 'image',
                                        'existingFiles' => [],
                                        'acceptedFiles' => 'image/*',
                                        'maxFiles' => 1,
                                        'maxFileSize' => 2
                                    ]); ?> <?php echo $__env->renderComponent(); ?>
                                    <?php $__errorArgs = ['image'];
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

                            <!-- Address -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea id="address" name="address" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" autocomplete="street-address"><?php echo e(old('address')); ?></textarea>
                                    <?php $__errorArgs = ['address'];
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

                        <hr class="bg-dark border-2 border-top border-dark" />

                        <!-- Clinic Information -->
                        <div class="row">
                            <h5 class="mb-5">Clinic Information</h5>
                            
                            <!-- Date of Appointment -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="date_of_appointment" class="form-label">Date of Appointment <span class="text-danger">*</span></label>
                                    <input type="date" id="date_of_appointment" name="date_of_appointment" required class="form-control <?php $__errorArgs = ['date_of_appointment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('date_of_appointment')); ?>">
                                    <?php $__errorArgs = ['date_of_appointment'];
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

                            <!-- Specialist -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="specialist" class="form-label">Specialist <span class="text-danger">*</span></label>
                                    <input type="text" id="specialist" name="specialist" required class="form-control <?php $__errorArgs = ['specialist'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('specialist')); ?>">
                                    <?php $__errorArgs = ['specialist'];
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

                            <!-- Department -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="department_id" class="form-label">Department <span class="text-danger">*</span></label>
                                    <select id="department_id" name="department_id" required class="form-control <?php $__errorArgs = ['department_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <option value="">Select Department</option>
                                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($department->id); ?>" <?php echo e(old('department_id') == $department->id ? 'selected' : ''); ?>><?php echo e($department->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['department_id'];
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

                            <!-- Doctor Charges -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="doctor_charges" class="form-label">Doctor Charges <span class="text-danger">*</span></label>
                                    <input type="number" name="doctor_charges" id="doctor_charges" step="1" required class="form-control <?php $__errorArgs = ['doctor_charges'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('doctor_charges')); ?>" max="9999999" oninput="limitDigits(this, 7)">
                                    <!-- <small class="text-muted">Maximum 7 digits allowed</small> -->
                                    <?php $__errorArgs = ['doctor_charges'];
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

                        <hr class="bg-dark border-2 border-top border-dark" />

                        <!-- Emergency Contact Information -->
                        <div class="row">
                            <h5 class="mb-5">Emergency Contact Information</h5>
                            <!-- Emergency Contact Person Name -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="emergency_contact_name" class="form-label">Emergency Contact Name</label>
                                    <input type="text" id="emergency_contact_name" name="emergency_contact_name" class="form-control <?php $__errorArgs = ['emergency_contact_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('emergency_contact_name')); ?>">
                                    <?php $__errorArgs = ['emergency_contact_name'];
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

                            <!-- Emergency Contact Person Relation -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="emergency_contact_relation" class="form-label">Emergency Contact Relation</label>
                                    <input type="text" id="emergency_contact_relation" name="emergency_contact_relation" class="form-control <?php $__errorArgs = ['emergency_contact_relation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('emergency_contact_relation')); ?>">
                                    <?php $__errorArgs = ['emergency_contact_relation'];
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

                            <!-- Emergency Contact Person Number -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="emergency_contact_number" class="form-label">Emergency Contact Number</label>
                                    <input type="text" id="emergency_contact_number" name="emergency_contact_number" class="phone form-control <?php $__errorArgs = ['emergency_contact_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('emergency_contact_number')); ?>">
                                    <?php $__errorArgs = ['emergency_contact_number'];
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

                        <hr class="bg-dark border-2 border-top border-dark" />

                        <!-- Payment Information -->
                        <div class="row">
                            <h5 class="mb-5">Payment Information</h5>
                            <!-- Payment Mode -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="payment_mode" class="form-label">Payment Mode</label>
                                    <select id="payment_mode" name="payment_mode" class="form-control <?php $__errorArgs = ['payment_mode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <option value="">Select Payment Mode</option>
                                        <option value="Cash" <?php echo e(old('payment_mode') == 'Cash' ? 'selected' : ''); ?>>Cash</option>
                                        <option value="Bank" <?php echo e(old('payment_mode') == 'Bank' ? 'selected' : ''); ?>>Bank</option>
                                    </select>
                                    <?php $__errorArgs = ['payment_mode'];
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

                            <!-- Bank Information for Bank Payment Mode -->
                            <div class="col-md-3 bank-info" style="display: none;">
                                <div class="mb-3">
                                    <label for="bank_name" class="form-label">Bank Name</label>
                                    <input type="text" id="bank_name" name="bank_name" class="form-control <?php $__errorArgs = ['bank_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('bank_name')); ?>">
                                    <?php $__errorArgs = ['bank_name'];
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

                            <div class="col-md-3 bank-info" style="display: none;">
                                <div class="mb-3">
                                    <label for="account_title" class="form-label">Account Title</label>
                                    <input type="text" id="account_title" name="account_title" class="form-control <?php $__errorArgs = ['account_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('account_title')); ?>">
                                    <?php $__errorArgs = ['account_title'];
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

                            <div class="col-md-3 bank-info" style="display: none;">
                                <div class="mb-3">
                                    <label for="account_number" class="form-label">Account Number</label>
                                    <input type="text" id="account_number" name="account_number" class="form-control <?php $__errorArgs = ['account_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('account_number')); ?>">
                                    <?php $__errorArgs = ['account_number'];
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

                            <!-- Doctor Coordinator Checkbox -->
                            <div class="col-md-3">
                                <div class="mb-3 form-check mt-4">
                                    <input type="checkbox" id="is_coordinator" name="is_coordinator" class="form-check-input <?php $__errorArgs = ['is_coordinator'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="1" <?php echo e(old('is_coordinator') ? 'checked' : ''); ?>>
                                    <label class="form-check-label" for="is_coordinator">Is Doctor Coordinator?</label>
                                    <?php $__errorArgs = ['is_coordinator'];
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

                        <!-- Doctor ID and Charge Division -->
                        <div class="row">                            
                            <!-- <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="doctor_id" class="form-label">Doctor ID</label>
                                    <input type="text" id="doctor_id" name="doctor_id" class="form-control <?php $__errorArgs = ['doctor_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('doctor_id')); ?>">
                                    <?php $__errorArgs = ['doctor_id'];
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
                            </div> -->

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="doctor_portion" class="form-label">Doctor Portion (%)</label>
                                    <input type="number" id="doctor_portion" name="doctor_portion" step="1" class="form-control <?php $__errorArgs = ['doctor_portion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('doctor_portion')); ?>">
                                    <small id="doctor_portion_amount" class="form-text text-muted"></small>
                                    <?php $__errorArgs = ['doctor_portion'];
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

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="clinic_portion" class="form-label">Clinic Portion (%)</label>
                                    <input type="number" id="clinic_portion" name="clinic_portion" step="1" class="form-control <?php $__errorArgs = ['clinic_portion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('clinic_portion')); ?>">
                                    <small id="clinic_portion_amount" class="form-text text-muted"></small>
                                    <?php $__errorArgs = ['clinic_portion'];
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

                            <div class="col-md-3">
                                <div class="mb-3 form-check mt-4">
                                    <input type="checkbox" id="is_active" name="is_active" class="form-check-input <?php $__errorArgs = ['is_active'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="1" <?php echo e(old('is_active', '1') == '1' ? 'checked' : ''); ?>>
                                    <label class="form-check-label" for="is_active">Active Status</label>
                                    <?php $__errorArgs = ['is_active'];
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

                        <div class="row justify-content-center mt-4">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary w-100">Create Doctor</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(URL::asset('/assets/libs/inputmask/inputmask.min.js')); ?>"></script>
<script>
$(document).ready(function(){
    // Initialize input masks
    $('#cnic').inputmask('99999-9999999-9');
    $('.phone').inputmask('(0399) 999-9999');
    
    // Handle payment mode change
    $('#payment_mode').change(function() {
        if($(this).val() === 'Bank') {
            $('.bank-info').show();
        } else {
            $('.bank-info').hide();
        }
    });
    
    // Trigger change to set initial state
    $('#payment_mode').trigger('change');
    
    // Calculate doctor and clinic portions
    function calculatePortions() {
        var doctorCharges = $('#doctor_charges').val() || 0;
        var doctorPortion = parseFloat($('#doctor_portion').val()) || 0;
        var clinicPortion = parseFloat($('#clinic_portion').val()) || 0;
        
        // Calculate actual amounts
        var doctorAmount = (doctorCharges * doctorPortion / 100).toFixed(2);
        var clinicAmount = (doctorCharges * clinicPortion / 100).toFixed(2);
        
        // Update display
        $('#doctor_portion_amount').text('Amount: Rs. ' + doctorAmount);
        $('#clinic_portion_amount').text('Amount: Rs. ' + clinicAmount);
    }
    
    // When doctor portion changes, update clinic portion
    $('#doctor_portion').on('input', function() {
        var doctorPortion = parseFloat($(this).val()) || 0;
        if (doctorPortion > 100) {
            $(this).val(100);
            doctorPortion = 100;
        }
        $('#clinic_portion').val((100 - doctorPortion).toFixed(0));
        calculatePortions();
    });
    
    // When clinic portion changes, update doctor portion
    $('#clinic_portion').on('input', function() {
        var clinicPortion = parseFloat($(this).val()) || 0;
        if (clinicPortion > 100) {
            $(this).val(100);
            clinicPortion = 100;
        }
        $('#doctor_portion').val((100 - clinicPortion).toFixed(0));
        calculatePortions();
    });
    
    // Doctor charges still updates both calculations
    $('#doctor_charges').on('input', calculatePortions);
    
    // Initial calculation
    calculatePortions();
});

// Function to limit the number of digits that can be entered
function limitDigits(input, maxDigits) {
    if (input.value.length > maxDigits) {
        input.value = input.value.slice(0, maxDigits);
    }
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/user/htdocs/srv617279.hstgr.cloud/resources/views/doctors/create.blade.php ENDPATH**/ ?>