
<?php $__env->startSection('content'); ?>
<div class="content">

    <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
        <div class="my-auto mb-2">
            <h2 class="mb-1"><?php echo e($pageTitle); ?></h2>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('applications.index')); ?>"><i class="ti ti-smart-home"></i></a></li>
                    <li class="breadcrumb-item"><?php echo e($pageTitle); ?></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo e($subTitle); ?></li>
                </ol>
            </nav>
        </div>
        <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
            <a href="<?php echo e(route('applications.create')); ?>" class="btn btn-primary d-flex align-items-center">
                <i class="ti ti-circle-plus me-2"></i>Add Application
            </a>
        </div>
    </div>

    <div>
        <?php if(Session::has('success')): ?>
            <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
        <?php endif; ?>
    </div>

    <div class="card">
        <div class="card-body p-3">
            <h5><?php echo e($pageTitle); ?></h5>
            <div class="table-responsive mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Applicant</th>
                            <th>Application Type</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Priority</th>
                            <th>Officer</th>
                            <th>Branch</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($key+1); ?></td>
                            <td><?php echo e(optional($application->applicant)->first_name); ?> <?php echo e(optional($application->applicant)->last_name); ?></td>
                            <td><?php echo e($application->application_type); ?></td>
                            <td><?php echo e($application->application_date); ?></td>
                            <td><?php echo e($application->status); ?></td>
                            <td><?php echo e($application->priority); ?></td>
                            <td><?php echo e(optional($application->officer)->name); ?></td>
                            <td><?php echo e(optional($application->branch)->name); ?></td>
                            <td>
                                <a href="<?php echo e(route('applications.show', $application->id)); ?>" class="btn btn-sm btn-info">View</a>
                                <a href="<?php echo e(route('applications.edit', $application->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                                <form action="<?php echo e(route('applications.destroy', $application->id)); ?>" method="POST" style="display:inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this application?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('include.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\policeclerance\resources\views/applications/index.blade.php ENDPATH**/ ?>