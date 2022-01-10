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

// Popup Thong so chi tiet san pham
var popup = document.getElementById("model-popup");
var open_popup = document.getElementById("open-model");
var close_popup = document.getElementById("close-model");

open_popup.onclick = function(){
    popup.style.display = "block";
}
close_popup.onclick = function(){
    popup.style.display = "none";
}

// Rating - star
var input_rating = document.querySelector("input[name = 'rating-star']");
var one_star = document.querySelector(".rating-star-input .one-star");
var two_star = document.querySelector(".rating-star-input .two-star");
var three_star = document.querySelector(".rating-star-input .three-star");
var four_star = document.querySelector(".rating-star-input .four-star");
var five_star = document.querySelector(".rating-star-input .five-star");

one_star.onclick = function(){
    input_rating.value = 1;
    one_star.style.cssText = "color: #fc0!important;"
    two_star.style.cssText = "color: #ccc!important;"
    three_star.style.cssText = "color: #ccc!important;"
    four_star.style.cssText = "color: #ccc!important;"
    five_star.style.cssText = "color: #ccc!important;"
}
two_star.onclick = function(){
    input_rating.value = 2;
    one_star.style.cssText = "color: #fc0!important;"
    two_star.style.cssText = "color: #fc0!important;"
    three_star.style.cssText = "color: #ccc!important;"
    four_star.style.cssText = "color: #ccc!important;"
    five_star.style.cssText = "color: #ccc!important;"
}
three_star.onclick = function(){
    input_rating.value = 3;
    one_star.style.cssText = "color: #fc0!important;"
    two_star.style.cssText = "color: #fc0!important;"
    three_star.style.cssText = "color: #fc0!important;"
    four_star.style.cssText = "color: #ccc!important;"
    five_star.style.cssText = "color: #ccc!important;"
}
four_star.onclick = function(){
    input_rating.value = 4;
    one_star.style.cssText = "color: #fc0!important;"
    two_star.style.cssText = "color: #fc0!important;"
    three_star.style.cssText = "color: #fc0!important;"
    four_star.style.cssText = "color: #fc0!important;"
    five_star.style.cssText = "color: #ccc!important;"
}
five_star.onclick = function(){
    input_rating.value = 5;
    one_star.style.cssText = "color: #fc0!important;"
    two_star.style.cssText = "color: #fc0!important;"
    three_star.style.cssText = "color: #fc0!important;"
    four_star.style.cssText = "color: #fc0!important;"
    five_star.style.cssText = "color: #fc0!important;"
}