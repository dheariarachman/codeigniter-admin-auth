<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
    </div>
    <div class="footer-right">

    </div>
</footer>
</div>
</div>
<?php $this->load->view('dist/_partials/js'); ?>
<?php if( isset($form_page) ): ?>
<div class="modal fade bd-example-modal-lg" role="dialog" id="modal-form-add">
    <div class="modal-dialog modal-dialog-centered <?php echo ($this->method == 'order') ? 'modal-lg' : ''?>" role="document">
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
<?php endif; ?>