
document.addEventListener("DOMContentLoaded", function () {
    var quantityInput = document.getElementById("quantity");
    var confirmQuantityInput = document.getElementById("confirm_quantity");
    var minimumQuantityInput = document.getElementById("minimum_quantity");
    // var supplierSelect = document.getElementById("supplier_id");

    var submitButton = document.getElementById("submitBtn");
    var form = document.getElementById("productForm");

    submitButton.addEventListener("click", function (event) {
        // Ensure the form's native validation runs first
        if (!form.checkValidity()) {
            // Let the browser handle the validation for required fields
            return;
        }

        // Custom validation after required fields are checked
        var quantityValue = parseFloat(quantityInput.value);
        var confirmQuantityValue = parseFloat(confirmQuantityInput.value);
        var minimumQuantityValue = parseFloat(minimumQuantityInput.value);

        if (quantityValue !== confirmQuantityValue) {
            event.preventDefault();
            swal.fire({
                title: "Ops...",
                text: "Os campos quantidade e confirme a quantidade precisam ter o mesmo valor!",
            });
        } else if (quantityValue < minimumQuantityValue) {
            event.preventDefault();
            swal.fire({
                title: "Ops...",
                text: "A quantidade mínima não pode ser maior do que a quantidade geral!",
            });
        }
    });
});
