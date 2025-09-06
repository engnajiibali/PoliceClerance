

<?php $__env->startSection('content'); ?>
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
<div class="content">
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3  class="page-title">Fingerprint Verification</h3>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 style="color:white;">Scan and Verify Fingerprint</h5>
                </div>
                <div class="card-body text-center">
                    <div class="mb-3">
                        <img id="FPImage1" 
                             src="<?php echo e(asset('upload/PlaceFinger.bmp')); ?>" 
                             alt="Fingerprint Image" 
                             class="img-thumbnail"
                             style="max-height:200px;">
                    </div>
                    <div class="form-group">
                        <label for="quality">Matching Quality Threshold</label>
                        <input type="hidden" id="quality" name="quality" class="form-control text-center" value="60">
                    </div>
                    <div id="errmsg" class="text-danger font-weight-bold my-2"></div>
                    <button type="button" class="btn btn-success mt-2" onclick="CallSGIFPGetData(SuccessFunc1, ErrorFunc)">
                        <i class="fa fa-fingerprint"></i> Scan Finger
                    </button>
                    <button type="button" class="btn btn-primary mt-2" onclick="matchScore(succMatch, failureFunc)">
                        <i class="fa fa-search"></i> Verify Finger
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    function showFingerLoader() {
    document.getElementById("finger-loading").style.display = "flex";
}
function hideFingerLoader() {
    document.getElementById("finger-loading").style.display = "none";
}
var template_1 = "";
var name ="";
var url ="";
var selectedThaump ="";
function SuccessFunc1(result) {
    hideFingerLoader();
if (result.ErrorCode == 0) {

/*  Display BMP data in image tag
BMP data is in base 64 format 
*/
if (result != null && result.BMPBase64.length > 0) {
document.getElementById('FPImage1').src = "data:image/bmp;base64," + result.BMPBase64;
}
template_1 = result.TemplateBase64;
}
else {
alert("Fingerprint Capture Error Code:  " + result.ErrorCode + ".\nDescription:  " + ErrorCodeToString(result.ErrorCode) + ".");
}
}
function ErrorFunc(status) {
    hideFingerLoader();
/*  
If you reach here, user is probabaly not running the 
service. Redirect the user to a page where he can download the
executable and install it. 
*/
alert("Check if SGIBIOSRV is running; status = " + status + ":");
}

function CallSGIFPGetData(successCall, failCall) {
      showFingerLoader();
$("#errmsg").text("");
var uri = "https://localhost:8443/SGIFPCapture";
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function () {
if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
fpobject = JSON.parse(xmlhttp.responseText);
successCall(fpobject);
}
else if (xmlhttp.status == 404) {
failCall(xmlhttp.status)
}
}
xmlhttp.onerror = function () {
failCall(xmlhttp.status);
}
var params = "Timeout=" + "10000";
params += "&Quality=" + "50";
params += "&templateFormat=" + "ISO";
xmlhttp.open("POST", uri, true);
xmlhttp.send(params);
}
function matchScore(succFunction, failFunction) {
if (template_1 == "") {
// alert("Please scan two fingers to verify!!");
$("#errmsg").text("Please scan The Thump to verify!!");
return;
}
var uri = "https://localhost:8443/SGIMatchScore";

var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function () {
if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
fpobject = JSON.parse(xmlhttp.responseText);
var idQuality = document.getElementById("quality").value;
if (fpobject.MatchingScore >= idQuality){
succFunction(fpobject);
return false;
}
else{
$("#errmsg").text("Not Found!!");
return false;
}
}
else if (xmlhttp.status == 404) {
failFunction(xmlhttp.status)
}
}
xmlhttp.onerror = function () {
failFunction(xmlhttp.status);
}
$.ajax({
    url: "<?php echo e(url('getFingerprints')); ?>",
    type: "GET",
    data: {
        _token: '<?php echo e(csrf_token()); ?>'
    },
    dataType: 'json',
    success: function (res) {
    	console.log(res);
    var items =[];
for ( var i=0; i < res.length; i++ ) {  
// console.log(res[i]['thump']);
name = "Magaca Qofka waaye";
selectedThaump = res[i]['fingers_temp'];
id = res[i]['person_id'];

 url = "<?php echo e(route('applicants.show', ':id')); ?>";
url = url.replace(':id', id);
var params = "template1=" + encodeURIComponent(template_1);
params += "&template2=" + encodeURIComponent(res[i]['fingers_temp']);
params += "&templateFormat=" + "ISO";
xmlhttp.open("POST", uri, false);
xmlhttp.send(params);

}
    }
});

}
// window.location.replace(url);
function succMatch(result) {
var idQuality = document.getElementById("quality").value;
if (result.ErrorCode == 0) {
if (result.MatchingScore >= idQuality)
window.location.replace(url);
// else
// alert("NOT MATCHED ! (" + result.MatchingScore + ")");
}
else {
alert("Error Scanning Fingerprint ErrorCode = " + result.ErrorCode);
}
}
function failureFunc(error) {
alert ("On Match Process, failure has been called");
}

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('include.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\gmpf\resources\views/fingerPrint/verify.blade.php ENDPATH**/ ?>