<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
 ?>

<div class="main-content">
    <section class="section">
        <div class="section-header justify-content-between">
            <h1><?php echo lang('index_heading');?></h1>
            <div class="btn-group mb3 btn-group-sm" role="group" aria-label="Admin Group">
                <?php echo anchor('auth/create_user', '<i class="fas fa-user"></i> '.lang('index_create_user_link'), ['class' => 'btn btn-primary btn-icon icon-left'])?>
                <?php echo anchor('auth/create_group', '<i class="fas fa-users"></i> '.lang('index_create_group_link'), ['class' => 'btn btn-primary btn-icon icon-left'])?>
            </div>
        </div>
        <div class="section-body">
            <h1 class="section-title"><?php echo lang('index_subheading') ?></h1>
            <div id="infoMessage">
                <p class="section-lead"><?php echo $message;?></p>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table cellpadding=0 cellspacing=10 class="table table-striped" id="table-data">
                                    <thead>
                                        <th scope="col"><?php echo lang('index_fname_th');?></th>
                                        <th scope="col"><?php echo lang('index_lname_th');?></th>
                                        <th scope="col"><?php echo lang('index_email_th');?></th>
                                        <th scope="col"><?php echo lang('index_action_th');?></th>
                                    </thead>
                                    <?php foreach ($users as $user):?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?>
                                            </td>
                                            <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
                                            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
                                            <td><?php echo anchor("auth/edit_user/".$user->id, '<i class="fas fa-pen"></i>', ['class' => 'btn btn-icon btn-sm btn-warning', 'title' => 'Edit Karyawan']) ;?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php endforeach;?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>