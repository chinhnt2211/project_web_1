function getElementValue(element) {
    return x = document.querySelectorAll(element)[0].value;
}
// document.querySelector('.form .btn-signup').onclick  = 
document.querySelector(".btn-signup").onclick =  function(){
    const error_name = document.querySelector("p.error_name");
    const error_email = document.querySelector("p.error_email");
    const error_phone_number = document.querySelector("p.error_phone_number");
    const error_password = document.querySelector("p.error_password");
    const error_password_again = document.querySelector("p.error_password_again");

    const name = getElementValue('input[name ="fullname"]');
    const email = getElementValue('input[name ="email"]');
    const phone_number = getElementValue('input[name ="phone_number"]');
    const password = getElementValue('input[name ="password"]');
    const password_again = getElementValue('input[name ="password_again"]');

    let regex_name = /^(?:[A-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀẾỂỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪỬỮỰỲỴÝỶỸ][a-z_àáâãèéêếìíòóôõùúăđĩũơễệỉịọỏốồổỗộớờởỡợụủứừưăạảấầẩẫậắằẳẵặẹẻẽềềểửữựỳỵỷỹ]*\s?)+$/gmu;
    let regex_email = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/mg;
    let regex_phone_number = /^[0-9]+$/g;
    let regex_password = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/gm;

    let result = true;
    // check input is empty 
    // Name
    if (name.length === 0) {
        error_name.innerHTML = "*Không được để trống ô này";
        error_name.classList.add('active-error');
        result = false;
    } else {
        if (!(regex_name.test(name))) {
            error_name.innerHTML = "*Họ và tên phải viết hoa các chữ cái đầu và không chứa kí tự đặc biệt";
            error_name.classList.add('active-error');
            result = false;
        }else{
            error_name.innerHTML = "";
            error_name.classList.remove('active-error');
        };
    }
    // Email
    if (email.length === 0) {
        error_email.innerHTML = "*Không được để trống ô này";
        error_email.classList.add('active-error');
        result = false;
    } else {
        if (!(regex_email.test(email))) {
            error_email.innerHTML = "*Email không hợp lệ";
            error_email.classList.add('active-error');
            result = false;
        }else{
            error_email.innerHTML = "";
            error_email.classList.remove('active-error');
        };
    }
    // Phone Number
    if (phone_number.length === 0) {
        error_phone_number.innerHTML = "*Không được để trống ô này";
        error_phone_number.classList.add('active-error');
        result = false;
    }else{
        if (!(regex_phone_number.test(phone_number))) {
            error_phone_number.innerHTML = "*Số điện thoại không hợp lệ";
            error_phone_number.classList.add('active-error');
            result = false;
        }else{
            error_phone_number.innerHTML = ""; 
            error_phone_number.classList.remove('active-error'); 
        };
    }
    // Password
    if (password.length === 0) {
        error_password.innerHTML = "*Không được để trống ô này";
        error_password.classList.add('active-error');
        result = false;
    } else {
        if (!(regex_password.test(password))) {
            error_password.innerHTML = "*Mật khẩu không hợp lệ";
            error_password.classList.add('active-error');
            result = false;
        }else{
            error_password.innerHTML = "";
            error_password.classList.remove('active-error');
        };
    }

    if (password_again.length === 0) {
        error_password_again.innerHTML = "*Không được để trống ô này";
        error_password_again.classList.add('active-error');
        result = false;
    } else {
        if (password != password_again) {
            error_password_again.innerHTML = "*Mật khẩu nhập lại không đúng";
            error_password_again.classList.add('active-error');
        }else{
            error_password_again.innerHTML = "";
            error_password_again.classList.remove('active-error');
        }

    }
    return result;
}



function showPass(element, elemnentInput){
    element.onclick = (() => {
        if (elemnentInput.type === "password") {
            elemnentInput.type = "text";
            element.classList.add("active-error");
        } else {
            elemnentInput.type = "password";
            element.classList.remove("active");
        }
    });
}
const passField = document.querySelector("input[name=password]");
const btnShow = document.querySelector(".show-password > i");
showPass(btnShow,passField);

const passAgField = document.querySelector("input[name=password_again]");
const btnAgShow = document.querySelector(".show-password-again > i");
showPass(btnAgShow,passAgField);