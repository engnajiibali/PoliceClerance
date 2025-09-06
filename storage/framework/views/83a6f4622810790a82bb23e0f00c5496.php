

<?php $__env->startSection('content'); ?>
<div class="content">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Edit Crime Case</h3>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

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
                <h4><i class="icon fa fa-times"></i> <?php echo e(Session::get('fail')); ?></h4>
            </div>
        <?php endif; ?>
    </div>

    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Update Crime Case</h5>
                </div>
                <div class="card-body">
                    <!-- Form Start -->
                    <form id="caseForm" method="post" action="<?php echo e(route('crimecases.update', $crimecase->id)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Case Number</label>
                                    <input class="form-control" type="text" name="case_number" 
                                           value="<?php echo e(old('case_number', $crimecase->case_number)); ?>" placeholder="Enter Case Number">
                                    <span class="text-danger"><?php $__errorArgs = ['case_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Title</label>
                                    <input class="form-control" type="text" name="title" 
                                           value="<?php echo e(old('title', $crimecase->title)); ?>" placeholder="Case Title">
                                    <span class="text-danger"><?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-form-label">Description</label>
                                    <textarea class="form-control" name="description" rows="3" placeholder="Case Description"><?php echo e(old('description', $crimecase->description)); ?></textarea>
                                    <span class="text-danger"><?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Date & Time</label>
                                    <input class="form-control" type="datetime-local" name="date_time" 
                                           value="<?php echo e(old('date_time', $crimecase->date_time)); ?>">
                                    <span class="text-danger"><?php $__errorArgs = ['date_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Location</label>
                                    <input class="form-control" type="text" name="location" 
                                           value="<?php echo e(old('location', $crimecase->location)); ?>" placeholder="Case Location">
                                    <span class="text-danger"><?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Latitude</label>
                                    <input class="form-control" type="text" name="latitude" 
                                           value="<?php echo e(old('latitude', $crimecase->latitude)); ?>" placeholder="Latitude">
                                    <span class="text-danger"><?php $__errorArgs = ['latitude'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Longitude</label>
                                    <input class="form-control" type="text" name="longitude" 
                                           value="<?php echo e(old('longitude', $crimecase->longitude)); ?>" placeholder="Longitude">
                                    <span class="text-danger"><?php $__errorArgs = ['longitude'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Reported By</label>
                                    <input class="form-control" type="text" name="reported_by" 
                                           value="<?php echo e(old('reported_by', $crimecase->reported_by)); ?>" placeholder="Reporter Name">
                                    <span class="text-danger"><?php $__errorArgs = ['reported_by'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Assigned Officer</label>
                                    <input class="form-control" type="text" name="assigned_officer" 
                                           value="<?php echo e(old('assigned_officer', $crimecase->assigned_officer)); ?>" placeholder="Officer Name">
                                    <span class="text-danger"><?php $__errorArgs = ['assigned_officer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-form-label">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="Open" <?php echo e(old('status', $crimecase->status) == 'Open' ? 'selected' : ''); ?>>Open</option>
                                        <option value="Closed" <?php echo e(old('status', $crimecase->status) == 'Closed' ? 'selected' : ''); ?>>Closed</option>
                                        <option value="Pending" <?php echo e(old('status', $crimecase->status) == 'Pending' ? 'selected' : ''); ?>>Pending</option>
                                    </select>
                                    <span class="text-danger"><?php $__errorArgs = ['status'];
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
                        
                        <hr>
                        <br>
                        <div class="d-flex align-items-center justify-content-end">
                            <a href="<?php echo e(route('crimecases.index')); ?>" type="button" class="btn btn-outline-light border me-3">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                    <!-- Form End -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('include.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\policeclerance\resources\views/crimecases/edit.blade.php ENDPATH**/ ?>