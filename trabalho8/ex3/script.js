// Aguarda o carregamento completo da página antes de executar o código
window.onload = function () {

     // Seleciona o campo de entrada (input) e adiciona um evento de escuta para a tecla pressionada
    const campoInteresse = document.querySelector("input");
    campoInteresse.addEventListener("keyup", e => {
        // Se a tecla pressionada for "Enter", chama a função para adicionar um novo interesse
        if (e.key === "Enter")
            adicionarInteresse();
    });
}

// Função responsável por adicionar um novo interesse à lista
function adicionarInteresse() {

    // Obtém o campo de entrada de interesse pelo ID
    const campoInteresse = document.querySelector("#interesse");

    // Obtém a lista ordenada (ol) onde os interesses serão adicionados
    const listaInteresses = document.querySelector("ol");

    // Cria um novo elemento de lista (li)
    const novoLi = document.createElement("li");

     // Cria um novo elemento de texto (span) para exibir o interesse
    const novoSpan = document.createElement("span");

    // Cria um botão de exclusão para remover o item da lista
    const novoBotao = document.createElement("button");

    // Define o texto do span com o valor digitado no campo de entrada
    novoSpan.textContent = campoInteresse.value;

    // Define o texto do botão como um ícone de "excluir"
    novoBotao.textContent = '❌';

     // Adiciona o span e o botão ao elemento da lista (li)
    novoLi.appendChild(novoSpan);
    novoLi.appendChild(novoBotao);

    // Adiciona o novo item (li) à lista de interesses (ol)
    listaInteresses.appendChild(novoLi);

    // Adiciona um evento ao botão para remover o item da lista quando clicado
    novoBotao.onclick = function () {
        listaInteresses.removeChild(novoLi);
    }

    // Limpa o campo de entrada após adicionar o interesse
    campoInteresse.value = '';
}
