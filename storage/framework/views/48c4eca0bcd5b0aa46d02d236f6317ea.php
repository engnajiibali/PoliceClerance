

<?php $__env->startSection('case-content'); ?>
     <h5>Evidence for Case #<?php echo e($crimecase->case_number); ?></h5>
  <?php if($crimecase->evidence->count()): ?>
    <table class="table table-bordered">
      <thead><tr><th>#</th><th>Description</th><th>File</th></tr></thead>
      <tbody>
        <?php $__currentLoopData = $crimecase->evidence; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($key+1); ?></td>
            <td><?php echo e($item->description ?? '-'); ?></td>
            <td>
              <?php if($item->file_path): ?>
                <a href="<?php echo e(asset('storage/evidence/'.$item->file_path)); ?>" target="_blank">View File</a>
              <?php else: ?>
                -
              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  <?php else: ?>
    <p class="text-muted">No evidence found.</p>
  <?php endif; ?>
<?php $__env->stopSection(); ?>













<?php echo $__env->make('crimecases.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\policeclerance\resources\views/crimecases/evidence.blade.php ENDPATH**/ ?>