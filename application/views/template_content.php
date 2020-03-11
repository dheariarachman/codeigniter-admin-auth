<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<div class="main-content">
    <div class="section">
        <div class="section-header justify-content-between">
            <h1><?php echo $this->title ?></h1>
            <?php if( isset($action) ): ?>
                <button class="btn btn-primary btn-icon icon-left" data-toggle="modal" data-target="#modal-form-add"> <i class="fas fa-plus"></i> Add <?php echo $titleModal; ?>
                </button>
            <?php endif; ?>
        </div>
        <div class="section-body">
            <div class="section-title"><?php echo $pageSubTitle ?></div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <?php $this->load->view($viewParent, $dataContent) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-form-add">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add <?php echo $this->title ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php $this->load->view($form_page); ?>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-form-edit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add <?php echo $this->title ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php $this->load->view($form_page); ?>
        </div>
    </div>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>