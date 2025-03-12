// Aguarda o carregamento completo da página antes de executar o código
window.onload = function() {

    // Seleciona o elemento modal (a janela de diálogo)
    const modal = document.querySelector(".modal");

    // Seleciona o botão dentro do modal que será responsável por fechá-lo
    const buttonClose = modal.querySelector(".buttonClose");

    // Adiciona um evento de clique ao botão de fechar
    buttonClose.addEventListener("click", function() {
        // Oculta o modal ao definir seu estilo de exibição como 'none'
        modal.style.display = 'none';
    });

    // Seleciona o botão que abrirá o modal
    const buttonOpenModal = document.getElementById("btnOpenModal");

    // Adiciona um evento de clique ao botão de abrir
    buttonOpenModal.addEventListener("click", function() {
        // Exibe o modal ao definir seu estilo de exibição como 'block'
        modal.style.display = 'block';
    });

}
