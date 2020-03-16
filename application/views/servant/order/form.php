<div class="row">
    <div class="col-sm-12 col-md-7 col-lg-7">
        <?php echo form_open($action, ['class' => '', 'id' => $form_id, 'method' => 'POST']) ?>
        <div class="modal-body">
            <input type="hidden" name="id" id="id">
            <div class="form-group">
                <label for="kasir">Kasir</label>
                <?php echo form_input('kasir', ($kasir->first_name . ' ' . $kasir->last_name), 'class="form-control" disabled="disabled"'); ?>
            </div>
            <div class="form-group">
                <label>Table </label>
                <?php echo form_dropdown('table_id', $tables, [], 'class="form-control selectric"') ?>
            </div>
            <div class="form-group">
                <label for="billiard_table">Name / Customer </label>
                <?php echo form_input('customer', '', 'class="form-control"') ?>
            </div>
            <div class="form-group">
                <label>Menu </label>
                <div>
                    <?php echo form_dropdown('menu[]', $menus, [], 'class="form-control" style="width: 100%" id="menus"') ?>
                </div>
            </div>
            <div class="modal-footer br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" >Checkout</button>
            </div>
        </div>
        <?php form_close();?>
    </div>
    <div class="col-sm-12 col-md-5 col-lg-5">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div>
                Order List
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <ul id="menu-item" class="fa-ul" style="margin-left: 0px;">
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <strong>Total Rp.<span id="rupiah" class="float-right" style="margin-right: 18px;">0</span></strong>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
let menu = [];
let finalPrice = 0;
$(document).ready(function() {
    $('#menus').select2({
        dropdownParent: $('.modal')
    })

    $('#menus').on("select2:select", function(e) {
        swal({
            title: "Quantity?",
            content: {
                element: "input",
                attributes: {
                    placeholder: "Berapa Banyak Pesanan ?",
                    type: "number"
                }
            }
        }).then(data => {
            let selected = e.params.data.text;
            let text = selected.split('--')
            let price = (parseInt(text[1]) * data);
            let qty = (data === null) ? 0 : data;
            menu.push({
                name: text[0] + " * " + qty,
                price: parseInt(text[1]),
                qty: data,
                id: $(this).val(),
                totalPrice: price
            })
            finalPrice += price;
            loop_selected_item();
        });

    })

    $('.modal').on('hidden.bs.modal', function(e) {
        menu = [];
        finalPrice = 0;
        $('#menus').val(null).trigger("change");
        $('#menu-item').empty();
        $('#rupiah').html(finalPrice);
    });
})

function loop_selected_item() {
    $('#menu-item').empty();
    menu.forEach((v, i) => {
        $('#menu-item').append(
            $('<li>').append(
                $('<i>').attr('class', 'fas fa-trash').append('&nbsp;&nbsp;&nbsp;'),
                $('<span>').attr('id', i).append(v.name),
                $('<span>').attr('class', 'float-right').append(v.totalPrice)
            ).attr('style', 'margin-right: 18px;')
        );

        $('#rupiah').html(finalPrice);
    })
}
</script>