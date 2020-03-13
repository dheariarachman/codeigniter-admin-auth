<?php echo form_open($action, ['class' => '', 'id' => $form_id, 'method' => 'POST']) ?>
<div class="modal-body">
    <div class="form-group">
        <input type="hidden" name="id" value="">
        <label for="name">Tables </label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Masukan Nomor / Kode Meja">
    </div>
    <div class="form-group">
        <label for="capacity">Capacity </label>
        <input type="text" class="form-control" name="capacity" id="capacity" placeholder="Masukan Kapasitas Meja">
    </div>
</div>
<div class="modal-footer bg-whitesmoke br">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary" onclick="save_data('<?php echo $form_id; ?>')">Save</button>
</div>
<?php form_close(); ?>