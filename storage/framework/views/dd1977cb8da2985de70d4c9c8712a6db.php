
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
<?php echo e($pageTitle); ?>

</li>
<li class="breadcrumb-item active" aria-current="page"><?php echo e($subTitle); ?></li>
</ol>
</nav>
</div>
<div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
<div class="me-2 mb-2">
<div class="d-flex align-items-center border bg-white rounded p-1 me-2 icon-list">
<a href="<?php echo e(asset('persons/')); ?>" class="btn btn-icon btn-sm active bg-primary text-white me-1"><i class="ti ti-list-tree"></i></a>
<a href="<?php echo e(route('person.grid')); ?>" class="btn btn-icon btn-sm">
<i class="ti ti-layout-grid"></i>
</a>


</div>
</div>
<div class="me-2 mb-2">
<div class="dropdown">
<a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
<i class="ti ti-file-export me-1"></i>Export/Import
</a>
<ul class="dropdown-menu  dropdown-menu-end p-3">
<li data-bs-toggle="modal" data-bs-target="#import-model">
<a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-file-type-pdf me-1"></i>Import as Excel</a>
</li>
<li>
<a href="<?php echo e(route('persons.export')); ?>" class="dropdown-item rounded-1"><i class="ti ti-file-type-xls me-1"></i>Export as Excel </a>
</li>
</ul>
</div>
</div>
<div class="mb-2">
<a href="<?php echo e(asset('persons/create')); ?>"  class="btn btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Add Employee</a>
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
<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4><i class="icon fa fa-check"></i> <?php echo e(Session::get('fail')); ?></h4>
</div>
<?php endif; ?>
</div>
<br>
<div class="row">

<!-- Total Plans -->
<div class="col-lg-3 col-md-6 d-flex">
<div class="card flex-fill">
<div class="card-body d-flex align-items-center justify-content-between">
<div class="d-flex align-items-center overflow-hidden">
<div>
<span class="avatar avatar-lg bg-dark rounded-circle"><i class="ti ti-users"></i></span>
</div>
<div class="ms-2 overflow-hidden">
<p class="fs-12 fw-medium mb-1 text-truncate">Total Employee</p>
<h4><?php echo e($AllPersons); ?></h4>
</div>
</div>
<div>                                    
<span class="badge badge-soft-purple badge-sm fw-normal">
<i class="ti ti-arrow-wave-right-down"></i>
+19.01%
</span>
</div>
</div>
</div>
</div>
<!-- /Total Plans -->

<!-- Total Plans -->
<div class="col-lg-3 col-md-6 d-flex">
<div class="card flex-fill">
<div class="card-body d-flex align-items-center justify-content-between">
<div class="d-flex align-items-center overflow-hidden">
<div>
<span class="avatar avatar-lg bg-success rounded-circle"><i class="ti ti-user-share"></i></span>
</div>
<div class="ms-2 overflow-hidden">
<p class="fs-12 fw-medium mb-1 text-truncate">Active</p>
<h4><?php echo e($ActivePersons); ?></h4>
</div>
</div>
<div>                                    
<span class="badge badge-soft-primary badge-sm fw-normal">
<i class="ti ti-arrow-wave-right-down"></i>
+19.01%
</span>
</div>
</div>
</div>
</div>
<!-- /Total Plans -->

<!-- Inactive Plans -->
<div class="col-lg-3 col-md-6 d-flex">
<div class="card flex-fill">
<div class="card-body d-flex align-items-center justify-content-between">
<div class="d-flex align-items-center overflow-hidden">
<div>
<span class="avatar avatar-lg bg-danger rounded-circle"><i class="ti ti-user-pause"></i></span>
</div>
<div class="ms-2 overflow-hidden">
<p class="fs-12 fw-medium mb-1 text-truncate">InActive</p>
<h4><?php echo e($inActivePersons); ?></h4>
</div>
</div>
<div>                                    
<span class="badge badge-soft-dark badge-sm fw-normal">
<i class="ti ti-arrow-wave-right-down"></i>
+19.01%
</span>
</div>
</div>
</div>
</div>
<!-- /Inactive Companies -->

