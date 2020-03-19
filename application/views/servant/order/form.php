<div class="modal-body">
    <div class="row">
        <div class="col-sm-12 col-md-7 col-lg-7">
            <?php echo form_open($action, ['class' => '', 'id' => $form_id, 'method' => 'POST']) ?>
            <input type="hidden" name="id" id="id">
            <input type="hidden" name="created_by" id="created_by" value="<?php echo $kasir->id ?>">
            <div class="form-group">
                <label for="kasir">Kasir</label>
                <?php echo form_input('kasir', ($kasir->first_name . ' ' . $kasir->last_name), 'class="form-control" disabled="disabled"'); ?>
            </div>
            <div class="form-group">
                <label>Table </label>
                <?php echo form_dropdown('table_id', $tables, [], 'class="form-control selectric" id="table_id"') ?>
            </div>
            <div class="form-group">
                <label for="billiard_table">Name / Customer </label>
                <?php echo form_input('customer', '', 'class="form-control"') ?>
            </div>
            <div class="form-group">
                <label>Menu </label>
                <div>
                    <?php echo form_dropdown('menu', $menus, [], 'class="form-control" style="width: 100%" id="menus"') ?>
                </div>
            </div>
            <div class="form-group">
                <label>Payment </label>
                <?php echo form_dropdown('payment_type', $payments, [], 'class="form-control selectric" id="payment_type"') ?>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6"><button type="button" class="btn btn-block btn-secondary"
                        data-dismiss="modal">Close</button></div>
                <div class="col-sm-6 col-md-6 col-lg-6"><button type="submit"
                        class="btn btn-block btn-primary">Checkout</button></div>
            </div>
            <?php form_close();?>
        </div>
        <div class="col-sm-12 col-md-5 col-lg-5">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div>
                        <label for="">Order List</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <ul id="menu-item" class="fa-ul" style="margin-left: 0px;">
                    </ul>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <strong>
                        <span class="float-left">Total</span>
                        <span id="total_price" class="float-right" style="margin-right: 18px;">0</span>
                    </strong>
                </div>
            </div>
            <hr>
            <div class="form-group" style="display: none" id="cash-div">
                <label for="billiard_table">Cash </label>
                <?php echo form_input('cash', '', 'class="form-control" id="cash"') ?>
            </div>
            <div class="row" id="change-div" style="display: none">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="float-left"><span>Kembali</span></div>
                    <div class="float-right"><span id="nominal" class="float-right" style="margin-right: 18px;">0</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
let menu        = [];
let item_price  = [];
let finalPrice  = 0;

$(document).ready(function() {
    $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    $('#menus').select2({
        dropdownParent: $('#modal-form-add')
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
            item_price.push(price);
            calculateFinalPrice();
            loop_selected_item();
        });

    })

    $('.modal').on('hidden.bs.modal', function(e) {
        menu = [];
        finalPrice = 0;
        $('#total_price').html(formatter.format(finalPrice));
        $('#menus').val(0).trigger("change");
        $('#menu-item').empty();
        $('#cash').val(null);
        $('#nominal').val(0);
        $('input[name="customer"]').val("");
        $('#cash-div').css('display', 'none');
        $('#change-div').css('display', 'none');
        $('#table_id').prop('selectedIndex', 0).selectric('refresh');
        $('#payment_type').prop('selectedIndex', 0).selectric('refresh');
    });

    $('.modal').on('shown.bs.modal', function(e) {
        $(document).off('focusin.modal');
    })
})

$('#<?php echo $form_id?>').submit(function(e) {
    e.preventDefault();
    let data = $(this).serialize();
    $(this).ajaxSubmit({
        url: $(this).attr('action'),
        data: {
            menu: menu,
            cash: $('#cash').val(),
            change: parseInt($('#nominal').text())
        },
        dataType: "json",
        cache: false,
        success: function(data, txtStatus, xhr) {
            console.log(data);
        }
    });
})

$('#payment_type').on('change', function(e) {
    if ($(this).val() == 1) {
        $('#cash-div').css('display', 'block');
        $('#change-div').css('display', 'block');
    }
})

$('#cash').keyup(function() {
    let finalChange = parseInt($(this).val()) - finalPrice;
    $('#nominal').text(formatter.format(finalChange))
})

function loop_selected_item() {
    $('#menu-item').empty();
    menu.forEach((v, i) => {
        $('#menu-item').append(
            $('<li>').append(
                $('<span>')
                    .attr('class', 'badge badge-pill badge-danger')
                    .attr('id', 'delete_item')
                    .attr('data-id', i)
                    .attr('style', 'margin-right: 4px')
                    .append($('<i>').attr('class', 'fas fa-trash'),),
                $('<span>').attr('id', i).append(v.name),
                $('<span>').attr('class', 'float-right').append(formatter.format(v.totalPrice))
            ).attr('style', 'margin-right: 18px;')
        );

        $('#total_price').html(formatter.format(finalPrice));
    })
    $('#menus').val(0).trigger("change");
}

function calculateFinalPrice() {
    finalPrice = item_price.reduce(function(a, b) {return a + b}, 0);
}

$(document).on('click', '.badge-danger', function(e) {
    let idx = $(this).data('id');
    delete menu[idx];
    delete item_price[idx];
    calculateFinalPrice()
    $(this).closest('li').remove();
    console.log(finalPrice);
    $('#total_price').html(formatter.format(finalPrice));
})
</script>