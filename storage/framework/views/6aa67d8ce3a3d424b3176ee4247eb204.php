
<?php $__env->startSection('content'); ?>
<div class="content">

    <div class="page-header">
        <h3 class="page-title">Applications Crime Check</h3>
    </div>

    <?php if(Session::has('success')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
    <?php endif; ?>

    <?php if(Session::has('found')): ?>
        <div class="alert alert-warning">Crime record already exists! Status: <?php echo e(Session::get('found')); ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Application ID</th>
                <th>Applicant Name</th>
                <th>Phone</th>
                <th>Crime Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $crime = $crimes->where('application_id', $app->id)->first();
                ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($app->id); ?></td>
                    <td><?php echo e($app->applicant->FullName ?? '-'); ?></td>
                    <td><?php echo e($app->applicant->Phone ?? '-'); ?></td>
                    <td>
                        <?php if($crime): ?>
                            <?php if($crime->status == 'verified'): ?>
                                <span class="badge bg-success">Verified</span>
                            <?php elseif($crime->status == 'pending'): ?>
                                <span class="badge bg-warning">Pending</span>
                            <?php else: ?>
                                <span class="badge bg-danger"><?php echo e(ucfirst($crime->status)); ?></span>
                            <?php endif; ?>
                        <?php else: ?>
                            <span class="badge bg-secondary">Not Found</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($crime): ?>
                            <button class="btn btn-secondary" disabled>Checked</button>
                        <?php else: ?>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#generateModal<?php echo e($app->id); ?>">
                              Generate Certificate
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="generateModal<?php echo e($app->id); ?>" tabindex="-1" aria-labelledby="modalLabel<?php echo e($app->id); ?>" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel<?php echo e($app->id); ?>">Confirm Certificate Generation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    Are you sure you want to generate a crime certificate for <strong><?php echo e($app->applicant->FullName ?? '-'); ?></strong>?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                    <form action="<?php echo e(route('crimes.check', $app->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-primary">Yes, Generate</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('include.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\policeclerance\resources\views/crimes/index.blade.php ENDPATH**/ ?>