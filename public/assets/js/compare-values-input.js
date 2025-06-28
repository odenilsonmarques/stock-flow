
document.addEventListener("DOMContentLoaded", function () {
    var amountInput = document.getElementById("amount");
    var confirmAmountInput = document.getElementById("confirm_amount");
    var minimumAmountInput = document.getElementById("minimum_amount");
    var supplierSelect = document.getElementById("supplier_id");

    var submitButton = document.getElementById("submitBtn");
    var form = document.getElementById("productForm");

    submitButton.addEventListener("click", function (event) {
        // Ensure the form's native validation runs first
        if (!form.checkValidity()) {
            // Let the browser handle the validation for required fields
            return;
        }

        // Custom validation after required fields are checked
        var amountValue = parseFloat(amountInput.value);
        var confirmAmountValue = parseFloat(confirmAmountInput.value);
        var minimumAmountValue = parseFloat(minimumAmountInput.value);

        if (amountValue !== confirmAmountValue) {
            event.preventDefault();
            swal.fire({
                title: "Ops...",
                text: "Os campos quantidade e confirme a quantidade precisam ter o mesmo valor!",
            });
        } else if (amountValue < minimumAmountValue) {
            event.preventDefault();
            swal.fire({
                title: "Ops...",
                text: "A quantidade mínima não pode ser maior do que a quantidade geral!",
            });
        }
    });
});
