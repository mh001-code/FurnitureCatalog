function toggleMenu() {
    const menu = document.querySelector('.menu-category-inner');
    menu.classList.toggle('active');
}

document.addEventListener("DOMContentLoaded", function () {
    if (window.innerWidth <= 768) { // Somente em telas menores ou iguais a 768px
        const menuItems = document.querySelectorAll(".menu-category-list > li > a");

        menuItems.forEach(item => {
            item.addEventListener("click", function (e) {
                e.preventDefault(); // Evita o redirecionamento ao clicar no link
                const submenu = this.nextElementSibling;
                if (submenu && submenu.tagName === "UL") {
                    submenu.style.display = submenu.style.display === "block" ? "none" : "block";
                }
            });
        });
    }
});


let count = 1;
document.getElementById("radio1").checked = true;

let interval = setInterval(nextImage, 5000);

function nextImage() {
    count++;
    if (count > 4) {
        count = 1;
    }
    document.getElementById("radio" + count).checked = true;
}

// Função para resetar o temporizador ao clicar em um botão manualmente
function resetTimer(selected) {
    clearInterval(interval); // Para o intervalo atual
    count = selected; // Define a imagem correta
    document.getElementById("radio" + count).checked = true;
    interval = setInterval(nextImage, 5000); // Reinicia o intervalo
}

// Adiciona eventos de clique para cada botão de rádio
document.querySelectorAll('input[name="radio-btn"]').forEach((radio, index) => {
    radio.addEventListener("click", function () {
        resetTimer(index + 1);
    });
});
