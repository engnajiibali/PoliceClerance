
<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="card w-100">
        <div class="card-body">
            <h4><?php echo e($crimeType->name); ?></h4>
            <p><strong>Category:</strong> <?php echo e($crimeType->category?->name); ?></p>
            <p><strong>Description:</strong> <?php echo e($crimeType->description); ?></p>
            <a href="<?php echo e(route('crime-types.index')); ?>" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('include.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\policeclerance\resources\views/crime_types/show.blade.php ENDPATH**/ ?>