

<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="page-header">
        <h3 class="page-title">Certificates List</h3>
    </div>

    <?php if(Session::has('success')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
    <?php endif; ?>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Certificate Number</th>
                <th>Applicant</th>
                <th>Application ID</th>
                <th>Issue Date</th>
                <th>Expiry Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $certificates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($cert->certificate_number); ?></td>
                <td><?php echo e($cert->application->applicant->FullName ?? '-'); ?></td>
                <td><?php echo e($cert->application->id ?? '-'); ?></td>
                <td><?php echo e($cert->issue_date); ?></td>
                <td><?php echo e($cert->expiry_date); ?></td>
                <td><?php echo e($cert->status); ?></td>
                <td>
                    <a href="<?php echo e(route('certificates.show', $cert->id)); ?>" class="btn btn-primary btn-sm">View</a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('include.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\policeclerance\resources\views/certificates/index.blade.php ENDPATH**/ ?>