function getElementValue(element) {
    return x = document.querySelectorAll(element)[0].value;
}

function checkForm() {
    const error_email = document.querySelector("p.error_email");
    const error_password = document.querySelector("p.error_password");

    const email = getElementValue('input[name ="email"]');
    const password = getElementValue('input[name ="password"]');

    let regex_email = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/mg;
    let regex_password = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/g;
    let result = true;

    // Email
    if (email.length === 0) {
        error_email.innerHTML = "*Không được để trống ô này";
        result = false;
    } else {
        if (!(regex_email.test(email))) {
            error_email.innerHTML = "*Email không hợp lệ";
            result = false;
        }else{
            error_email.innerHTML = "";
        };
    };
    // Password
    if (password.length === 0) {
        error_password.innerHTML = "*Không được để trống ô này";
        result = false;
    } else {
        if (regex_password.test(password)) {
            error_password.innerHTML = "*Mật khẩu không hợp lệ";
            result = false;
        }else{
            error_password.innerHTML = "";
        };;
    };
    return result;
};



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
