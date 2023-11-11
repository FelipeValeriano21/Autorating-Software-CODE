

function verificacpf() {

    cpf = document.getElementById("cpf").value;
   const status = "Valido";
   var mescpf = document.querySelector('#mescpf');

    if (validarCPF(cpf)) {
        document.getElementById("cpf").style.border = "1px solid green ";
        mescpf.textContent  = status;
    } else {
        document.getElementById("cpf").style.border = "1px solid red ";
        mescpf.textContent  = "Invalido";
    }

}


function validarCPF(cpf) {
    cpf = cpf.replace(/[^\d]+/g, ''); // Remove caracteres não numéricos

    // Verifica se o CPF tem 11 dígitos
    if (cpf.length !== 11) {
        return false;
    }

    // Verifica se todos os dígitos são iguais (ex. 111.111.111-11)
    if (/^(\d)\1+$/.test(cpf)) {
        return false;
    }

    // Calcula o primeiro dígito verificador
    let soma = 0;
    for (let i = 0; i < 9; i++) {
        soma += parseInt(cpf.charAt(i)) * (10 - i);
    }
    let primeiroDigito = 11 - (soma % 11);
    if (primeiroDigito === 10 || primeiroDigito === 11) {
        primeiroDigito = 0;
    }
    if (primeiroDigito !== parseInt(cpf.charAt(9))) {
        return false;
    }

    // Calcula o segundo dígito verificador
    soma = 0;
    for (let i = 0; i < 10; i++) {
        soma += parseInt(cpf.charAt(i)) * (11 - i);
    }
    let segundoDigito = 11 - (soma % 11);
    if (segundoDigito === 10 || segundoDigito === 11) {
        segundoDigito = 0;
    }
    if (segundoDigito !== parseInt(cpf.charAt(10))) {
        return false;
    }

    return true;
}



function verificanome() {

    nome = document.getElementById("nome").value;
   const status = "Deve conter no minimo 3 caracteres";
   var mesnome = document.querySelector('#mesnome');

    if (nome.length < 5) {
        document.getElementById("nome").style.border = "1px solid red ";
        mesnome.textContent  = status;
    } else {
        document.getElementById("nome").style.border = "1px solid green ";
        mesnome.textContent  = "Valido";
    }

}

function verificaemail() {

    email = document.getElementById("email").value;
   const status = "Valido";
   var mesemail = document.querySelector('#mesemail');

    if (validarEmail(email)) {
        document.getElementById("email").style.border = "1px solid green ";
        mesemail.textContent  = status;
    } else {
        document.getElementById("email").style.border = "1px solid red ";
        mesemail.textContent  = "Invalido";
    }

}

function validarEmail(email) {
    // Expressão regular para validar o formato de e-mail
    var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    // Testa se o e-mail corresponde à expressão regular
    return regex.test(email);
}



