

$(document).ready(function()
{
    $('.addToCartBtn').click(function (e) {
        e.preventDefault();

        var item_id = $(this).closest('.item_data').find('.proditem_id').val();
        var item_qty = $(this).closest('.item_data').find('.qty-input').val();

        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/add-cart",
            data: {
                'item_id' : item_id,
                'item_qty' : item_qty,

            },
            success: function (response) {
                swal("",response.status,"success");
            }
        });

    });


    $('.increment-btn').click(function (e) {
        e.preventDefault();

        var inc_value = $(this).closest('.item_data').find('.qty-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value<10){
            value++;
            $(this).closest('.item_data').find('.qty-input').val(value);
        }
    });

    $('.decrement-btn').click(function (e) {
        e.preventDefault();

        var dec_value = $(this).closest('.item_data').find('.qty-input').val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0: value;
        if(value>1){
            value--;

            $(this).closest('.item_data').find('.qty-input').val(value);
        }
    });

    $('.delete-item').click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var item_id = $(this).closest('.item_data').find('.item_id').val();
        $.ajax({
            method: "POST",
            url: "delete-cart-item",
            data: {

                'item_id':item_id,
            },

            success: function (response) {

                window.location.reload();
                swal("",response.status, "success");
            }
        });
    });

    $('.changeqty').click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var item_id = $(this).closest('.item_data').find('.item_id').val();
        var qty = $(this).closest('.item_data').find('.qty-input').val();

        $.ajax({
            method: "POST",
            url: "update-item",
            data:
            {
                'item_id' : item_id,
                'item_qty': qty,
            },

            success: function (response) {

                window.location.reload();

            }
        });

    });
});
