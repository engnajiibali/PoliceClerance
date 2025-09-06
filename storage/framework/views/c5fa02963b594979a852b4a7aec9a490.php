

<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Fingerprint Details</h3>
            </div>
        </div>
    </div>

    
    <div>
        <?php if(Session::has('success')): ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <h4><i class="icon fa fa-check"></i> <?php echo e(Session::get('success')); ?></h4>
            </div>
        <?php endif; ?>
        <?php if(Session::has('fail')): ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <h4><i class="icon fa fa-times"></i> <?php echo e(Session::get('fail')); ?></h4>
            </div>
        <?php endif; ?>
    </div>

    
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Personal Information</h5>
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> Salmaan Haaji Saalax</p>
                    <p><strong>ID:</strong> 21585458</p>
                    <p><strong>Created at:</strong> 27 08/ 2025</p>
                </div>
            </div>
        </div>
    </div>

    
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0">Collected Fingerprints</h5>
                </div>
                <div class="card-body">
                    <?php if($fingers->count() > 0): ?>
                        <div class="row">
                            <?php $__currentLoopData = $fingers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $finger): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-3 text-center mb-4">
                                    <div class="border rounded p-3">
                                        <h6 class="mb-2"><?php echo e(strtoupper(str_replace('_', ' ', $finger->finger_name))); ?></h6>
                                        <?php if($finger->finger_img && file_exists(public_path($finger->finger_img))): ?>
                                            <img src="<?php echo e(asset('public/'.$finger->finger_img)); ?>" 
                                                 alt="Fingerprint" 
                                                 class="img-fluid rounded shadow-sm" 
                                                 style="max-height: 150px;">
                                        <?php else: ?>
                                            <p class="text-muted">No image</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php else: ?>
                        <p class="text-muted">No fingerprints registered for this person.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('include.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\gmpf\resources\views/fingerPrint/show.blade.php ENDPATH**/ ?>