

<?php $__env->startSection('title'); ?> Departments <?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- DataTables -->
    <link href="<?php echo e(URL::asset('/assets/libs/datatables/datatables.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Departments</h4>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Department')): ?>
                    <a href="<?php echo e(route('departments.create')); ?>" class="btn btn-primary">Create New Department</a>
                <?php endif; ?>
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
                    <table class="table table-bordered dt-responsive nowrap w-100" id="departments-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Sequence</th>
                                <th>Actions</th>
                            </tr    >
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
        $(function () {
            var table = $('#departments-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "<?php echo e(route('departments.index')); ?>",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'name', name: 'name'},
                    {data: 'sequence', name: 'sequence'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                responsive: true,
                pageLength: 25,
                order: [[2, 'ASC']] // Order by created_at column descending
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/user/htdocs/srv617279.hstgr.cloud/resources/views/departments/index.blade.php ENDPATH**/ ?>