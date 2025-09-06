

<?php $__env->startSection('content'); ?>
<div class="content">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Add New Crime Case</h3>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <!-- Flash Messages -->
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
                <h5 class="card-title">Crime Case Form</h5>
            </div>
            <div class="card-body">
                <!-- Form Start -->
                <form method="post" action="<?php echo e(route('crimes-cases.store')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Case Number</label>
                                <input class="form-control" type="text" name="case_number" placeholder="Case Number" value="<?php echo e(old('case_number')); ?>">
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
                                <input class="form-control" type="text" name="title" placeholder="Title" value="<?php echo e(old('title')); ?>">
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
                                <textarea class="form-control" name="description" placeholder="Enter description"><?php echo e(old('description')); ?></textarea>
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
                                <input class="form-control" type="datetime-local" name="date_time" value="<?php echo e(old('date_time')); ?>">
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
                                <input class="form-control" type="text" name="location" placeholder="Crime Location" value="<?php echo e(old('location')); ?>">
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
                                <input class="form-control" type="text" name="latitude" placeholder="Latitude" value="<?php echo e(old('latitude')); ?>">
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
                                <input class="form-control" type="text" name="longitude" placeholder="Longitude" value="<?php echo e(old('longitude')); ?>">
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
                                <label class="col-form-label">Reported By (User ID)</label>
                                <input class="form-control" type="number" name="reported_by" placeholder="User ID" value="<?php echo e(old('reported_by')); ?>">
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
                                <label class="col-form-label">Assigned Officer (User ID)</label>
                                <input class="form-control" type="number" name="assigned_officer" placeholder="Officer ID" value="<?php echo e(old('assigned_officer')); ?>">
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
                                <select class="form-control" name="status">
                                    <option value="">-- Select Status --</option>
                                    <option value="open" <?php echo e(old('status')=='open' ? 'selected' : ''); ?>>Open</option>
                                    <option value="under_investigation" <?php echo e(old('status')=='under_investigation' ? 'selected' : ''); ?>>Under Investigation</option>
                                    <option value="closed" <?php echo e(old('status')=='closed' ? 'selected' : ''); ?>>Closed</option>
                                    <option value="forwarded_to_court" <?php echo e(old('status')=='forwarded_to_court' ? 'selected' : ''); ?>>Forwarded to Court</option>
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

                        <!-- Multi-select Crime Types -->
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">Crime Types</label>
                                <select name="crime_types[]" class="form-control select2" multiple  data-placeholder="Nooca Kiiska">
                                    <?php $__currentLoopData = $crimeTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($type->id); ?>" <?php echo e((collect(old('crime_types'))->contains($type->id)) ? 'selected':''); ?>>
                                            <?php echo e($type->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <span class="text-danger"><?php $__errorArgs = ['crime_types'];
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
                    <div class="d-flex align-items-center justify-content-end">
                        <a href="<?php echo e(route('crimes-cases.index')); ?>" type="button" class="btn btn-outline-light border me-3">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
                <!-- /Form End -->
            </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('select[name="crime_types[]"]').select2({
        placeholder: "Select crime types",
        allowClear: true
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('include.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\policeclerance\resources\views/crimecases/create.blade.php ENDPATH**/ ?>