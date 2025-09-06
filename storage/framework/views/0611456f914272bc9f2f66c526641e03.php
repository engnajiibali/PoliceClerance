
<?php $__env->startSection('content'); ?>
<div class="content">

<!-- Breadcrumb -->
<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
<div class="my-auto mb-2">
<h2 class="mb-1"><?php echo e($pageTitle); ?></h2>
<nav>
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item">
<a href="<?php echo e(route('applicants.index')); ?>"><i class="ti ti-smart-home"></i></a>
</li>
<li class="breadcrumb-item"><?php echo e($pageTitle); ?></li>
<li class="breadcrumb-item active" aria-current="page"><?php echo e($subTitle); ?></li>
</ol>
</nav>
</div>
<div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
<a href="<?php echo e(route('applicants.create')); ?>" class="btn btn-primary d-flex align-items-center">
<i class="ti ti-circle-plus me-2"></i>Add Applicant
</a>
</div>
</div>
<!-- /Breadcrumb -->

<div>
<?php if(Session::has('success')): ?>
<div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
<?php endif; ?>
</div>

<div class="card">
<div class="card-body p-3">
<h5><?php echo e($pageTitle); ?></h5>

<div class="table-responsive mt-3">
<table class="table table-bordered">
<thead>
<tr>
<th>#</th>
<th>Full Name</th>
<th>Gender</th>
<th>National ID</th>
<th>Phone</th>
<th>Email</th>
<th>Region</th>
<th>District</th>
<th>Branch</th>
<th>Finger Print</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php $__currentLoopData = $applicants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $applicant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td><?php echo e($key+1); ?></td>
<td><?php echo e($applicant->first_name); ?> <?php echo e($applicant->last_name); ?></td>
<td><?php echo e($applicant->gender); ?></td>
<td><?php echo e($applicant->national_id); ?></td>
<td><?php echo e($applicant->phone); ?></td>
<td><?php echo e($applicant->email); ?></td>
<td><?php echo e(optional($applicant->region)->name); ?></td>
<td><?php echo e(optional($applicant->district)->name); ?></td>
<td><?php echo e(optional($applicant->branch)->name); ?></td>
<td>
<?php if($applicant->fingerStatus == 0): ?>
<a href="<?php echo e(route('finger.collect', $applicant->id)); ?>" class="btn btn-sm btn-primary">
Collect Finger
</a>
<?php else: ?>
<a href="<?php echo e(route('finger.change', $applicant->id)); ?>" class="btn btn-sm btn-success">
Change Finger
</a>
<?php endif; ?>
</td>

<td>
<a href="<?php echo e(route('applicants.show', $applicant->id)); ?>" class="btn btn-sm btn-light me-1" title="View">
<i class="ti ti-eye"></i>
</a>
<a href="<?php echo e(route('applicants.edit',$applicant->id)); ?>" class="btn btn-sm btn-info">Edit</a>
<form action="<?php echo e(route('applicants.destroy',$applicant->id)); ?>" method="POST" style="display:inline">
<?php echo csrf_field(); ?>
<?php echo method_field('DELETE'); ?>
<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this applicant?')">Delete</button>
</form>
</td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table>
</div>

</div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('include.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\policeclerance\resources\views/applicants/index.blade.php ENDPATH**/ ?>