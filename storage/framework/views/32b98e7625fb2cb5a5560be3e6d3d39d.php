
<?php $__env->startSection('content'); ?>
<div class="content">
<!-- Breadcrumb -->
<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
<div class="my-auto mb-2">
<h2 class="mb-1"><?php echo e($pageTitle); ?></h2>
<nav>
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item">
<a href="index.html"><i class="ti ti-smart-home"></i></a>
</li>
<li class="breadcrumb-item">
Superadmin
</li>
<li class="breadcrumb-item active" aria-current="page"><?php echo e($pageTitle); ?></li>
</ol>
</nav>
</div>
<div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">


<div class="head-icons ms-2">
<a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Collapse" id="collapse-header">
<i class="ti ti-chevrons-up"></i>
</a>
</div>
</div>
</div>
<!-- /Breadcrumb -->
<div>
<?php if(Session::has('success')): ?>
<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4><i class="icon fa fa-check"></i> <?php echo e(Session::get('success')); ?></h4>
</div>
<?php endif; ?>
<?php if(Session::has('fail')): ?>
<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4><i class="icon fa fa-check"></i> <?php echo e(Session::get('fail')); ?></h4>
</div>
<?php endif; ?>
</div>
<br>
<!-- Performance Indicator list -->
<!-- Performance Indicator list -->
<div class="row">

<!-- Recently Registered -->
<div class="col-xxl-8 col-xl-8 d-flex">
<div class="card w-100">

<div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
<h5>Payment Methods List</h5>

</div>
<div class="card-body p-0">
<div class="custom-datatable-filter table-responsive">
<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Campaign Name</th>
            <th>SMS Type</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php $__empty_1 = true; $__currentLoopData = $Messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sms): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($i); ?></td>
                <td><?php echo e($sms->campign_name); ?></td>
                <td><?php echo e($sms->SmsType); ?></td>
                <td><?php echo e($sms->created_at->diffForHumans()); ?></td>
                <td>
                    <!-- View Button -->
                    <a href="<?php echo e(route('sms.show', $sms->id)); ?>" class="btn btn-primary btn-sm">
                        <i class="fa fa-eye"></i>
                    </a>

                    <!-- Delete Button -->
                    <form action="<?php echo e(route('sms.destroy', $sms->id)); ?>" method="POST" style="display:inline-block;" 
                          onsubmit="return confirm('Are you sure you want to delete this SMS?');">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="6" class="text-center">No messages found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
</div>
</div>
<!-- /Performance Indicator list -->
</div>
</div>
<!-- /Recently Registered -->

<!-- Recent Plan Expired -->
<div class="col-xxl-4 col-xl-4 d-flex">
<div class="card w-100">
<div class="card-body">
<!-- Company Detail -->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Send SMS<</h4>
</div>
<hr>
<div class="modal-body pb-0">
<form method="POST" action="<?php echo e(route('sms.store')); ?>">
<?php echo csrf_field(); ?>
<div class="row">
<div class="col-md-12">
<div class="mb-3">
<label class="form-label">campign Name<strong class="text-danger">*</strong></label>
<input type="text" class="form-control" name="campign" placeholder="Campign Name" value="<?php echo e(old('campign')); ?>">
<span class="text-danger"><?php $__errorArgs = ['campign'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
</div>
</div>
<div class="col-md-12">
<div class="mb-3">
<label class="form-label">Select Template<strong class="text-danger">*</strong></label>
<select class="form-control" name="sms_template" id="sms_template">
<option value="">Select Template</option>
<?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option 
value="<?php echo e($template->id); ?>" 
data-body="<?php echo e($template->body); ?>" 
<?php echo e(old('sms_template') == $template->id ? 'selected' : ''); ?>

>
<?php echo e($template->name); ?>

</option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
<span class="text-danger"><?php $__errorArgs = ['sms_template'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
</div>
</div>
<div class="col-md-12">
<div class="mb-3">
<label class="form-label">To (Number)<strong class="text-danger">*</strong></label>
<input type="text" class="form-control" name="telephone" placeholder="Enter phone number" value="<?php echo e(old('telephone')); ?>">
<span class="text-danger"><?php $__errorArgs = ['telephone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
</div>
</div>
<div class="col-md-12">
<div class="mb-3">
<label class="form-label">Send To Group<strong class="text-danger">*</strong></label>
<select class="form-control" name="SmsType">
<option value="Single Number" <?php echo e(old('SmsType') == 'Single Number' ? 'selected' : ''); ?>>Single Number</option>
<option value="Client" <?php echo e(old('SmsType') == 'Client' ? 'selected' : ''); ?>>Client</option>
<option value="employee" <?php echo e(old('SmsType') == 'employee' ? 'selected' : ''); ?>>Employee</option>
</select>
<span class="text-danger"><?php $__errorArgs = ['SmsType'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
</div>
</div>
<div class="col-md-12">
<div class="mb-3">
<label class="form-label">Message<strong class="text-danger">*</strong></label>
<textarea class="form-control" name="message" rows="3" placeholder="Enter your message" id="messages"><?php echo e(old('message')); ?></textarea>
<span class="text-danger"><?php $__errorArgs = ['message'];
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
<div class="d-flex align-items-center justify-content-end">
<a href="<?php echo e(route('sms.index')); ?>" type="button" class="btn btn-outline-light border me-3">Cancel</a>
<button type="submit" class="btn btn-primary">Send</button>
</div>
</form>
</div>
</div>
<!-- /Company Detail -->

</div>
</div>
<!-- /Recent Plan Expired -->

</div>

<!-- /Performance Indicator list -->
</div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('include.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\policeclerance\resources\views/sms/index.blade.php ENDPATH**/ ?>