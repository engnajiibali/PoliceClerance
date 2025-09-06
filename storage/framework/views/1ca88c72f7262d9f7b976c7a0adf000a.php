
<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="page-header">
        <h3 class="page-title"><?php echo e($pageTitle); ?></h3>
    </div>

    <a href="<?php echo e(route('payments.create')); ?>" class="btn btn-primary mb-3">Add Payment</a>

    <?php if(Session::has('success')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Application</th>
                <th>Amount</th>
                <th>Currency</th>
                <th>Payment Method</th>
                <th>Status</th>
                <th>Payment Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($payment->id); ?></td>
                <td><?php echo e($payment->application->id ?? ''); ?></td>
                <td><?php echo e($payment->amount); ?></td>
                <td><?php echo e($payment->currency); ?></td>
                <td><?php echo e($payment->payment_method); ?></td>
                <td><?php echo e($payment->status); ?></td>
                <td><?php echo e($payment->payment_date); ?></td>
                <td>
                    <a href="<?php echo e(route('payments.edit', $payment->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                    <form action="<?php echo e(route('payments.destroy', $payment->id)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this payment?')">Delete</button>
                    </form>
                    <a href="<?php echo e(route('payments.show', $payment->id)); ?>" class="btn btn-sm btn-info">View</a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <div class="mt-3"><?php echo e($payments->links()); ?></div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('include.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\policeclerance\resources\views/payments/index.blade.php ENDPATH**/ ?>