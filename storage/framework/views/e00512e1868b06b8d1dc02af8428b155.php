
<?php $__env->startSection('content'); ?>
<div class="content">
    <!-- Breadcrumb -->
    <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
        <div class="my-auto mb-2">
            <h2 class="mb-1"><?php echo e($pageTitle); ?></h2>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href=""><i class="ti ti-smart-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        Superadmin
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo e($pageTitle); ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Alert Messages -->
    <div>
        <?php if(Session::has('success')): ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> <?php echo e(Session::get('success')); ?></h4>
        </div>
        <?php endif; ?>
        <?php if(Session::has('fail')): ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> <?php echo e(Session::get('fail')); ?></h4>
        </div>
        <?php endif; ?>
    </div>

    <div class="row">
        <!-- Crime Categories List -->
        <div class="col-xxl-8 col-xl-8 d-flex">
            <div class="card w-100">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                    <h5><?php echo e($pageTitle); ?></h5>
                </div>
                <div class="card-body p-0">
                    <div class="custom-datatable-filter table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Category Name</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($i); ?></td>
                                    <td><?php echo e($category->name); ?></td>
                                    <td><?php echo e($category->created_at->diffForHumans()); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('crime-categories.edit', $category->id)); ?>" class="btn btn-warning btn-sm">
                                            <i class="fa fa-pencil"></i> Edit
                                        </a>
                                        <form action="<?php echo e(route('crime-categories.destroy', $category->id)); ?>" method="POST" style="display:inline-block;" 
                                            onsubmit="return confirm('Are you sure you want to delete this category?');">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="4" class="text-center">No categories found.</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Crime Category Form -->
        <div class="col-xxl-4 col-xl-4 d-flex">
            <div class="card w-100">
                <div class="card-body">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Crime Category</h4>
                        </div>
                        <hr>
                        <div class="modal-body pb-0">
                            <form method="POST" action="<?php echo e(route('crime-categories.store')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Category Name <strong class="text-danger">*</strong></label>
                                            <input type="text" class="form-control" name="name" placeholder="Category Name" value="<?php echo e(old('name')); ?>">
                                            <span class="text-danger"><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-end">
                                    <a href="<?php echo e(route('crime-categories.index')); ?>" type="button" class="btn btn-outline-light border me-3">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Crime Category Form -->
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('include.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\policeclerance\resources\views/crime_categories/index.blade.php ENDPATH**/ ?>