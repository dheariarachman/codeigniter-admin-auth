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
                <button class="btn btn-icon btn-sm icon-left btn-danger" data-href="<?php echo site_url($delete)?>" data-id="<?php echo $value->id?>" onclick="delete_data(this)"><i class="fas fa-trash"></i> Hapus</button>
                <button class="btn btn-icon btn-sm icon-left btn-warning" data-href="<?php echo site_url($edit)?>" data-id="<?php echo $value->id?>" data-action="edit" data-target="#modal-form-add" data-toggle="modal"><i class="fas fa-pen"></i> Edit</button>
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