
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

    <div class="row justify-content-center">
        <div class="col-xxl-6 col-xl-6 d-flex">
            <div class="card w-100">
                <div class="card-body">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Crime Category</h4>
                        </div>
                        <hr>
                        <div class="modal-body pb-0">
                            <form method="POST" action="<?php echo e(route('crime-categories.update', $crimeCategory->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Category Name <strong class="text-danger">*</strong></label>
                                            <input type="text" class="form-control" name="name" placeholder="Category Name" value="<?php echo e(old('name', $crimeCategory->name)); ?>">
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
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" name="description" rows="3"><?php echo e(old('description', $crimeCategory->description)); ?></textarea>
                                    <span class="text-danger"><?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>
                                <div class="d-flex align-items-center justify-content-end">
                                    <a href="<?php echo e(route('crime-categories.index')); ?>" type="button" class="btn btn-outline-light border me-3">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('include.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\policeclerance\resources\views/crime_categories/edit.blade.php ENDPATH**/ ?>