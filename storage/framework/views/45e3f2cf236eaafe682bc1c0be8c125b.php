<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <meta name="description" content="Smarthr - Bootstrap Admin Template">
  <meta name="keywords" content="admin, estimates, bootstrap, business, html5, responsive, Projects">
  <meta name="author" content="Dreams technologies - Bootstrap Admin Template">
  <meta name="robots" content="noindex, nofollow">
  <title>GYM Administrator</title>

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('assets/img/favicon.png')); ?>">

  <!-- Apple Touch Icon -->
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('assets/img/apple-touch-icon.png')); ?>">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">

  <!-- Feather CSS -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/icons/feather/feather.css')); ?>">

  <!-- Tabler Icon CSS -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/tabler-icons/tabler-icons.css')); ?>">

  <!-- Fontawesome CSS -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/fontawesome/css/fontawesome.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/fontawesome/css/all.min.css')); ?>">

  <!-- Main CSS -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
</head>
<body class="bg-white">
  <div id="global-loader" style="display: none;">
    <div class="page-loader"></div>
  </div>

  <!-- Main Wrapper -->
  <div class="main-wrapper">
    <div class="container-fuild">
      <div class="w-100 overflow-hidden position-relative flex-wrap d-block vh-100">
        <div class="row">
          <div class="col-lg-5">
            <div class="login-background position-relative d-lg-flex align-items-center justify-content-center d-none flex-wrap vh-100">
              <div class="bg-overlay-img">
                <img src="<?php echo e(asset('assets/img/bg/1750581276.1747930132imgimages-Photoroom.png')); ?>" class="bg-1" alt="Img">
                <img src="<?php echo e(asset('assets/img/bg/1750581276.1747930132imgimages-Photoroom.png')); ?>" class="bg-2" alt="Img">
                <!-- <img src="<?php echo e(asset('assets/img/bg/bg-03.png')); ?>" class="bg-3" alt="Img"> -->
              </div>
              <div class="authentication-card w-100">
                <div class="authen-overlay-item border w-100">
                  <h1 class="text-white display-1">Nidamka   Mareenta <br> Xogta Ciidanka Booliska   <br> Somaliyeed.</h1>
                  <div class="my-4 mx-auto authen-overlay-img">
                    <img src="<?php echo e(asset('assets/img/bg/polise.png')); ?>" alt="Img">
                  </div>
                  <div>
                    <!-- <p class="text-white fs-20 fw-semibold text-center">Efficiently manage your workforce, streamline <br> operations effortlessly.</p> -->
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-7 col-md-12 col-sm-12">
            <div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap">
              <div class="col-md-7 mx-auto vh-100">
                <form id="pForm" method="post" action="<?php echo e(route('login-user')); ?>" enctype="multipart/form-data" class="vh-100">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('post'); ?>
                  <div class="vh-100 d-flex flex-column justify-content-between p-4 pb-0">
                    <div class="mx-auto mb-5 text-center">
                      <img src="<?php echo e(asset('upload/logo/1750581276.1747930132imgimages-Photoroom.png')); ?>" class="img-fluid" alt="Logo" style="width: 150px; height: auto;">
                    </div>

                    <div>
                      <?php if(Session::has('success')): ?>
                        <div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          <h4><i class="icon fa fa-check"></i> <?php echo e(Session::get('success')); ?></h4>
                        </div>
                      <?php endif; ?>
                      <?php if(Session::has('fail')): ?>
                        <div class="alert alert-solid-danger rounded-pill alert-dismissible fade show text-center">
                          <?php echo e(Session::get('fail')); ?>

                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fas fa-xmark"></i></button>
                        </div>
                      <?php endif; ?>
                    </div>

                    <div>
                      <div class="text-center mb-3">
                        <h2 class="mb-2">Sign In</h2>
                        <p class="mb-0">Please enter your details to sign in</p>
                      </div>

                      <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <div class="input-group">
                          <input type="text" class="form-control border-end-0" name="email">
                          <span class="input-group-text border-start-0">
                            <i class="ti ti-mail"></i>
                          </span>
                        </div>
                        <span class="text-danger"><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                      </div>

                      <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div class="pass-group">
                          <input type="password" class="pass-input form-control" name="password">
                          <span class="ti toggle-password ti-eye-off"></span>
                        </div>
                        <span class="text-danger"><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                      </div>

                      <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="form-check form-check-md mb-0">
                          <input class="form-check-input" id="remember_me" type="checkbox">
                          <label for="remember_me" class="form-check-label mt-0">Remember Me</label>
                        </div>
                        <div class="text-end">
                          <a href="forgot-password.html" class="link-danger">Forgot Password?</a>
                        </div>
                      </div>

                      <div class="mb-3">
                        <button type="submit" class="btn btn-primary w-100">Sign In</button>
                      </div>

                      <div class="text-center">
                        <h6 class="fw-normal text-dark mb-0">Don’t have an account?
                          <a href="register.html" class="hover-a">Create Account</a>
                        </h6>
                      </div>

                      <div class="login-or">
                        <span class="span-or">Or</span>
                      </div>
                    </div>

                    <div class="mt-5 pb-4 text-center">
                      <p class="mb-0 text-gray-9">&copy; <?php echo e(now()->year); ?> - Hubaal Technology Solutions</p>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- /Main Wrapper -->

  <!-- JS Files -->
  <script src="<?php echo e(asset('assets/js/jquery-3.7.1.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/bootstrap.bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/feather.min.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\gmpf\resources\views/login/index.blade.php ENDPATH**/ ?>