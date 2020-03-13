<table class="table table-striped" id="table-data">
    <thead>
        <tr>
            <th width="50px" align="center" class="text-center">No.</th>
            <th align="center" class="text-center">Name / Kode Tables</th>
            <th width="100px" align="center" class="text-center">Capacity</th>
            <th width="200px" align="center" class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php if( $list_tables->num_rows() >= 1 ): ?>
        <?php foreach( $list_tables->result() as $key => $value ): ?>
        <tr>
            <td class="text-center"><?php echo $no++; ?></td>
            <td><?php echo $value->name ?></td>
            <td><?php echo $value->capacity ?></td>
            <td class="text-center">
                <button class="btn btn-icon btn-sm icon-left btn-danger" data-href="<?php echo site_url($delete)?>" data-id="<?php echo $value->id?>" onclick="delete_data(this)"><i class="fas fa-trash"></i> Hapus</button>
                <button class="btn btn-icon btn-sm icon-left btn-warning" data-href="<?php echo site_url($edit)?>" data-toggle="modal" data-target="#modal-form-edit" data-id="<?php echo $value->id?>" onclick="edit_data(this)"><i class="fas fa-pen"></i> Edit</button>
            </td>
        </tr>
        <?php endforeach;?>
        <?php else: ?>
        <tr>
            <td colspan="4" align="center">Tidak Terdapat Data</td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>