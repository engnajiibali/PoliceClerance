

<?php $__env->startSection('case-content'); ?>
     <h5>Witnesses for Case #<?php echo e($crimecase->case_number); ?></h5>
  <?php if($crimecase->witnesses->count()): ?>
    <table class="table table-bordered">
      <thead><tr><th>#</th><th>Person ID</th><th>Name</th></tr></thead>
      <tbody>
        <?php $__currentLoopData = $crimecase->witnesses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $witness): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($key+1); ?></td>
            <td><?php echo e($witness->persons->id ?? 'Unknown'); ?></td>
            <td><?php echo e($witness->persons->FullName ?? 'Unknown'); ?></td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  <?php else: ?>
    <p class="text-muted">No witnesses found.</p>
  <?php endif; ?>
<?php $__env->stopSection(); ?>






<?php echo $__env->make('crimecases.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\policeclerance\resources\views/crimecases/witnesses.blade.php ENDPATH**/ ?>