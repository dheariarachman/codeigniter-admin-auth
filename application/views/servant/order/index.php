<table class="table table-striped" id="table-data">
    <thead>
        <tr>
            <th width="50px" align="center" class="text-center">No.</th>
            <th align="center" class="text-center">Customer</th>
            <th align="center" class="text-center">Order ID</th>
            <th align="center" class="text-center">Payment</th>
            <th align="center" class="text-center">Nominal</th>
            <th width="200px" align="center" class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach( $orders->result() as $key => $value ): ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $value->customer ?></td>
            <td><?php echo $value->id ?></td>
            <td><?php echo $value->payment ?></td>
            <td><?php echo $value->nominal ?></td>
            <td></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>