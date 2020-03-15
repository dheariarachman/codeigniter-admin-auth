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
        <?php echo form_label('Price', 'price', ['for' => 'price']) ?>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Rp.</span>
            </div>
            <input type="text" class="form-control from-control-sm selectric" aria-label="Amount (to the nearest dollar)" name="price" id="price">
            <div class="input-group-append">
                <span class="input-group-text">.00</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="section-title">Stock Menu</div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheckDisabled" name="is_out_of_stock">
            <label class="custom-control-label" for="customCheckDisabled">Stock Tidak Tersedia</label>
        </div>
    </div>
    <div class="form-group">
        <?php echo form_label('Description', 'description', ['for' => 'description']) ?>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>
</div>
<div class="modal-footer bg-whitesmoke br">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary" onclick="save_data('<?php echo $form_id; ?>')">Save</button>
</div>
<?php form_close();?>