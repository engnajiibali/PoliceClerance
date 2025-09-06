
<?php $__env->startSection('content'); ?>
<div class="content">

    <div class="page-header">
        <h3 class="page-title">Paid Payments</h3>
    </div>

    <?php if(Session::has('success')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
    <?php endif; ?>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Application ID</th>
                        <th>Applicant</th>
                        <th>Amount</th>
                        <th>Currency</th>
                        <th>Payment Method</th>
                        <th>Payment Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($payment->status == 'completed'): ?>
                        <?php
                            // Check if crime record exists
                            $crime = \App\Models\Crime::where('application_id', $payment->application->id ?? 0)->first();
                        ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($payment->application->id ?? '-'); ?></td>
                            <td><?php echo e($payment->application->applicant->FullName ?? '-'); ?></td>
                            <td><?php echo e($payment->amount); ?></td>
                            <td><?php echo e($payment->currency); ?></td>
                            <td><?php echo e($payment->payment_method); ?></td>
                            <td><?php echo e($payment->payment_date); ?></td>
                            <td><span class="badge bg-success">Paid</span></td>
                            <td>
                                <form action="<?php echo e(route('crimes.check',$payment->application->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php if($crime): ?>
                                        <button class="btn btn-secondary" disabled>Checked</button>
                                    <?php else: ?>
                                        <button type="submit" class="btn btn-primary">Check / Generate Certificate</button>
                                    <?php endif; ?>
                                </form>
                            </td>
                        </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('include.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\policeclerance\resources\views/payments/paid.blade.php ENDPATH**/ ?>