// Lấy 2 button và thẻ input
var minus = document.querySelector(".input-quantity .minus");
var plus = document.querySelector(".input-quantity .plus");
var input_quantity = document.querySelector(".input-quantity .input-qty");

// Thiết lập click cho button 1
minus.onclick = function() {
    if (input_quantity.value > 1) {
        input_quantity.value = parseInt(input_quantity.value) - 1;
    }
};

// Thiết lập click cho button 2
plus.onclick = function() {
    input_quantity.value = parseInt(input_quantity.value) + 1;
};