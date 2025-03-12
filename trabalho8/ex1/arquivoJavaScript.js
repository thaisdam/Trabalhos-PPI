document.addEventListener("DOMContentLoaded", function () {
    // Seleciona todos os elementos h2 dentro das sections
    const sub = document.querySelectorAll("h2");

    sub.forEach(sub => {
        
        sub.addEventListener("click", function () {
            // Seleciona o próximo elemento ao h2 (que é o conteúdo da seção)
            const cont = this.nextElementSibling;
            
            if (cont) {
                cont.style.display = "none";
            }
        });

        sub.addEventListener("dblclick", function () {
            // Seleciona o próximo elemento ao h2 (que é o conteúdo da seção)
            const cont = this.nextElementSibling;
            
            if (cont) {
                cont.style.display = "block";
            }
        });
    });
});
