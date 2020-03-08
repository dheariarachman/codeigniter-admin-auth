<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
 ?>

<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1><?php echo lang('edit_user_heading');?></h1>
        </div>
        <div class="section-body">
            <div class="section-title"><?php echo lang('edit_user_subheading');?></div>
            <div id="infoMessage">
                <p class="section-lead"><?php echo $message;?></p>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 offset-md-3 offset-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <?php echo form_open(uri_string());?>

                            <p>
                                <?php echo lang('edit_user_fname_label', 'first_name', ['class' => 'control-label']);?>
                                <br />
                                <?php echo form_input($first_name);?>
                            </p>

                            <p>
                                <?php echo lang('edit_user_lname_label', 'last_name', ['class' => 'control-label']);?>
                                <br />
                                <?php echo form_input($last_name);?>
                            </p>

                            <p>
                                <?php echo lang('edit_user_company_label', 'company', ['class' => 'control-label']);?>
                                <br />
                                <?php echo form_input($company);?>
                            </p>

                            <p>
                                <?php echo lang('edit_user_phone_label', 'phone', ['class' => 'control-label']);?>
                                <br />
                                <?php echo form_input($phone);?>
                            </p>

                            <p>
                                <?php echo lang('edit_user_password_label', 'password', ['class' => 'control-label']);?>
                                <br />
                                <?php echo form_input($password);?>
                            </p>

                            <p>
                                <?php echo lang('edit_user_password_confirm_label', 'password_confirm', ['class' => 'control-label']);?><br />
                                <?php echo form_input($password_confirm);?>
                            </p>

                            <?php if ($this->ion_auth->is_admin()): ?>

                            <h3><?php echo lang('edit_user_groups_heading', null, ['class' => 'control-label']);?></h3>
                            <?php foreach ($groups as $group):?>
                            <div class="custom-control custom-checkbox">
                                <?php
                                    $gID=$group['id'];
                                    $checked = null;
                                    $item = null;
                                    foreach($currentGroups as $grp) {
                                        if ($gID == $grp->id) {
                                            $checked= ' checked="checked"';
                                        break;
                                        }
                                    }
                                ?>
                                <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"
                                    <?php echo $checked;?> class="custom-control-input"
                                    id="group<?php echo $group['id']?>">
                                <label class="checkbox custom-control-label" for="group<?php echo $group['id']?>">
                                    <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
                                </label>
                            </div>
                            <?php endforeach?>

                            <?php endif ?>

                            <?php echo form_hidden('id', $user->id);?>
                            <?php echo form_hidden($csrf); ?>

                            <p><?php echo form_submit('submit', lang('edit_user_submit_btn'), ['class' => 'btn btn-primary btn-block']);?></p>

                            <?php echo form_close();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>