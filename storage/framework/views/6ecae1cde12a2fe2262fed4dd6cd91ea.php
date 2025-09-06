
<?php $__env->startSection('content'); ?>
<div class="content">

    <!-- Breadcrumb -->
    <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
        <div class="my-auto mb-2">
            <h2 class="mb-1"><?php echo e($pageTitle); ?></h2>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(route('crimes-cases.index')); ?>"><i class="ti ti-smart-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><?php echo e($pageTitle); ?></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo e($subTitle ?? ''); ?></li>
                </ol>
            </nav>
        </div>
        <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
            <a href="<?php echo e(route('crimes-cases.create')); ?>" class="btn btn-primary d-flex align-items-center">
                <i class="ti ti-circle-plus me-2"></i>Add Crime Case
            </a>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <div>
        <?php if(Session::has('success')): ?>
            <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
        <?php endif; ?>
        <?php if(Session::has('fail')): ?>
            <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>
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
                            <th>Case #</th>
                            <th>Title</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Date/Time</th>
                            <th>Types</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $cases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $case): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($key+1); ?></td>
                            <td><?php echo e($case->case_number); ?></td>
                            <td><?php echo e($case->title); ?></td>
                            <td><?php echo e($case->location); ?></td>
                            <td>
                                <span class="badge 
                                    <?php echo e($case->status == 'Open' ? 'bg-success' : 
                                       ($case->status == 'Closed' ? 'bg-danger' : 'bg-warning')); ?>">
                                    <?php echo e($case->status); ?>

                                </span>
                            </td>
                            <td><?php echo e($case->date_time); ?></td>
                            <td>
                                <?php $__currentLoopData = $case->types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="badge bg-info"><?php echo e($type->name); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td>
                                <a href="<?php echo e(route('crimes-cases.show', $case->id)); ?>" class="btn btn-sm btn-light me-1" title="View">
                                    <i class="ti ti-eye"></i>
                                </a>
                                <a href="<?php echo e(route('crimes-cases.edit',$case->id)); ?>" class="btn btn-sm btn-info me-1">Edit</a>
                                <form action="<?php echo e(route('crimes-cases.destroy',$case->id)); ?>" method="POST" style="display:inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this case?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="8" class="text-center">No crime cases found.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('include.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\policeclerance\resources\views/crimecases/index.blade.php ENDPATH**/ ?>