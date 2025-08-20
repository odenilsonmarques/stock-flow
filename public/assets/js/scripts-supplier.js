// validação de CPF e CNPJ com máscara e validação
document.addEventListener('DOMContentLoaded', function () {
    const typeSupplierSelect = document.getElementById('type_supplier');
    const cpfCnpjInput = document.getElementById('cpf_cnpj');
    const errorMessage = document.getElementById('error-message');

    function toggleCpfCnpj(clearValue = false) {
        if (typeSupplierSelect.value === 'Juridica') {
            cpfCnpjInput.disabled = false;
            cpfCnpjInput.placeholder = 'Digite o número do CNPJ';
            if (clearValue) cpfCnpjInput.value = '';
            applyCnpjMask();
        } else if (typeSupplierSelect.value === 'Fisica') {
            cpfCnpjInput.disabled = false;
            cpfCnpjInput.placeholder = 'Digite o número do CPF';
            if (clearValue) cpfCnpjInput.value = '';
            applyCpfMask();
        } else {
            cpfCnpjInput.disabled = true;
            cpfCnpjInput.value = '';
            cpfCnpjInput.placeholder = 'Digite aqui';
        }
        errorMessage.style.display = 'none';
    }

    typeSupplierSelect.addEventListener('change', function () {
        // Limpa o campo só se o tipo mudou
        toggleCpfCnpj(true);
        lastType = typeSupplierSelect.value;
    });

    cpfCnpjInput.addEventListener('input', validateCpfCnpj);

    // Ao carregar a página, só aplica máscara e placeholder, sem limpar valor
    toggleCpfCnpj(false);

    function applyCpfMask() {
        let value = cpfCnpjInput.value.replace(/\D/g, '').slice(0, 11);
        if (value.length > 9) {
            value = value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
        } else if (value.length > 6) {
            value = value.replace(/(\d{3})(\d{3})(\d{0,3})/, '$1.$2.$3');
        } else if (value.length > 3) {
            value = value.replace(/(\d{3})(\d{0,3})/, '$1.$2');
        }
        cpfCnpjInput.value = value;
    }

    function applyCnpjMask() {
        let value = cpfCnpjInput.value.replace(/\D/g, '').slice(0, 14);
        if (value.length > 12) {
            value = value.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, '$1.$2.$3/$4-$5');
        } else if (value.length > 8) {
            value = value.replace(/(\d{2})(\d{3})(\d{3})(\d{0,4})/, '$1.$2.$3/$4');
        } else if (value.length > 5) {
            value = value.replace(/(\d{2})(\d{3})(\d{0,3})/, '$1.$2.$3');
        } else if (value.length > 2) {
            value = value.replace(/(\d{2})(\d{0,3})/, '$1.$2');
        }
        cpfCnpjInput.value = value;
    }

    function isValidCpf(cpf) {
        cpf = cpf.replace(/\D/g, '');
        return cpf.length === 11 && !/^(\d)\1+$/.test(cpf);
    }

    function isValidCnpj(cnpj) {
        cnpj = cnpj.replace(/\D/g, '');
        return cnpj.length === 14 && !/^(\d)\1+$/.test(cnpj);
    }

    function validateCpfCnpj() {
        const value = cpfCnpjInput.value.replace(/\D/g, '');
        if (typeSupplierSelect.value === 'Juridica') {
            applyCnpjMask();
            if (!isValidCnpj(value)) {
                errorMessage.textContent = 'CNPJ inválido!';
                errorMessage.style.display = 'block';
            } else {
                errorMessage.style.display = 'none';
            }
        } else if (typeSupplierSelect.value === 'Fisica') {
            applyCpfMask();
            if (!isValidCpf(value)) {
                errorMessage.textContent = 'CPF inválido!';
                errorMessage.style.display = 'block';
            } else {
                errorMessage.style.display = 'none';
            }
        } else {
            errorMessage.style.display = 'none';
        }
    }

    typeSupplierSelect.addEventListener('change', toggleCpfCnpj);

    cpfCnpjInput.addEventListener('input', validateCpfCnpj);

    toggleCpfCnpj();
});




// validação de telefone com máscara
document.addEventListener('DOMContentLoaded', function () {
    const phoneInput = document.getElementById('phone');

    phoneInput.addEventListener('input', function (e) {
        let value = phoneInput.value.replace(/\D/g, '');

        if (value.length > 11) value = value.slice(0, 11);

        if (value.length > 10) {
            // Celular: (99) 99999-9999
            value = value.replace(/^(\d{2})(\d{5})(\d{4}).*/, '($1) $2-$3');
        } else if (value.length > 6) {
            // Fixo: (99) 9999-9999
            value = value.replace(/^(\d{2})(\d{4})(\d{0,4}).*/, '($1) $2-$3');
        } else if (value.length > 2) {
            value = value.replace(/^(\d{2})(\d{0,5})/, '($1) $2');
        } else {
            value = value.replace(/^(\d*)/, '($1');
        }

        phoneInput.value = value;
    });
});




// validação de CEP com máscara
document.addEventListener('DOMContentLoaded', function () {
    const cepInput = document.getElementById('zip_code');

    cepInput.addEventListener('input', function () {
        let value = this.value.replace(/\D/g, ''); // remove tudo que não é número

        if (value.length > 5) {
            value = value.replace(/^(\d{5})(\d{0,3})$/, '$1-$2'); // XXXXX-XXX
        }

        this.value = value;
    });
});