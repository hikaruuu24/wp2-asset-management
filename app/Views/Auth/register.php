<!doctype html>
<html lang="en">

    
<head>
        
        <meta charset="utf-8" />
        <title>Register</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href=<?=base_url("assets/images/favicon.ico")?>>

        <!-- Bootstrap Css -->
        <link href=<?=base_url("assets/css/bootstrap.min.css")?> id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href=<?=base_url("assets/css/icons.min.css")?> rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href=<?=base_url("assets/css/app.min.css")?> id="app-style" rel="stylesheet" type="text/css" />

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
                                            <h5 class="text-primary">Free Register</h5>
                                            <p>Get your free Skote account now.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src=<?= base_url("assets/images/profile-img.png")?> alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div>
                                    <a href="javascript:void(0)">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src=<?= base_url("assets/images/logo.svg")?> alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <?= view('Myth\Auth\Views\_message_block') ?>
                                <div class="p-2">
                                    <form class="needs-validation" novalidate action="<?= url_to('register') ?>" method="post">
                                        <?= csrf_field() ?>
            
                                        <div class="mb-3">
                                        <label for="email"><?=lang('Auth.email')?></label>
                                        <input type="email" required class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                                        name="email" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>">
                                        <div class="invalid-feedback">
                                                Please Enter Email
                                            </div> 
                                        </div>
                
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" required class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?=lang('Auth.username')?>" value="<?= old('username') ?>">
                                            <div class="invalid-feedback">
                                                Please Enter Username
                                            </div>  
                                        </div>
                
                                        <div class="mb-3">
                                            <label for="userpassword" class="form-label">Password</label>
                                            <input type="password" required name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>" autocomplete="off">
                                            <div class="invalid-feedback">
                                                Please Enter Password
                                            </div>       
                                        </div>

                                        <div class="mb-3">
                                            <label for="userpassword" class="form-label">Password</label>
                                            <input type="password" required name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
                                            <div class="invalid-feedback">
                                                Please Re-type Your Password
                                            </div>       
                                        </div>
                    
                                        <div class="mt-4 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit">Register</button>
                                        </div>
                                    </form>
                                    <hr>
                                    <p><?=lang('Auth.alreadyRegistered')?> <a href="<?= url_to('login') ?>"><?=lang('Auth.signIn')?></a></p>
                                </div>
            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src=<?= base_url("assets/libs/jquery/jquery.min.js")?>></script>
        <script src=<?= base_url("assets/libs/bootstrap/js/bootstrap.bundle.min.js")?>></script>
        <script src=<?= base_url("assets/libs/metismenu/metisMenu.min.js")?>></script>
        <script src=<?= base_url("assets/libs/simplebar/simplebar.min.js")?>></script>
        <script src=<?= base_url("assets/libs/node-waves/waves.min.js")?>></script>

        <!-- validation init -->
        <script src=<?= base_url("assets/js/pages/validation.init.js")?>></script>
        
        <!-- App js -->
        <script src=<?= base_url("assets/js/app.js")?>></script>

    </body>

</html>
