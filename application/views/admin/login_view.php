<!doctype html>
<html lang="en">
<head>
    <title><?php echo $title; ?></title>
    <?php
    if (!empty($meta_tags)) {
        foreach ($meta_tags as $meta_tag) {
            echo $meta_tag;
        }
    }
    ?>
    <?php
    if (!empty($stylesheets)) {
        foreach ($stylesheets as $stylesheet) {
            echo $stylesheet;
        }
    }
    ?>
</head>
<body class="bg-white h-100-vh p-t-0">

    <!-- begin::page loader-->
    <div class="page-loader">
        <div class="spinner-border"></div>
        <span>Loading</span>
    </div>
    <!-- end::page loader -->

    <div class="p-b-50 d-block d-lg-none"></div>
    <div class="container h-100-vh">
        <div class="row align-items-md-center h-100-vh">
            <div class="col-lg-6 d-none d-lg-block">
                <img class="img-fluid" src="<?php echo base_url(); ?>assets/media/svg/login.svg" alt="edukrypt login image">
            </div>
            <div class="col-lg-4 offset-lg-1">
                <p>Sign in to continue.</p>
                <?php echo $this->session->flashdata('alert'); ?>
                <form method="POST" action="<?php echo base_url(); ?>webmaster">
                    <div class="form-group mb-4">
                        <input type="text" value="<?php echo set_value('auth_email'); ?>" class="form-control form-control-lg <?php echo form_error('auth_email') != '' ? 'is-invalid' : ''; ?>" name="auth_email" id="auth_email" autofocus placeholder="Email">
                        <?php echo form_error('auth_email'); ?>
                    </div>
                    <div class="form-group mb-4">
                        <input type="password" class="form-control form-control-lg <?php echo form_error('auth_password') != '' ? 'is-invalid' : ''; ?>" name="auth_password" id="auth_password" placeholder="Password">
                        <?php echo form_error('auth_password'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block btn-uppercase mb-4">Sign In</button>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="remember_me" id="remember_me">
                            <label class="custom-control-label" for="remember_me">Keep me signed in</label>
                        </div>
                        <a href="javascript:;" class="auth-link text-black">Forgot password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <?php
    if (!empty($scripts)) {
        foreach ($scripts as $script) {
            echo $script;
        }
    }
    ?>
</body>

</html>
