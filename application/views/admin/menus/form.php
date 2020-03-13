<?php echo form_open($action, ['class' => '', 'id' => $form_id, 'method' => 'POST'], ['id' => '']) ?>
<div class="modal-body">
    <div class="form-group">
        <?php echo form_label('Category', 'category', ['for' => 'category']) ?>
        <?php echo form_dropdown('category', $options_categories, '', 'class="form-control form-control-sm selectric"') ?>
    </div>
    <div class="form-group">
        <?php echo form_label('Nama', 'nama', ['for' => 'name']) ?>
        <input type="text" name="name" id="name" class="form-control form-control-sm"
            placeholder="Masukan Nama Makanan / Minuman">
    </div>
    <div class="form-group">
        <?php echo form_label('Description', 'description', ['for' => 'description']) ?>
        <textarea class="summernote" id="description" name="description"></textarea>
    </div>
</div>
<div class="modal-footer bg-whitesmoke br">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary" onclick="save_data('<?php echo $form_id; ?>')">Save</button>
</div>
<?php form_close();?>