<!-- No of Plans  -->
<div class="col-lg-3 col-md-6 d-flex">
<div class="card flex-fill">
<div class="card-body d-flex align-items-center justify-content-between">
<div class="d-flex align-items-center overflow-hidden">
<div>
<span class="avatar avatar-lg bg-info rounded-circle"><i class="ti ti-user-plus"></i></span>
</div>
<div class="ms-2 overflow-hidden">
<p class="fs-12 fw-medium mb-1 text-truncate">New Joiners</p>
<h4><?php echo e($NewJoiners); ?></h4>
</div>
</div>
<div>                                    
<span class="badge badge-soft-secondary badge-sm fw-normal">
<i class="ti ti-arrow-wave-right-down"></i>
+19.01%
</span>
</div>
</div>
</div>
</div>
<!-- /No of Plans -->
</div>
<div class="card">
<div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
<h5><?php echo e($subTitle); ?></h5>
<div class="d-flex my-xl-auto right-content align-items-center flex-wrap row-gap-3">
<form action="<?php echo e(route('persons.search')); ?>" method="POST" class="d-flex align-items-center flex-wrap gap-2 mb-3">
<?php echo csrf_field(); ?>
<div class="me-3">
<input type="email" name="email" placeholder="Search By email" class="form-control" value="<?php echo e(old('email')); ?>">
</div>
<div class="me-3">
<input type="number" name="phone" placeholder="Search By phone" class="form-control" value="<?php echo e(old('phone')); ?>">
</div>
<div class="me-3">
<input type="text" name="name" placeholder="Search By Name" class="form-control" value="<?php echo e(old('name')); ?>">
</div>
<div class="me-3">
<select name="status" class="form-select">
<option value="">Select Status</option>
<option value="Active" <?php echo e(old('status') == 'Active' ? 'selected' : ''); ?>>Active</option>
<option value="Inactive" <?php echo e(old('status') == 'Inactive' ? 'selected' : ''); ?>>Inactive</option>
</select>
</div>
<div>
<button type="submit" class="btn btn-primary">
<i class="ti ti-search me-1"></i>Search Now
</button>
</div>
</form>
</div>
</div>
<div class="card-body p-0">
<div class="custom-datatable-filter table-responsive">
<table class="table">
<thead class="thead-light">
<tr>
<th>
#No
</th>
<th>Emp ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Joining Date</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php $__currentLoopData = $persons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td>
<?php echo e($loop->iteration); ?> 
</td>
<td><a href="employee-details.html">EMP-<?php echo e(str_pad($person->id, 4, '0', STR_PAD_LEFT)); ?></a></td>
<td>
<div class="d-flex align-items-center">
<a href="<?php echo e(route('persons.show', $person->id)); ?>" class="avatar avatar-md"><img
src="<?php echo e(asset('public/upload/personImg/'.$person->image)); ?>" class="img-fluid rounded-circle" alt="img"></a>
<div class="ms-2">
<p class="text-dark mb-0"><a href="<?php echo e(route('persons.show', $person->id)); ?>"><?php echo e($person->FullName); ?></a></p>
<span class="fs-12">
<?php if($person->Gender == 'Male'): ?>
<i class="ti ti-mars text-success"></i> Male
<?php elseif($person->Gender == 'Female'): ?>
<i class="ti ti-venus text-danger"></i> Female
<?php else: ?>
<?php echo e($person->Gender); ?>

<?php endif; ?>
</span>

</div>
</div>
</td>
<td><?php echo e($person->Email); ?></td>
<td><?php echo e($person->Phone); ?></td>

<td><?php echo e(\Carbon\Carbon::parse($person->created_at)->format('d M Y')); ?></td>
<td>
<div class="form-check form-check-md">
<?php if($person->status=="Active"): ?>
<span class="badge badge-success d-inline-flex align-items-center badge-xs">
<i class="ti ti-point-filled me-1"></i>Active
</span>
<?php else: ?>

<span class="badge badge-danger d-inline-flex align-items-center badge-xs">
<i class="ti ti-point-filled me-1"></i>Inactive
</span>
<?php endif; ?>
</div>
</td>
<td>
<div class="action-icon d-inline-flex align-items-center">
<!-- View -->
<a href="<?php echo e(route('persons.show', $person->id)); ?>" class="btn btn-sm btn-light me-1" title="View">
<i class="ti ti-eye"></i>
</a>

<!-- Edit -->
<a href="<?php echo e(route('persons.edit', $person->id)); ?>" class="btn btn-sm btn-light me-1" title="Edit">
<i class="ti ti-edit"></i>
</a>

<!-- Delete -->
<form method="POST" action="<?php echo e(route('persons.destroy', $person->id)); ?>" style="display:inline;">
<?php echo csrf_field(); ?>
<?php echo method_field('DELETE'); ?>
<button type="submit" class="btn btn-sm btn-light" title="Delete" onclick="return confirm('Are you sure you want to delete this person?')">
<i class="ti ti-trash"></i>
</button>
</form>
</div>
</td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table>
<div class="row">
<div class="col-sm-12 col-md-5">
<div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">
Showing <?php echo e($persons->firstItem() ?? 0); ?> to <?php echo e($persons->lastItem() ?? 0); ?> of <?php echo e($enteries); ?> entries
</div>
</div>
<div class="col-sm-12 col-md-7">
<div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
<ul class="pull-right pagination"><?php echo e($persons->links()); ?></ul>
</div></div></div>
</div>
</div>
</div>

</div>



<!-- Import Model -->
<div class="modal fade custom-modal" id="import-model">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content doctor-profile">
<div class="modal-header d-flex align-items-center justify-content-between border-bottom">
<h5 class="modal-title">Persons Import</h5>
<a href="javascript:void(0);" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled fs-20"></i></a>
</div>
<div class="modal-body p-4">
<form action="<?php echo e(route('persons.import')); ?>" method="POST" enctype="multipart/form-data">
<?php echo csrf_field(); ?>
<div class="mb-3">
<label class="form-label">Import File <span class="text-danger">*</span></label>
<div class="pass-group">
<input type="file" class="pass-input form-control" name="importFile">
<span class="text-danger"><?php $__errorArgs = ['importFile'];
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
<div class="modal-footer border-top">
<div class="acc-submit">
<button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
<button class="btn btn-primary" type="submit">Import</button>
</div>
</div>
</form>
</div>
</div>
</div>
<!-- /Import Model -->
<?php if($errors->has('importFile')): ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var importModal = new bootstrap.Modal(document.getElementById('import-model'));
        importModal.show();
    });
</script>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('include.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\policeclerance\resources\views/persons/index.blade.php ENDPATH**/ ?>