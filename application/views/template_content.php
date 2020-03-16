<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<div class="main-content">
    <div class="section">
        <div class="section-header justify-content-between">
            <h1><?php echo $this->title ?></h1>
            <?php if( isset($action) ): ?>
                <button class="btn btn-primary btn-icon icon-left" data-toggle="modal" data-target="#modal-form-add" data-action="add"> <i class="fas fa-plus"></i> Add <?php echo $titleModal; ?>
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

<?php $this->load->view('dist/_partials/footer'); ?>