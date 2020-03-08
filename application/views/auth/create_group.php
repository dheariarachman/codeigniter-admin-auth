<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
 ?>

<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1><?php echo lang('create_group_heading');?></h1>
        </div>
        <div class="section-body">
            <div class="section-title"><?php echo lang('create_group_subheading');?></div>
            <div id="infoMessage">
                <p class="section-lead"><?php echo $message;?></p>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 offset-md-3 offset-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <?php echo form_open("auth/create_group", ['class' => 'needs-validation', 'novalidate' => '', 'method' => 'POST']);?>

                            <p>
                                <?php echo lang('create_group_name_label', 'group_name', ['class' => 'control-label']);?> <br />
                                <?php echo form_input($group_name);?>
                            </p>

                            <p>
                                <?php echo lang('create_group_desc_label', 'description', ['class' => 'control-label']);?> <br />
                                <?php echo form_input($description);?>
                            </p>

                            <p><?php echo form_submit('submit', lang('create_group_submit_btn'), ['class' => 'btn btn-block btn-primary']);?></p>

                            <?php echo form_close();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>