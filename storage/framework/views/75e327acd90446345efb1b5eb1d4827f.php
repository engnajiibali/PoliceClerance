
<?php $__env->startSection('content'); ?>

<div class="content">

<!-- Breadcrumb -->
<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
<div class="my-auto mb-2">
<h2 class="mb-1"><?php echo e($subTitle); ?></h2>
<nav>
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item">
<a href="index.html"><i class="ti ti-smart-home"></i></a>
</li>
<li class="breadcrumb-item">
Superadmin
</li>
<li class="breadcrumb-item active" aria-current="page"><?php echo e($subTitle); ?></li>
</ol>
</nav>
</div>
<div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
<div class="me-2 mb-2">
<div class="dropdown">
<a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
<i class="ti ti-file-export me-1"></i>Export
</a>
<ul class="dropdown-menu  dropdown-menu-end p-3">
<li>
<a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-file-type-pdf me-1"></i>Export as PDF</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-file-type-xls me-1"></i>Export as Excel </a>
</li>
</ul>
</div>
</div>
<div class="mb-2">
<a href="<?php echo e(asset('users/create')); ?>" class="btn btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Add User</a>
</div>
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
<div class="card">
<div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
<h5>Users List</h5>
<div class="d-flex my-xl-auto right-content align-items-center flex-wrap row-gap-3">

<div class="dropdown me-3">
         <select name="role" class="form-select" required>
                                            <option selected disabled value="">Search Role</option>
                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(old('role') == $role->id ? 'selected' : ''); ?> value="<?php echo e($role->id); ?>"><?php echo e($role->Role); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
</div>
<div class="dropdown me-3">
<a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
Status
</a>
<ul class="dropdown-menu  dropdown-menu-end p-3">
<li>
<a href="javascript:void(0);" class="dropdown-item rounded-1">Active</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item rounded-1">Inactive</a>
</li>
</ul>
</div>
<a href="#" class="btn btn-primary d-flex align-items-center"><i class="ti ti-search me-2"></i>Search</a>
</div>
</div>
<div class="card-body p-0">
<div class="custom-datatable-filter table-responsive">
<table class="table">
<thead class="thead-light">
<tr>
<th class="no-sort">
#
</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Created Date</th>
<th>Role</th>
<th>Status</th>
<th></th>
</tr>
</thead>
<tbody>
<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td>
<?php echo e($loop->iteration); ?> 
</td>
<td>
<div class="d-flex align-items-center file-name-icon">
<a href="#" class="avatar avatar-md avatar-rounded">
<img src="<?php echo e(asset('public/upload/userImge/'.$user->photo)); ?>" class="img-fluid" alt="img">
</a>
<div class="ms-2">
<h6 class="fw-medium"><a href="#"><?php echo e($user->full_name); ?></a></h6>
</div>
</div>
</td>
<td><?php echo e($user->email); ?></td>
<td><?php echo e($user->phone); ?></td>
<td><?php echo e(optional($user->created_at)->format('d M Y')); ?></td>
<td>
<span class=" badge badge-md p-2 fs-10 badge-pink-transparent"><?php echo e($user->RoleName->Role); ?></span>
</td>
<td>
<span class="badge badge-success d-inline-flex align-items-center badge-xs">
<i class="ti ti-point-filled me-1"></i>Active
</span>
</td>
<td>
<div class="action-icon d-inline-flex">
<a href="<?php echo e(route('users.edit',$user->id)); ?>" class="me-2" ><i class="ti ti-edit"></i></a>
<a href="<?php echo e(URL::to('users/destroy/'.$user->id)); ?>" ><i class="ti ti-trash"></i></a>
</div>
</td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table>
</div>
</div>
</div>
<!-- /Performance Indicator list -->

</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('include.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\policeclerance\resources\views/users/index.blade.php ENDPATH**/ ?>