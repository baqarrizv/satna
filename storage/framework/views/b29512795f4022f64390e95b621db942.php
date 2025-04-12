<?php $__env->startSection('title'); ?> Edit Doctor <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Edit Doctor</h4>
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
                    <form action="<?php echo e(route('doctors.update', $doctor->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

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
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('name', $doctor->name)); ?>" autocomplete="name">
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
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('dob', $doctor->dob)); ?>" autocomplete="bday">
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
                                        <option value="Male" <?php echo e(old('sex', $doctor->sex) == 'Male' ? 'selected' : ''); ?>>Male</option>
                                        <option value="Female" <?php echo e(old('sex', $doctor->sex) == 'Female' ? 'selected' : ''); ?>>Female</option>
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
                                        <option value="Single" <?php echo e(old('marital_status', $doctor->marital_status) == 'Single' ? 'selected' : ''); ?>>Single</option>
                                        <option value="Married" <?php echo e(old('marital_status', $doctor->marital_status) == 'Married' ? 'selected' : ''); ?>>Married</option>
                                        <option value="Divorced" <?php echo e(old('marital_status', $doctor->marital_status) == 'Divorced' ? 'selected' : ''); ?>>Divorced</option>
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
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('religion', $doctor->religion)); ?>" autocomplete="religion">
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
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('contact_number', $doctor->contact_number)); ?>">
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
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('cnic', $doctor->cnic)); ?>">
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
                                    'existingFiles' => $doctor->image ? [Storage::url($doctor->image)] : [],
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
                                    <textarea name="address" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old('address', $doctor->address)); ?></textarea>
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
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('date_of_appointment', $doctor->date_of_appointment)); ?>">
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
                                    <input type="text" name="specialist" required class="form-control <?php $__errorArgs = ['specialist'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('specialist', $doctor->specialist)); ?>">
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
                                    <select name="department_id" required class="form-control <?php $__errorArgs = ['department_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <option value="">Select Department</option>
                                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($department->id); ?>" <?php echo e(old('department_id', $doctor->department_id) == $department->id ? 'selected' : ''); ?>><?php echo e($department->name); ?></option>
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
                                    <input type="text" name="doctor_charges" id="doctor_charges" step="1" required class="form-control <?php $__errorArgs = ['doctor_charges'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('doctor_charges', $doctor->doctor_charges)); ?>" max="9999999" oninput="limitDigits(this, 7)">
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
                                    <input type="text" name="emergency_contact_name" class="form-control <?php $__errorArgs = ['emergency_contact_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('emergency_contact_name', $doctor->emergency_contact_name)); ?>">
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
                                    <input type="text" name="emergency_contact_relation" class="form-control <?php $__errorArgs = ['emergency_contact_relation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('emergency_contact_relation', $doctor->emergency_contact_relation)); ?>">
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
                                    <input type="text" name="emergency_contact_number" class="phone form-control <?php $__errorArgs = ['emergency_contact_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('emergency_contact_number', $doctor->emergency_contact_number)); ?>">
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
                                    <select name="payment_mode" class="form-control <?php $__errorArgs = ['payment_mode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <option value="">Select Payment Mode</option>
                                        <option value="Bank Transfer" <?php echo e(old('payment_mode', $doctor->payment_mode) == 'Bank Transfer' ? 'selected' : ''); ?>>Bank Transfer</option>
                                        <option value="Cash" <?php echo e(old('payment_mode', $doctor->payment_mode) == 'Cash' ? 'selected' : ''); ?>>Cash</option>
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

                            <!-- Account Title -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="account_title" class="form-label">Account Title</label>
                                    <input type="text" name="account_title" class="form-control <?php $__errorArgs = ['account_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('account_title', $doctor->account_title)); ?>">
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

                            <!-- Account Number -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="account_number" class="form-label">Account Number</label>
                                    <input type="text" name="account_number" class="form-control <?php $__errorArgs = ['account_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('account_number', $doctor->account_number)); ?>">
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

                            <!-- Bank Name -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="bank_name" class="form-label">Bank Name</label>
                                    <input type="text" name="bank_name" class="form-control <?php $__errorArgs = ['bank_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('bank_name', $doctor->bank_name)); ?>">
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
                        </div>

                        <div class="row">
                            <!-- Doctor Portion -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="doctor_portion" class="form-label">Doctor's Portion (%)</label>
                                    <input type="number" name="doctor_portion" id="doctor_portion" step="1" class="form-control <?php $__errorArgs = ['doctor_portion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('doctor_portion', $doctor->doctor_portion)); ?>">
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

                            <!-- Clinic Portion -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="clinic_portion" class="form-label">Clinic's Portion (%)</label>
                                    <input type="number" name="clinic_portion" id="clinic_portion" step="1" class="form-control <?php $__errorArgs = ['clinic_portion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('clinic_portion', $doctor->clinic_portion)); ?>">
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
unset($__errorArgs, $__bag); ?>" value="1" <?php echo e(old('is_coordinator', $doctor->is_coordinator) ? 'checked' : ''); ?>>
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

                        <!-- Active Status -->
                        <div class="col-md-3">
                            <div class="mb-3 form-check mt-4">
                                <input type="checkbox" id="is_active" name="is_active" class="form-check-input <?php $__errorArgs = ['is_active'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="1" <?php echo e(old('is_active', $doctor->is_active) ? 'checked' : ''); ?>>
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

                        <!-- Submit Button -->
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Update Doctor</button>
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
    // Function to limit the number of digits that can be entered
    // This function needs to be in global scope to work with oninput attribute
    function limitDigits(input, maxDigits) {
        if (input.value.length > maxDigits) {
            input.value = input.value.slice(0, maxDigits);
        }
    }

    $(document).ready(function() {
        // Apply input mask to CNIC field
        $('#cnic').inputmask('99999-9999999-9');

        // Apply input mask to Contact Number field with predefined 03 
        $('.phone').inputmask('(0399) 999-9999');
    });

    $(document).ready(function() {
        // Function to calculate and display amounts based on percentages
        function calculateAmounts() {
            let charges = parseFloat($('#doctor_charges').val()) || 0;
            let doctorPortion = parseFloat($('#doctor_portion').val()) || 0;
            let clinicPortion = 100 - doctorPortion;

            // Update clinic portion field
            $('#clinic_portion').val(clinicPortion);

            // Display amounts based on charges
            let doctorAmount = (doctorPortion / 100) * charges;
            let clinicAmount = (clinicPortion / 100) * charges;

            $('#doctor_portion_amount').text('Doctor\'s Portion: ' + doctorAmount.toFixed(2) + ' PKR');
            $('#clinic_portion_amount').text('Clinic\'s Portion: ' + clinicAmount.toFixed(2) + ' PKR');
        }

        // Function to automatically adjust the percentages and recalculate amounts
        function adjustPercentagesAndRecalculate() {
            let doctorPortion = parseFloat($('#doctor_portion').val()) || 0;
            let clinicPortion = 100 - doctorPortion;

            // Ensure clinic portion cannot be negative
            if (clinicPortion < 0) {
                clinicPortion = 0;
                $('#doctor_portion').val(100); // If doctor takes 100%, clinic gets 0%
            }

            // Set the clinic portion and calculate amounts
            $('#clinic_portion').val(clinicPortion);
            calculateAmounts();
        }

        // When doctor portion changes, update clinic portion and calculate amounts
        $('#doctor_portion').on('input', function() {
            adjustPercentagesAndRecalculate();
        });

        // When clinic portion changes, adjust doctor portion and calculate amounts
        $('#clinic_portion').on('input', function() {
            let clinicPortion = parseFloat($('#clinic_portion').val()) || 0;
            let doctorPortion = 100 - clinicPortion;

            // Ensure doctor portion cannot be negative
            if (doctorPortion < 0) {
                doctorPortion = 0;
                $('#clinic_portion').val(100); // If clinic takes 100%, doctor gets 0%
            }

            // Set the doctor portion and calculate amounts
            $('#doctor_portion').val(doctorPortion);
            calculateAmounts();
        });

        // When doctor charges change, recalculate the amounts based on the percentages
        $('#doctor_charges').on('input', function() {
            calculateAmounts();
        });

        // Initial calculation on page load
        calculateAmounts();
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/user/htdocs/srv617279.hstgr.cloud/resources/views/doctors/edit.blade.php ENDPATH**/ ?>