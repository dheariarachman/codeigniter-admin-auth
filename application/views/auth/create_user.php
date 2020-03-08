<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
 ?>

<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1><?php echo lang('create_user_heading');?></h1>
        </div>
        <div class="section-body">
            <h1 class="section-title"><?php echo lang('create_user_subheading');?></h1>
            <div id="infoMessage">
                <div class="alert alert-danger">
                    <p class="section-lead"><?php echo $message;?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 offset-lg-3 offset-md-3">
                    <div class="card">
                        <div class="card-body">
                            <?php echo form_open("auth/create_user", ['class' => 'needs-validation', 'novalidate' => '', 'method' => 'POST']);?>

                            <p>
                                <?php echo lang('create_user_fname_label', 'first_name', ['class' => 'control-label']);?>
                                <br />
                                <?php echo form_input($first_name);?>
                            </p>

                            <p>
                                <?php echo lang('create_user_lname_label', 'last_name', ['class' => 'control-label']);?>
                                <br />
                                <?php echo form_input($last_name);?>
                            </p>

                            <?php if($identity_column !=='email') {
                                echo '<p>';
                                echo lang('create_user_identity_label', 'identity', ['class' => 'control-label']);
                                echo '<br />';
                                echo form_error('identity');
                                echo form_input($identity);
                                echo '</p>';
                            } ?>

                            <p>
                                <?php echo lang('create_user_company_label', 'company', ['class' => 'control-label']);?>
                                <br />
                                <?php echo form_input($company);?>
                            </p>

                            <p>
                                <?php echo lang('create_user_email_label', 'email', ['class' => 'control-label']);?>
                                <br />
                                <?php echo form_input($email);?>
                            </p>

                            <p>
                                <?php echo lang('create_user_phone_label', 'phone', ['class' => 'control-label']);?>
                                <br />
                                <?php echo form_input($phone);?>
                            </p>

                            <p>
                                <?php echo lang('create_user_password_label', 'password', ['class' => 'control-label']);?>
                                <br />
                                <?php echo form_input($password);?>
                            </p>

                            <p>
                                <?php echo lang('create_user_password_confirm_label', 'password_confirm', ['class' => 'control-label']);?>
                                <br />
                                <?php echo form_input($password_confirm);?>
                            </p>


                            <p><?php echo form_submit('submit', lang('create_user_submit_btn'), ['class' => 'btn btn-primary btn-block']);?>
                            </p>

                            <?php echo form_close();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>