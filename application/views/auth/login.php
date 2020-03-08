<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>
                            <div class="card-body">
                                <?php if( isset($message) ): ?>
                                <div id="infoMessage" class="alert alert-danger"><?php echo $message;?></div>
                                <?php endif; ?>
                                <?php echo form_open("auth/login", ['class' => 'needs-validation', 'novalidate' => '', 'method' => 'POST']);?>
                                <div class="form-group">
                                    <!-- <label for="email">Email</label> -->
                                    <?php echo lang('login_identity_label', 'identity', ['class' => 'control-label']);?>
                                    <?php echo form_input($identity);?>
                                    <div class="invalid-feedback">
                                        Please fill in your email
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <?php echo lang('login_password_label', 'password', ['class' => 'control-label']);?>
                                        <div class="float-right">
                                            <a href="<?php echo base_url(); ?>auth/forgot_password" class="text-small">
                                                <?php echo lang('login_forgot_password');?>
                                            </a>
                                        </div>
                                    </div>
                                    <?php echo form_input($password);?>
                                    <div class="invalid-feedback">
                                        please fill in your password
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                                            id="remember-me">
                                        <?php echo lang('login_remember_label', 'remember-me', ['class' => 'custom-control-label']);?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Login
                                    </button>
                                </div>
                                <?php echo form_close();?>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; Stisla 2018
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php $this->load->view('dist/_partials/js'); ?>