<?php $__env->startSection('title'); ?> Patients <?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<!-- DataTables -->
<link href="<?php echo e(URL::asset('/assets/libs/datatables/datatables.min.css')); ?>" rel="stylesheet" type="text/css" />
<!-- Select2 CSS -->
<link href="<?php echo e(URL::asset('/assets/libs/select2/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Patients</h4>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Patients')): ?>
                <a href="<?php echo e(route('patients.create')); ?>" class="btn btn-primary">Add New Patient</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Placeholder for dynamic alert messages -->
    <div id="status-alert" class="alert d-none" role="alert"></div>

    <?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Filter Patients</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="typeFilter" class="form-label">Patient Type</label>
                                <select id="typeFilter" class="form-control">
                                    <option value="">All Types</option>
                                    <option value="Free Consultancy">Free Consultancy</option>
                                    <option value="Regular Patient">Regular Patient</option>
                                    <option value="Gyne">Gyne(Gynecology)</option>
                                    <option value="I/F">I/F(Infertility)</option>
                                    <option value="Laboratory">Laboratory</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="doctorFilter" class="form-label">Doctor</label>
                                <select id="doctorFilter" class="form-control select2">
                                    <option value="">All Doctors</option>
                                    <option value="all_docs">Select All</option>
                                    <?php $__currentLoopData = \App\Models\Doctor::where('is_active', true)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($doctor->name); ?>"><?php echo e($doctor->name); ?> (<?php echo e($doctor->doctor_id); ?>)</option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="coordinatorFilter" class="form-label">Doctor's Coordinator</label>
                                <select id="coordinatorFilter" class="form-control select2">
                                    <option value="">All Coordinators</option>
                                    <option value="all_coords">Select All</option>
                                    <?php $__currentLoopData = \App\Models\Doctor::where('is_active', true)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($doctor->name); ?>"><?php echo e($doctor->name); ?> (<?php echo e($doctor->doctor_id); ?>)</option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered dt-responsive nowrap w-100" id="patients-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>FC-File</th>
                                <th>Name</th>
                                <th>Contact Number</th>
                                <th>Type</th>
                                <th>Doctor Coordinator</th>
                                <th>Doctor</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<!-- Required datatable js -->
<script src="<?php echo e(URL::asset('/assets/libs/datatables/datatables.min.js')); ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Handle "Select All" option for doctor filter
        $('#doctorFilter').on('change', function() {
            if ($(this).val() === 'all_docs') {
                // Reset to default "All Doctors" option
                $(this).val('').trigger('change');
            }
        });

        // Handle "Select All" option for coordinator filter
        $('#coordinatorFilter').on('change', function() {
            if ($(this).val() === 'all_coords') {
                // Reset to default "All Coordinators" option
                $(this).val('').trigger('change');
            }
        });

        // Initialize DataTable
        var table = $('#patients-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "<?php echo e(route('patients.index')); ?>",
                data: function(d) {
                    d.patient_type = $('#typeFilter').val();
                    d.doctor_name = $('#doctorFilter').val();
                    d.coordinator_name = $('#coordinatorFilter').val();
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'fc_file',
                    name: 'fc_file',
                    defaultContent: 'N/A'
                },
                {
                    data: 'patient_name',
                    name: 'patient_name'
                },
                {
                    data: 'patient_contact',
                    name: 'patient_contact'
                },
                {
                    data: 'type',
                    name: 'type'
                },
                {
                    data: 'doctor_coordinator.name',
                    name: 'doctorCoordinator.name'
                },
                {
                    data: 'doctor.name',
                    name: 'doctor.name',
                    defaultContent: 'N/A'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
            responsive: true,
            pageLength: 25,
            order: [
                [1, 'desc']
            ],
            // dom: '<"row"<"col-sm-4"l><"col-sm-4 text-center"B><"col-sm-4"f>><"row"<"col-sm-12"tr>><"row"<"col-sm-5"i><"col-sm-7"p>>',
            //     buttons: [
            //         'copy', 'csv', 'excel', 'pdf', 'print'
            //     ]
            
            // buttons: [
            //     'copy', 'csv', 'excel', 'pdf', 'print'
            // ]
        });

        // Apply filters when dropdown values change
        $('#typeFilter, #doctorFilter, #coordinatorFilter').change(function() {
            table.draw();
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/user/htdocs/srv617279.hstgr.cloud/resources/views/patients/index.blade.php ENDPATH**/ ?>