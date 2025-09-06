

<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="page-header">
        <h3 class="page-title"><?php echo e($pageTitle); ?></h3>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><h5><?php echo e($subTitle); ?></h5></div>
                <div class="card-body">
                    <form id="pForm" method="post" action="<?php echo e(route('fingerPrint.store')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="person_id" value="<?php echo e($applicant->id); ?>">

                        
                        <h5 class="mb-3">Left Hand</h5>
                        <div class="row text-center">
                            <?php $__currentLoopData = $leftFingers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $finger): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $existing = $existingFingers->has($finger) ? $existingFingers[$finger] : null;
                                    $enrolled = $existing ? 1 : 0;
                                    $imgSrc = ($existing && $existing->finger_img && file_exists(public_path($existing->finger_img)))
                                                ? asset($existing->finger_img)
                                                : asset('upload/PlaceFinger.bmp');
                                ?>
                                <div class="col-lg-2 col-md-2 col-sm-4 mb-3">
                                    <div class="finger-card card text-center h-100 shadow-sm border-4">
                                        <div class="card-body d-flex flex-column justify-content-between">
                                            <div class="icon-circle mx-auto mb-2 <?php echo e($enrolled ? 'bg-success' : 'bg-danger'); ?>">
                                                <img id="img_<?php echo e($finger); ?>" src="<?php echo e($imgSrc); ?>" style="width:80px;height:80px;border-radius:50%;">
                                            </div>
                                            <h6><?php echo e(str_replace('_',' ',$finger)); ?></h6>

                                            <input type="hidden" name="fingers[<?php echo e($finger); ?>][status]" value="<?php echo e($enrolled); ?>">
                                            <input type="hidden" name="fingers[<?php echo e($finger); ?>][hand]" value="LEFT">
                                            <input type="hidden" name="fingers[<?php echo e($finger); ?>][template]" id="template_<?php echo e($finger); ?>">
                                            <input type="hidden" name="fingers[<?php echo e($finger); ?>][wsq]" id="wsq_<?php echo e($finger); ?>">
                                            <input type="hidden" name="fingers[<?php echo e($finger); ?>][bmp]" id="bmp_<?php echo e($finger); ?>">

                                            <button type="button" class="btn btn-outline-primary btn-sm mt-2 enroll-btn" data-finger="<?php echo e($finger); ?>">
                                                <?php echo e($enrolled ? 'Re-Enroll' : 'Enroll'); ?>

                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        
                        <h5 class="mt-4 mb-3">Right Hand</h5>
                        <div class="row text-center">
                            <?php $__currentLoopData = $rightFingers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $finger): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $existing = $existingFingers->has($finger) ? $existingFingers[$finger] : null;
                                    $enrolled = $existing ? 1 : 0;
                                    $imgSrc = ($existing && $existing->finger_img && file_exists(public_path($existing->finger_img)))
                                                ? asset($existing->finger_img)
                                                : asset('upload/PlaceFinger.bmp');
                                ?>
                                <div class="col-lg-2 col-md-2 col-sm-4 mb-3">
                                    <div class="finger-card card text-center h-100 shadow-sm border-4">
                                        <div class="card-body d-flex flex-column justify-content-between">
                                            <div class="icon-circle mx-auto mb-2 <?php echo e($enrolled ? 'bg-success' : 'bg-danger'); ?>">
                                                <img id="img_<?php echo e($finger); ?>" src="<?php echo e($imgSrc); ?>" style="width:80px;height:80px;border-radius:50%;">
                                            </div>
                                            <h6><?php echo e(str_replace('_',' ',$finger)); ?></h6>

                                            <input type="hidden" name="fingers[<?php echo e($finger); ?>][status]" value="<?php echo e($enrolled); ?>">
                                            <input type="hidden" name="fingers[<?php echo e($finger); ?>][hand]" value="RIGHT">
                                            <input type="hidden" name="fingers[<?php echo e($finger); ?>][template]" id="template_<?php echo e($finger); ?>">
                                            <input type="hidden" name="fingers[<?php echo e($finger); ?>][wsq]" id="wsq_<?php echo e($finger); ?>">
                                            <input type="hidden" name="fingers[<?php echo e($finger); ?>][bmp]" id="bmp_<?php echo e($finger); ?>">

                                            <button type="button" class="btn btn-outline-primary btn-sm mt-2 enroll-btn" data-finger="<?php echo e($finger); ?>">
                                                <?php echo e($enrolled ? 'Re-Enroll' : 'Enroll'); ?>

                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="text-right mt-4">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save"></i> Save Fingerprints
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


