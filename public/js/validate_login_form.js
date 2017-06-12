function validate(form) {
    fail = validateEmail(form.email.value)
    fail += validatePass(form.pass.value)
    if (fail == "") return true
    else
    {
        alert(fail);
        return false
    }
}
function validateEmail(fiels) {
    return (fiels == "") ? "Не введен email \n" : ""
}
function validatePass(fiels) {
    return (fiels == "") ? "Не введен пароль \n" : ""
}
