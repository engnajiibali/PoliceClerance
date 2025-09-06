
<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
        <div class="my-auto mb-2">
            <h2 class="mb-1"><?php echo e($pageTitle); ?></h2>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href=""><i class="ti ti-smart-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">Superadmin</li>
                    <li class="breadcrumb-item active"><?php echo e($pageTitle); ?></li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="<?php echo e(route('crime-types.create')); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add Crime Type</a>
        </div>
    </div>

    <?php if(Session::has('success')): ?>
    <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
    <?php endif; ?>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th width="180px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $crimeTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($type->name); ?></td>
                        <td><?php echo e($type->category?->name); ?></td>
                        <td><?php echo e($type->description); ?></td>
                        <td>
                            <a href="<?php echo e(route('crime-types.show',$type->id)); ?>" class="btn btn-info btn-sm">View</a>
                            <a href="<?php echo e(route('crime-types.edit',$type->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <form action="<?php echo e(route('crime-types.destroy',$type->id)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" onclick="return confirm('Delete this record?')" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php echo e($crimeTypes->links()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('include.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\policeclerance\resources\views/crime_types/index.blade.php ENDPATH**/ ?>