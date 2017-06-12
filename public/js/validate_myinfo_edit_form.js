function validate(form) {
    fail = validateInput(form.name.value)
    fail += validateInput(form.surname.value)
    fail += validateInput(form.gender.value)
    fail += validateInput(form.numberGroup.value)
    fail += validateInput(form.email.value)
    fail += validateInput(form.countEge.value)
    fail += validateInput(form.yearOfBirth.value)
    if (fail == "") return true
    else
    {
        alert("Заполните пустые поля");
        return false
    }
}
function validateInput(fiels) {
    return (fiels == "") ? "Пустое поле" : ""
}