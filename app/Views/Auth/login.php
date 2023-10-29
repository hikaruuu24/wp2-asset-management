<!doctype html>
<html lang="en">
<head>
        
        <meta charset="utf-8" />
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <!-- <link rel="shortcut icon" href=<?= base_url("assets/images/favicon.ico")?>> -->

        <!-- Bootstrap Css -->
        <link href=<?= base_url("assets/css/bootstrap.min.css")?> id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href=<?= base_url("assets/css/icons.min.css")?> rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href=<?= base_url("assets/css/app.min.css")?> id="app-style" rel="stylesheet" type="text/css" />

        <style>
            body {
                background-image: url(<?= base_url('assets/images/login/loginBackground.jpg')?>);
            }
        </style>
    </head>

    <body>
        <div class="account-pages my-2 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Welcome Back !</h5>
                                            <p>Sign in to continue.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src=<?= base_url("assets/images/profile-img.png")?> alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div class="auth-logo">
                                    <a href="javascript:void(0)" class="auth-logo-light">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src=<?=base_url("assets/images/asset-logo-only.png")?> alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>

                                    <a href="javascript:void(0)" class="auth-logo-dark">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src=<?= base_url("assets/images/asset-logo-only.png")?> alt="" class="rounded-circle" height="80">
                                            </span>
                                        </div>
                                    </a>
                                </div>
					        <?= view('Myth\Auth\Views\_message_block') ?>

                                <div class="p-2">
                                    <form class="form-horizontal" action="<?= url_to('login') ?>" method="post">
						            <?= csrf_field() ?>

<?php if ($config->validFields === ['email']): ?>
                                <div class="form-group mb-3">
                                    <label for="login"><?=lang('Auth.email')?></label>
                                    <input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                                        name="login" placeholder="<?=lang('Auth.email')?>">
                                    <div class="invalid-feedback">
                                        <?= session('errors.login') ?>
                                    </div>
                                </div>
<?php else: ?>
                                <div class="form-group mb-3">
                                    <label for="login"><?=lang('Auth.emailOrUsername')?></label>
                                    <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                                        name="login" placeholder="<?=lang('Auth.emailOrUsername')?>">
                                    <div class="invalid-feedback">
                                        <?= session('errors.login') ?>
                                    </div>
                                </div>
<?php endif; ?>
                
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                                <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                <div class="invalid-feedback">
                                                    <?= session('errors.password') ?>
                                                </div>
                                            </div>
                                        </div>

<?php if ($config->allowRemembering): ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember-check" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                            <label class="form-check-label" for="remember-check">
                                                Remember me
                                            </label>
                                        </div>
<?php endif; ?>
                                        
                                        <div class="mt-3 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                                        </div>
<!-- <?php if ($config->activeResetter): ?>
                                        <div class="mt-4 text-center">
                                            <a href="<?= url_to('forgot') ?>" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                        </div>
<?php endif; ?> -->

<?php if ($config->allowRegistration) : ?>
                                        <div class="mt-4 text-center">
                                            <p>Don't have an account ? <a href="<?= url_to('register') ?>" class="fw-medium text-primary"> Signup now </a> </p>
                                        </div>
<?php endif; ?>

                                    </form>
                                </div>
                                
                            </div>
                        </div>
                        

                    </div>
                </div>
            </div>
        </div>
        <!-- end account-pages -->

        <!-- JAVASCRIPT -->
        <script src=<?= base_url("assets/libs/jquery/jquery.min.js")?>></script>
        <script src=<?= base_url("assets/libs/bootstrap/js/bootstrap.bundle.min.js")?>></script>
        <script src=<?= base_url("assets/libs/metismenu/metisMenu.min.js")?>></script>
        <script src=<?= base_url("assets/libs/simplebar/simplebar.min.js")?>></script>
        <script src=<?= base_url("assets/libs/node-waves/waves.min.js")?>></script>
        
        <!-- App js -->
        <script src=<?= base_url("assets/js/app.js")?>></script>
    </body>

</html>
