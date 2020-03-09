<table class="table table-striped" id="table-data">
    <thead>
        <tr>
            <th width="50px" align="center" class="text-center">No.</th>
            <th align="center" class="text-center">Kategori</th>
            <th width="200px" align="center" class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php if( $categories->num_rows() >= 1 ): ?>
        <?php foreach( $categories->result() as $key => $value ): ?>
        <tr>
            <td class="text-center"><?php echo $no++; ?></td>
            <td><?php echo $value->category ?></td>
            <td class="text-center">
                <button class="btn btn-icon btn-sm icon-left btn-danger" data-href="<?php echo site_url('admin/master/delete_category')?>" data-id="<?php echo $value->id?>" onclick="delete_data(this)"><i class="fas fa-trash"></i> Hapus</button>
                <button class="btn btn-icon btn-sm icon-left btn-warning" data-href="<?php echo site_url('admin/master/edit_category')?>" data-toggle="modal" data-target="#modal-form-add-<?php echo $form_id?>" data-id="<?php echo $value->id?>" onclick="edit_data(this)"><i class="fas fa-pen"></i> Edit</button>
            </td>
        </tr>
        <?php endforeach;?>
        <?php else: ?>
        <tr>
            <td colspan="2" align="center">Tidak Terdapat Data</td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>