<!-- Loading overlay (hidden by default) -->
<div id="finger-loading" 
     style="display:none; position:fixed; top:0; left:0; width:100%; height:100%;
            background:rgba(0,0,0,0.6); z-index:9999;
            align-items:center; justify-content:center;">
    <div style="color:white; font-size:22px; text-align:center;">
        <i class="fa fa-spinner fa-spin fa-3x mb-3"></i>
        <div>Place your finger on the scanner...</div>
    </div>
</div>


</div>

<style>
    .icon-circle {
        width: 90px; height: 90px;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        overflow: hidden;
    }
    .finger-card:hover {
        transform: translateY(-3px); transition: 0.2s ease-in-out;
    }
</style>

<script type="text/javascript">
function showFingerLoader() {
    document.getElementById("finger-loading").style.display = "flex";
}
function hideFingerLoader() {
    document.getElementById("finger-loading").style.display = "none";
}

function captureFP(finger) {
    CallSGIFPGetData(
        function(result) { SuccessFunc(result, finger); },
        ErrorFunc
    );
}

function SuccessFunc(result, finger) {
    hideFingerLoader();

    if (result.ErrorCode == 0) {
        document.getElementById("template_" + finger).value = result.TemplateBase64;
        document.getElementById("wsq_" + finger).value = result.WSQImage;
        document.getElementById("bmp_" + finger).value = result.BMPBase64;

        let img = document.getElementById("img_" + finger);
        img.src = "data:image/bmp;base64," + result.BMPBase64;

        let card = document.querySelector('[data-finger="'+finger+'"]').closest('.finger-card');
        let iconCircle = card.querySelector('.icon-circle');
        iconCircle.classList.remove('bg-danger');
        iconCircle.classList.add('bg-success');

        let btn = document.querySelector('[data-finger="'+finger+'"]');
        btn.textContent = 'Re-Enroll';

        card.querySelector('input[name="fingers['+finger+'][status]"]').value = 1;

        // alert(finger + " fingerprint captured successfully.");
    } 
    else if (result.ErrorCode === 55) {
        alert("No fingerprint device available. Please check connection.");
        return;
    } 
    else {
        alert("Fingerprint Capture Error Code: " + result.ErrorCode +
              "\nDescription: " + ErrorCodeToString(result.ErrorCode));
    }
}

function ErrorFunc(status) {
    hideFingerLoader();
    alert("Check if SGIBIOSRV is running; Status = " + status + ":");
}

function CallSGIFPGetData(successCall, failCall) {
    var uri = "https://localhost:8443/SGIFPCapture";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            let fpobject = JSON.parse(xmlhttp.responseText);
            successCall(fpobject);
        } else if (xmlhttp.status == 404) {
            failCall(xmlhttp.status);
        } else {
            console.log("Mashiinka ma jiro ");
        }
    }
    var params = "Timeout=10000&Quality=50&templateFormat=ISO&imageWSQRate=0.75";
    xmlhttp.open("POST", uri, true);
    xmlhttp.send(params);

    xmlhttp.onerror = function () {
        failCall(xmlhttp.statusText);
    }
}

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.enroll-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            let finger = this.dataset.finger;
            showFingerLoader(); // only show when button clicked
            captureFP(finger);
        });
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('include.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\policeclerance\resources\views/fingerPrint/add.blade.php ENDPATH**/ ?>