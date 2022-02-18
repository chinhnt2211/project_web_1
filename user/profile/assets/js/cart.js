$(document).ready(function () {
    $(".btn-update-quantity").click(function () {
        let btn = $(this);
        let id = $(this).data("id");
        let type = $(this).data("type");
        $.ajax({
            type: "GET",
            url: "./process/process_cart.php",
            data: {
                id,
                type
            },
            // dataType: "dataType",
        })
            .done(function (data) {
                let parent_tr = btn.parents('tr');
                let quantity = Number(parent_tr.find('.span-quantity').text());
                let price = Number(parent_tr.find('.span-price').text().replaceAll(",", ""));
                let sum = Number(parent_tr.find('.span-sum').text().replaceAll(",", ""));
                let total = Number($('.span-total').text().replaceAll(",", ""));
                let total_bill = $(".total-price span");
                let quantity_cart = Number($('span[name=quantity-product-cart]').val());
                console.log(price, quantity, total, parent_tr.find('.span-price').text().replaceAll(",", ""));
                switch (data) {
                    case "increase":
                        quantity++;
                        total = total + price;
                        sum = sum + price;
                        parent_tr.find('.span-quantity').text(quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                        parent_tr.find('.span-sum').text(sum.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                        $('.span-total').text(total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                        $(".total-price span").text(total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                        break;
                    case "decrease":
                        quantity--;
                        total = total - price;
                        sum = sum - price;
                        parent_tr.find('.span-quantity').text(quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                        parent_tr.find('.span-sum').text(sum.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                        $('.span-total').text(total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                        $(".total-price span").text(total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                        break;
                    case "delete":
                        total = total - price * quantity;
                        if (total == 0) {
                            $('tr.total-cart').remove();
                        } else {
                            $('.span-total').text(total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                            $(".total-price span").text(total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                        }
                        parent_tr.remove();
                        if (quantity_cart > 0) {
                            quantity_cart--;
                        }
                        $('span[name=quantity-product-cart]').text(quantity_cart);
                        break;
                    default:
                        break;
                }
            });
    });
    $(".save-info").click(function () {
        let name = $("input[name=name]").val();
        let phone_number = $("input[name=phone_number]").val();
        let address = $("input[name=address]").val();

        let regex_name = /^(?:[A-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀẾỂỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪỬỮỰỲỴÝỶỸ][a-z_àáâãèéêếìíòóôõùúăđĩũơễệỉịọỏốồổỗộớờởỡợụủứừưăạảấầẩẫậắằẳẵặẹẻẽềềểửữựỳỵỷỹ]*\s?)+$/gmu;
        let regex_phone_number = /^[0-9]+$/g;
        let regex_address = /^(?:[A-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀẾỂỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪỬỮỰỲỴÝỶỸa-z_àáâãèéêếìíòóôõùúăđĩũơễệỉịọỏốồổỗộớờởỡợụủứừưăạảấầẩẫậắằẳẵặẹẻẽềềểửữựỳỵỷỹ,]*\s?)+$/gm;

        // check input is empty 
        // Name
        if (name.length === 0) {
            $("div.error-message").text("*Không được để trống ô họ và tên");
        } else {
            if (!(regex_name.test(name))) {
                $("div.error-message").text("*Họ và tên phải viết hoa các chữ cái đầu và không chứa kí tự đặc biệt");
            } else {
                $("div.error-message").text("");

                // Phone Number
                if (phone_number.length === 0) {
                    $("div.error-message").text("*Không được để trống ô số điện thoại");
                } else {
                    if (!(regex_phone_number.test(phone_number))) {
                        $("div.error-message").text("*Số điện thoại không hợp lệ");
                    } else {
                        $("div.error-message").text("");
                        // Address
                        if (address.length === 0) {
                            $("div.error-message").text("*hông được để trống ô địa chỉ");
                        } else {
                            if (!(regex_address.test(address))) {
                                $("div.error-message").text("*Địa chỉ không hợp lệ");
                            } else {
                                $("div.error-message").text("");

                                // Submit form 
                                $.ajax({
                                    type: "POST",
                                    url: "./process/process_cart.php",
                                    data: {
                                        "name": name,
                                        "phone_number": phone_number,
                                        "address": address,
                                    }
                                }).done(function (data) {
                                    console.log(data);
                                    $("#table-tbody-cart > tr").remove();
                                    $("#table-tfoot-cart > tr").remove();
                                    $('span[name=quantity-product-cart]').text("0");
                                    $("button[ name=close-form-buy]").trigger('click');
                                }).fail(function (data) {
                                })
                            };
                        }
                    }
                };
            };
        }
    })
});