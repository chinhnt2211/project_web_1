function getElementValue(element) {
    return x = document.querySelectorAll(element)[0].value;
}

function checkForm() {
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


    let result = true;
    // check input is empty 
    // Name
    if (name.length === 0) {
        error_name.innerHTML = "*Không được để trống ô này";
        result = false;
    } else {
        let regex_name = /^(?:[A-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀẾỂỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪỬỮỰỲỴÝỶỸ][a-z_àáâãèéêếìíòóôõùúăđĩũơễệỉịọỏốồổỗộớờởỡợụủứừưăạảấầẩẫậắằẳẵặẹẻẽềềểửữựỳỵỷỹ]*\s?)+$/gmu;
        if (!(regex_name.test(name))) {
            error_name.innerHTML = "*Họ và tên phải viết hoa các chữ cái đầu";
            result = false;
        }else{
            error_name.innerHTML = "";
        };
    }
    // Email
    if (email.length === 0) {
        error_email.innerHTML = "*Không được để trống ô này";
        result = false;
    } else {
        let regex_email = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/mg;
        if (!(regex_email.test(email))) {
            error_email.innerHTML = "*Email không hợp lệ";
            result = false;
        }else{
            error_email.innerHTML = "";
        };
    }
    // Phone Number
    if (phone_number.length === 0) {
        error_phone_number.innerHTML = "*Không được để trống ô này";
        result = false;
    }else{
        let regex_phone_number = /^[0-9]+$/g;
        if (!(regex_phone_number.test(phone_number))) {
            error_phone_number.innerHTML = "*Số điện thoại không hợp lệ";
            result = false;
        }else{
            error_phone_number.innerHTML = ""; 
        };
    }
    // Password
    if (password.length === 0) {
        error_password.innerHTML = "*Không được để trống ô này";
        result = false;
    } else {
        let regex_password = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/gm;
        if (!(regex_password.test(password))) {
            error_password.innerHTML = "*Mật khẩu từ 6-20 ký tự chứa ít nhất 1 chữ <br> số, chứ hoa và chữ thường";
            result = false;
        }else{
            error_password.innerHTML = "";
        };
    }

    if (password_again.length === 0) {
        error_password_again.innerHTML = "*Không được để trống ô này";
        result = false;
    } else {
        if (password != password_again) {
            error_password_again.innerHTML = "*Mật khẩu nhập lại không đúng";
        }else{
            error_password_again.innerHTML = "";
        }

    }
    return result;
}



function showPass(element, elemnentInput){
    element.onclick = (() => {
        if (elemnentInput.type === "password") {
            elemnentInput.type = "text";
            element.classList.add("active");
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