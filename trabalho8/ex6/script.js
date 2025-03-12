// Aguarda o carregamento completo da página antes de executar o código
window.onload = function () {
    // Seleciona todos os botões dentro do elemento <nav>
    buttons = document.querySelectorAll("nav button");

    // Adiciona um evento de clique para cada botão da navegação
    for (let button of buttons) {
        button.addEventListener("click", changeTab);
    }

    // Abre a primeira aba (índice 0) ao carregar a página
    openTab(0);
}

// Função responsável por alternar entre as abas ao clicar nos botões
function changeTab(e) {
    // Obtém o botão que foi acionado
    const botaoAcionado = e.target;

    // Obtém o elemento <li> que contém o botão
    const liDoBotao = botaoAcionado.parentNode;

    // Cria uma lista com todos os elementos irmãos do <li> dentro do <ul>
    const nodes = Array.from(liDoBotao.parentNode.children);

    // Obtém o índice do <li> na lista de elementos
    const index = nodes.indexOf(liDoBotao);

    // Abre a aba correspondente ao índice obtido
    openTab(index);
}

// Função responsável por exibir a aba selecionada e ocultar as demais
function openTab(i) {
    // Obtém a aba atualmente ativa
    const tabActive = document.querySelector(".tabActive");

    // Se existir uma aba ativa, remove a classe que a destaca
    if (tabActive !== null)
        tabActive.classList.remove("tabActive");

    // Obtém o botão atualmente ativo
    const buttonActive = document.querySelector(".buttonActive");

    // Se existir um botão ativo, remove a classe que o destaca
    if (buttonActive !== null)
        buttonActive.classList.remove("buttonActive");

    // Adiciona a classe "tabActive" à aba correspondente ao índice `i`
    document.querySelectorAll(".tabs section")[i].classList.add("tabActive");

    // Adiciona a classe "buttonActive" ao botão correspondente ao índice `i`
    document.querySelectorAll("nav button")[i].classList.add("buttonActive");
}
