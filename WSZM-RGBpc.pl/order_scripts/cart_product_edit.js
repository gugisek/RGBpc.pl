var edit_buttons = document.querySelectorAll(".product_edit");
var delete_buttons = document.querySelectorAll(".product_delete");
var apply_buttons = document.querySelectorAll(".product_apply");
var input_quantities = document.querySelectorAll(".product_quantity");
var product_quantity_input = document.querySelectorAll(
    ".product_quantity_input"
);
var submit_button = document.querySelector(".submit_button");
var count = 0;

edit_buttons.forEach((elem, index) => {
    elem.addEventListener("click", () => {
        edit_buttons[index].style.display = "none";
        delete_buttons[index].style.display = "initial";
        apply_buttons[index].style.display = "initial";
        input_quantities[index].removeAttribute("readonly");
        count--;
        block();
    });
});

apply_buttons.forEach((elem, index) => {
    elem.addEventListener("click", () => {
        edit_buttons[index].style.display = "initial";
        delete_buttons[index].style.display = "none";
        apply_buttons[index].style.display = "none";
        input_quantities[index].setAttribute("readonly", "");
        product_quantity_input[index].value = input_quantities[index].value;
        count++;
        block();
    });
});
function block() {
    if (edit_buttons.length == count) {
        submit_button.removeAttribute("disabled");
    } else {
        submit_button.setAttribute("disabled", "");
    }
}
