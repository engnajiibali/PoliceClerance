
<?php $__env->startSection('content'); ?>
<div class="content">

    
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

    <div class="card mb-3">
        <div class="card-body p-3 d-flex align-items-center justify-content-between flex-wrap">
            <h6 class="mb-0 fw-bold">
                KIISKA DAMBIGA <br>
                <small class="mb-0 small text-muted">
                    CASE #<?php echo e($crimecase->case_number); ?> / <?php echo e(\Carbon\Carbon::parse($crimecase->date_time)->format('Y')); ?>

                </small>
            </h6>
            <div class="d-flex gap-2 mt-2 mt-md-0">
                <a href="<?php echo e(route('crimes-cases.index')); ?>" class="btn btn-secondary d-flex align-items-center">
                    <i class="ti ti-arrow-big-left me-2"></i> Back
                </a>
                <a href="<?php echo e(route('crimes-cases.create')); ?>" class="btn btn-primary d-flex align-items-center">
                    <i class="ti ti-circle-plus me-2"></i> Case New
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        
        <div class="col-12 col-lg-3">
            <div class="card shadow-sm border-0">
                <div class="card-body p-3">
                    <ul class="list-group list-group-flush">

                        
                        <li class="list-group-item py-3 <?php echo e(request()->is('crimes-cases/'.$crimecase->id) ? 'active bg-primary text-white' : ''); ?>">
                            <a href="<?php echo e(route('crimes-cases.show', $crimecase->id)); ?>" class="d-flex align-items-center text-decoration-none <?php echo e(request()->is('crimes-cases/'.$crimecase->id) ? 'text-white' : 'text-dark'); ?>">
                                <i class="flaticon-file-2 me-2"></i>
                                <span>Faahfaahin</span>
                                <i class="far fa-play-circle ms-auto"></i>
                            </a>
                        </li>

                        
                        <li class="list-group-item py-3">
                            <a href="<?php echo e(route('crimes-cases.suspects', $crimecase->id)); ?>" class="d-flex align-items-center text-decoration-none">
                                <i class="flaticon-users me-2 text-primary"></i>
                                <span>Eedeysanayaal</span>
                                <i class="far fa-check-circle ms-auto text-success"></i>
                            </a>
                        </li>

                        
                        <li class="list-group-item py-3">
                            <a href="<?php echo e(route('crimes-cases.victims', $crimecase->id)); ?>" class="d-flex align-items-center text-decoration-none">
                                <i class="flaticon-users me-2 text-danger"></i>
                                <span>Dhibanayaal</span>
                                <i class="far fa-check-circle ms-auto text-success"></i>
                            </a>
                        </li>

                        
                        <li class="list-group-item py-3">
                            <a href="<?php echo e(route('crimes-cases.witnesses', $crimecase->id)); ?>" class="d-flex align-items-center text-decoration-none">
                                <i class="flaticon-eye me-2 text-warning"></i>
                                <span>Goobjoogayaal</span>
                                <i class="far fa-check-circle ms-auto text-success"></i>
                            </a>
                        </li>

                        
                        <li class="list-group-item py-3">
                            <a href="<?php echo e(route('crimes-cases.evidence', $crimecase->id)); ?>" class="d-flex align-items-center text-decoration-none">
                                <i class="flaticon2-file-1 me-2 text-info"></i>
                                <span>Caddeymo</span>
                                <i class="fa fa-plus ms-auto text-primary"></i>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

        
        <div class="col-xl-9">
            <div class="card">
                <div class="card-body">

                    
                    <div class="bg-light shadow-sm border border-primary border-dashed rounded p-3 mb-3">
                        <div class="progress mb-2" style="height: 16px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 25%;">
                                25%
                            </div>
                        </div>
                        <div class="d-flex flex-wrap justify-content-between text-center small">
                            <div class="flex-fill text-primary fw-bold"><i class="far fa-play-circle me-1"></i> Baaris</div>
                            <div class="flex-fill text-muted"><i class="far fa-circle me-1"></i> Gungaar</div>
                            <div class="flex-fill text-muted"><i class="far fa-circle me-1"></i> Garsuge</div>
                            <div class="flex-fill text-muted"><i class="far fa-circle me-1"></i> Xukun</div>
                        </div>
                    </div>

                    
                    <div class="row g-3">

                        
                        <div class="col-md-6">
                            <div class="p-3 rounded bg-light d-flex align-items-start gap-3">
                                <i class="ti ti-tag fs-3 text-primary"></i>
                                <div>
                                    <h6 class="mb-0 fw-bold">Title</h6>
                                    <small class="text-muted"><?php echo e($crimecase->title); ?></small>
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-md-6">
                            <div class="p-3 rounded bg-info bg-opacity-10 d-flex align-items-start gap-3">
                                <i class="ti ti-calendar fs-3 text-info"></i>
                                <div>
                                    <h6 class="mb-0 fw-bold">Date & Time</h6>
                                    <small class="text-muted"><?php echo e(\Carbon\Carbon::parse($crimecase->date_time)->format('d/m/Y h:i a')); ?></small>
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-md-6">
                            <div class="p-3 rounded bg-warning bg-opacity-25 d-flex align-items-start gap-3">
                                <i class="ti ti-map-pin fs-3 text-warning"></i>
                                <div>
                                    <h6 class="mb-0 fw-bold">Location</h6>
                                    <small class="text-muted"><?php echo e($crimecase->location); ?></small>
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-md-6">
                            <div class="p-3 rounded bg-success bg-opacity-25 d-flex align-items-start gap-3">
                                <i class="ti ti-briefcase fs-3 text-success"></i>
                                <div>
                                    <h6 class="mb-0 fw-bold">Status</h6>
                                    <span class="badge 
                                        <?php echo e($crimecase->status == 'open' ? 'bg-success' : 
                                           ($crimecase->status == 'closed' ? 'bg-danger' : 'bg-warning')); ?>">
                                        <?php echo e(ucfirst($crimecase->status)); ?>

                                    </span>
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-md-12">
                            <div class="bg-white p-3 border rounded">
                                <h6 class="fw-bold mb-2">Crime Types</h6>
                                <?php if($crimecase->types->count()): ?>
                                    <?php $__currentLoopData = $crimecase->types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="badge bg-info"><?php echo e($type->name); ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <span class="text-muted">No types assigned</span>
                                <?php endif; ?>
                            </div>
                        </div>

                        
                        <div class="col-12">
                            <div class="bg-white p-3 border rounded">
                                <h6 class="fw-bold mb-2">Description</h6>
                                <p class="mb-0 small text-muted"><?php echo e($crimecase->description ?? '...'); ?></p>
                            </div>
                        </div>

                    </div>

                    
                    <div id="suspects" class="mt-4">
                        <h6 class="fw-bold mb-2">Suspects</h6>
                        <?php if($crimecase->suspects->count()): ?>
                            <table class="table table-bordered">
                                <thead><tr><th>#</th><th>Person ID</th><th>Name</th></tr></thead>
                                <tbody>
                                    <?php $__currentLoopData = $crimecase->suspects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $suspect): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($key+1); ?></td>
                                            <td><?php echo e($suspect->persons->id ?? 'Unknown'); ?></td>
                                            <td><?php echo e($suspect->persons->FullName ?? 'Unknown'); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <p class="text-muted">No suspects found.</p>
                        <?php endif; ?>
                    </div>

                    
                    <div id="victims" class="mt-4">
                        <h6 class="fw-bold mb-2">Victims</h6>
                        <?php if($crimecase->victims->count()): ?>
                            <table class="table table-bordered">
                                <thead><tr><th>#</th><th>Person ID</th><th>Name</th></tr></thead>
                                <tbody>
                                    <?php $__currentLoopData = $crimecase->victims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $victim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($key+1); ?></td>
                                            <td><?php echo e($victim->persons->id ?? 'Unknown'); ?></td>
                                            <td><?php echo e($victim->persons->FullName ?? 'Unknown'); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <p class="text-muted">No victims found.</p>
                        <?php endif; ?>
                    </div>

                    
                    <div id="witnesses" class="mt-4">
                        <h6 class="fw-bold mb-2">Witnesses</h6>
                        <?php if($crimecase->witnesses->count()): ?>
                            <table class="table table-bordered">
                                <thead><tr><th>#</th><th>Person ID</th><th>Name</th></tr></thead>
                                <tbody>
                                    <?php $__currentLoopData = $crimecase->witnesses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $witness): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($key+1); ?></td>
                                            <td><?php echo e($witness->persons->id ?? 'Unknown'); ?></td>
                                            <td><?php echo e($witness->persons->FullName ?? 'Unknown'); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <p class="text-muted">No witnesses found.</p>
                        <?php endif; ?>
                    </div>

                    
                    <div id="evidence" class="mt-4">
                        <h6 class="fw-bold mb-2">Evidence</h6>
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
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('include.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\policeclerance\resources\views/crimecases/show.blade.php ENDPATH**/ ?>