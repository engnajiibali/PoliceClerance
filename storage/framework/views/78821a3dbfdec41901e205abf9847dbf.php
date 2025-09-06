
<?php $__env->startSection('content'); ?>
<div class="content">

    <div class="page-header">
        <h3 class="page-title">Payment Details</h3>
    </div>

    <?php if(Session::has('success')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
    <?php endif; ?>

    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-sm-6">
                    <strong>Application ID:</strong> <?php echo e($payment->application->id ?? 'N/A'); ?> <br>
                    <strong>Application Type:</strong> <?php echo e($payment->application->application_type ?? 'N/A'); ?>

                </div>
                <div class="col-sm-6">
                    <strong>Amount:</strong> <?php echo e($payment->amount); ?> <?php echo e($payment->currency); ?> <br>
                    <strong>Payment Method:</strong> <?php echo e($payment->payment_method); ?>

                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <strong>Transaction ID:</strong> <?php echo e($payment->transaction_id ?? '-'); ?> <br>
                    <strong>Payment Date:</strong> <?php echo e($payment->payment_date); ?>

                </div>
                <div class="col-sm-6">
                    <strong>Status:</strong> 
                    <?php if($payment->status == 'pending'): ?>
                        <span class="badge bg-warning">Pending</span>
                    <?php elseif($payment->status == 'completed'): ?>
                        <span class="badge bg-success">Completed</span>
                    <?php else: ?>
                        <span class="badge bg-danger"><?php echo e(ucfirst($payment->status)); ?></span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="mt-3 d-flex justify-content-end gap-2">
                <a href="<?php echo e(route('payments.index')); ?>" class="btn btn-outline-light border">Back</a>

                <!-- Show Pay Button only if pending -->
                <?php if($payment->status == 'pending'): ?>
                <form action="<?php echo e(route('payments.pay', $payment->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <button type="submit" class="btn btn-success">Pay Now</button>
                </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('include.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\policeclerance\resources\views/payments/show.blade.php ENDPATH**/ ?>