
<?php $__env->startSection('content'); ?>
<div class="content">

    <div class="page-header">
        <h3 class="page-title">Edit Applicant</h3>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="<?php echo e(route('applicants.update', $applicant->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="row">
                    <div class="col-sm-4">
                        <label>First Name</label>
                        <input type="text" name="first_name" class="form-control" value="<?php echo e(old('first_name',$applicant->first_name)); ?>">
                    </div>
                    <div class="col-sm-4">
                        <label>Middle Name</label>
                        <input type="text" name="middle_name" class="form-control" value="<?php echo e(old('middle_name',$applicant->middle_name)); ?>">
                    </div>
                    <div class="col-sm-4">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="<?php echo e(old('last_name',$applicant->last_name)); ?>">
                    </div>

                    <div class="col-sm-4 mt-3">
                        <label>Date of Birth</label>
                        <input type="date" name="dob" class="form-control" value="<?php echo e(old('dob',$applicant->dob)); ?>">
                    </div>
                    <div class="col-sm-4 mt-3">
                        <label>Gender</label>
                        <select name="gender" class="form-control">
                            <option value="Male" <?php echo e($applicant->gender=='Male'?'selected':''); ?>>Male</option>
                            <option value="Female" <?php echo e($applicant->gender=='Female'?'selected':''); ?>>Female</option>
                        </select>
                    </div>
                    <div class="col-sm-4 mt-3">
                        <label>National ID</label>
                        <input type="text" name="national_id" class="form-control" value="<?php echo e(old('national_id',$applicant->national_id)); ?>">
                    </div>

                    <div class="col-sm-6 mt-3">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" value="<?php echo e(old('phone',$applicant->phone)); ?>">
                    </div>
                    <div class="col-sm-6 mt-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo e(old('email',$applicant->email)); ?>">
                    </div>

                    <div class="col-sm-12 mt-3">
                        <label>Address</label>
                        <textarea name="address" class="form-control"><?php echo e(old('address',$applicant->address)); ?></textarea>
                    </div>

                    <div class="col-sm-4 mt-3">
                        <label>Region</label>
                        <select name="region_id" class="form-control">
                            <?php $__currentLoopData = $regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($region->id); ?>" <?php echo e($applicant->region_id==$region->id?'selected':''); ?>><?php echo e($region->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-sm-4 mt-3">
                        <label>District</label>
                        <select name="district_id" class="form-control">
                            <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($district->id); ?>" <?php echo e($applicant->district_id==$district->id?'selected':''); ?>><?php echo e($district->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-sm-4 mt-3">
                        <label>Branch</label>
                        <select name="branch_id" class="form-control">
                            <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($branch->id); ?>" <?php echo e($applicant->branch_id==$branch->id?'selected':''); ?>><?php echo e($branch->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="col-sm-12 mt-3">
                        <label>Photo</label><br>
                        <?php if($applicant->photo_path): ?>
                            <img src="<?php echo e(asset($applicant->photo_path)); ?>" width="80" class="mb-2">
                        <?php endif; ?>
                        <input type="file" name="photo_path" class="form-control">
                    </div>

                </div>

                <div class="mt-4 text-end">
                    <a href="<?php echo e(route('applicants.index')); ?>" class="btn btn-light">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Applicant</button>
                </div>
            </form>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('include.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\policeclerance\resources\views/applicants/edit.blade.php ENDPATH**/ ?>