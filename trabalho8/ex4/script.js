// Associa a função `validaform` ao evento `onsubmit` do formulário chamado "cadastro".
// Ou seja, quando o formulário for enviado, a função de validação será executada.
document.forms.cadastro.onsubmit = validaform;

// Função responsável por validar o formulário antes do envio
function validaform(e) {
    // Obtém o formulário que acionou o evento
    let form = e.target;

    // Variável para controlar se o formulário é válido ou não
    let formValido = true;

    // Obtém os elementos <span> que exibem mensagens de erro ao lado dos campos
    const spanUsuario = form.usuario.nextElementSibling;
    const spanSenha = form.senha.nextElementSibling;
    const spanEmail = form.email.nextElementSibling;

    // Limpa as mensagens de erro antes de realizar a validação
    spanUsuario.textContent = "";
    spanSenha.textContent = "";
    spanEmail.textContent = "";

    // Verifica se o campo "usuário" está vazio
    if (form.usuario.value === "") {
        // Exibe a mensagem de erro correspondente
        spanUsuario.textContent = 'O usuário deve ser preenchido';
        formValido = false; // Indica que o formulário não é válido
    }

    // Verifica se o campo "senha" está vazio
    if (form.senha.value === "") {
        // Exibe a mensagem de erro correspondente
        spanSenha.textContent = 'A senha deve ser preenchida';
        formValido = false; // Indica que o formulário não é válido
    }

    // Verifica se o campo "email" está vazio
    if (form.email.value === "") {
        // Exibe a mensagem de erro correspondente
        spanEmail.textContent = 'O email deve ser preenchido';
        formValido = false; // Indica que o formulário não é válido
    }

    // Se alguma validação falhar, impede o envio do formulário
    if (!formValido)
        e.preventDefault();
}
