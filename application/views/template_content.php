<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<div class="main-content">
    <div class="section">
        <div class="section-header"><h1><?php echo $pageTitle ?></h1></div>
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