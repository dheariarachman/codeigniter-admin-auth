<?php echo form_open($add_button, ['class' => '', 'id' => $form_id, 'method' => 'POST']) ?>
<div class="modal-body">
    <div class="form-group">
        <label>Category </label>
        <input type="text" class="form-control" name="category" placeholder="Masukan Category Makanan / Minuman">
    </div>
</div>
<div class="modal-footer bg-whitesmoke br">
    <button type="button" class="btn btn-secondary" data-dismiss="modal-form-add-<?php echo $form_id; ?>">Close</button>
    <button type="button" class="btn btn-primary" onclick="save_data('<?php echo $form_id; ?>')">Save</button>
</div>
<?php form_close(); ?>