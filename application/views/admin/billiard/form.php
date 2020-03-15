<?php echo form_open($action, ['class' => '', 'id' => $form_id, 'method' => 'POST']) ?>
<div class="modal-body">
    <input type="hidden" name="id" id="id">
    <div class="form-group">
        <label for="billiard_table">Tables </label>
        <input type="text" class="form-control" name="billiard_table" id="billiard_table" placeholder="Masukan Nomor / Kode Meja" value="<?php ?>" >
    </div>
</div>
<div class="modal-footer bg-whitesmoke br">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary" onclick="save_data('<?php echo $form_id; ?>')">Save</button>
</div>
<?php form_close(); ?>