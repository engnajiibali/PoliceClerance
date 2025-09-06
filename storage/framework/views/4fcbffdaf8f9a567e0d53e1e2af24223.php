
<?php $__env->startSection('content'); ?>
<div class="content">

    <div class="page-header">
        <h3 class="page-title">Add Application</h3>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="<?php echo e(route('applications.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="row">
                    <div class="col-sm-4">
                        <label>Applicant</label>
                        <select name="applicant_id" class="form-control">
                            <option value="">Select Applicant</option>
                            <?php $__currentLoopData = $applicants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $applicant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($applicant->id); ?>"><?php echo e($applicant->first_name); ?> <?php echo e($applicant->last_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="col-sm-4">
                        <label>Application Type</label>
                        <input type="text" name="application_type" class="form-control" value="<?php echo e(old('application_type')); ?>">
                    </div>

                    <div class="col-sm-4">
                        <label>Application Date</label>
                        <input type="date" name="application_date" class="form-control" value="<?php echo e(old('application_date')); ?>">
                    </div>

                    <div class="col-sm-4 mt-3">
                        <label>Status</label>
                        <input type="text" name="status" class="form-control" value="<?php echo e(old('status')); ?>">
                    </div>

                    <div class="col-sm-4 mt-3">
                        <label>Priority</label>
                        <input type="text" name="priority" class="form-control" value="<?php echo e(old('priority')); ?>">
                    </div>

                    <div class="col-sm-4 mt-3">
                        <label>Officer</label>
                        <select name="officer_id" class="form-control">
                            <option value="">Select Officer</option>
                            <?php $__currentLoopData = $officers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $officer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($officer->id); ?>"><?php echo e($officer->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="col-sm-4 mt-3">
                        <label>Branch</label>
                        <select name="branch_id" class="form-control">
                            <option value="">Select Branch</option>
                            <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($branch->id); ?>"><?php echo e($branch->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="col-sm-12 mt-3">
                        <label>Remarks</label>
                        <textarea name="remarks" class="form-control"><?php echo e(old('remarks')); ?></textarea>
                    </div>

                </div>

                <div class="mt-4 text-end">
                    <a href="<?php echo e(route('applications.index')); ?>" class="btn btn-light">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save Application</button>
                </div>
            </form>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('include.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\policeclerance\resources\views/applications/create.blade.php ENDPATH**/ ?>