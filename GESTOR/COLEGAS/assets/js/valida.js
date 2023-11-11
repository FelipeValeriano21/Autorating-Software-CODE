
function formatarCPFInput(cpf) {
    // Obtém o valor atual do input
    let valor = cpf.value;
    
    // Remove todos os caracteres não numéricos do valor
    valor = valor.replace(/\D/g, '');

    // Verifica se o valor não está vazio
    if (valor.length > 0) {
        // Formata o CPF
        valor = valor.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
    }
    
    // Define o valor formatado de volta no input
    cpf.value = valor;
}
