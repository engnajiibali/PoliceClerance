
<?php $__env->startSection('content'); ?>
<div class="content">

    <div class="page-header">
        <h3 class="page-title">Edit Payment</h3>
    </div>

    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-body">
            <form action="<?php echo e(route('payments.update', $payment->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="row">
                    <div class="col-sm-6">
                        <label>Application</label>
                        <select name="application_id" class="form-select">
                            <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($app->id); ?>" <?php echo e(old('application_id', $payment->application_id) == $app->id ? 'selected' : ''); ?>>
                                <?php echo e($app->id); ?> - <?php echo e($app->application_type); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="col-sm-6">
                        <label>Amount</label>
                        <input type="number" name="amount" class="form-control" value="<?php echo e(old('amount', $payment->amount)); ?>">
                    </div>

                    <div class="col-sm-6 mt-3">
                        <label>Currency</label>
                        <input type="text" name="currency" class="form-control" value="<?php echo e(old('currency', $payment->currency)); ?>">
                    </div>

                    <div class="col-sm-6 mt-3">
                        <label>Payment Method</label>
                        <input type="text" name="payment_method" class="form-control" value="<?php echo e(old('payment_method', $payment->payment_method)); ?>">
                    </div>

                    <div class="col-sm-6 mt-3">
                        <label>Transaction ID</label>
                        <input type="text" name="transaction_id" class="form-control" value="<?php echo e(old('transaction_id', $payment->transaction_id)); ?>">
                    </div>

                    <div class="col-sm-6 mt-3">
                        <label>Payment Date</label>
                        <input type="date" name="payment_date" class="form-control" value="<?php echo e(old('payment_date', $payment->payment_date)); ?>">
                    </div>

                    <div class="col-sm-6 mt-3">
                        <label>Status</label>
                        <select name="status" class="form-select">
                            <option value="pending" <?php echo e(old('status', $payment->status)=='pending' ? 'selected' : ''); ?>>Pending</option>
                            <option value="completed" <?php echo e(old('status', $payment->status)=='completed' ? 'selected' : ''); ?>>Completed</option>
                            <option value="failed" <?php echo e(old('status', $payment->status)=='failed' ? 'selected' : ''); ?>>Failed</option>
                        </select>
                    </div>
                </div>

                <div class="mt-4 d-flex justify-content-end">
                    <a href="<?php echo e(route('payments.index')); ?>" class="btn btn-outline-light border me-3">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Payment</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('include.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\policeclerance\resources\views/payments/edit.blade.php ENDPATH**/ ?>