// this code aplication for  mask in phone field
document.addEventListener("DOMContentLoaded", function() {
    var phoneInput = document.getElementById("phone");
    
    phoneInput.addEventListener("input", function(event) {
        var phone = event.target.value.replace(/\D/g, "");
        
        if (phone.length > 11) {
            phone = phone.slice(0, 11);
        }
        
        if (phone.length === 11) {
            phone = phone.replace(/^(\d{2})(\d{1})(\d{4})(\d{4})$/, "($1) $2 $3-$4");
        } else if (phone.length === 10) {
            phone = phone.replace(/^(\d{2})(\d{4})(\d{4})$/, "($1) $2-$3");
        } else if (phone.length === 9) {
            phone = phone.replace(/^(\d{1})(\d{4})(\d{4})$/, "$1 $2-$3");
        } else if (phone.length === 8) {
            phone = phone.replace(/^(\d{4})(\d{4})$/, "$1-$2");
        }
        
        event.target.value = phone;
    });
});




