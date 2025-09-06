
<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
        <h2 class="mb-1"><?php echo e($pageTitle); ?></h2>
    </div>

    <div class="card w-100">
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('crime-types.store')); ?>">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label class="form-label">Crime Type Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" value="<?php echo e(old('name')); ?>">
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="category_id" class="form-control">
                        <option value="">-- Select Category --</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($cat->id); ?>" <?php echo e(old('category_id')==$cat->id?'selected':''); ?>>
                            <?php echo e($cat->name); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3"><?php echo e(old('description')); ?></textarea>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="<?php echo e(route('crime-types.index')); ?>" class="btn btn-outline-secondary me-2">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('include.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\policeclerance\resources\views/crime_types/create.blade.php ENDPATH**/ ?>