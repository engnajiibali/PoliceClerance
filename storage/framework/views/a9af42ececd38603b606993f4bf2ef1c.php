

<?php $__env->startSection('case-content'); ?>
    <h5>Dhibanayaasha Kiiska #<?php echo e($crimecase->case_number); ?></h5>
    <?php if($crimecase->victims->count()): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th><th>Person ID</th><th>Name</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $crimecase->victims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $victim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($key+1); ?></td>
                        <td><?php echo e($victim->persons->id ?? 'Unknown'); ?></td>
                        <td><?php echo e($victim->persons->FullName ?? 'Unknown'); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-muted">No victims found.</p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('crimecases.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\policeclerance\resources\views/crimecases/victims.blade.php ENDPATH**/ ?>