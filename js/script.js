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
    if (count > 2) {
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

document.addEventListener("DOMContentLoaded", function () {
document.querySelectorAll('.carousel-container').forEach(container => {
    const carousel = container.querySelector('.carousel');
    const prevBtn = container.querySelector('.prev-btn');
    const nextBtn = container.querySelector('.next-btn');

    function checkScrollLimits() {
        prevBtn.classList.toggle("disabled", carousel.scrollLeft === 0);
        nextBtn.classList.toggle("disabled", 
            carousel.scrollLeft + carousel.clientWidth >= carousel.scrollWidth
        );
    }

     // Adiciona evento ao passar o mouse sobre os botões
     [prevBtn, nextBtn].forEach(btn => {
        btn.addEventListener("mouseenter", () => {
            if (btn.classList.contains("disabled")) {
                btn.style.cursor = "not-allowed"; // Ícone de bloqueio
            } else {
                btn.style.cursor = "pointer"; // Ícone padrão de clique
            }
        });

        btn.addEventListener("mouseleave", () => {
            btn.style.cursor = ""; // Retorna ao padrão
        });
    });

    // Verifica limites ao rolar
    carousel.addEventListener("scroll", checkScrollLimits);

    // Verifica ao carregar a página
    checkScrollLimits();

    let scrollAmount = 0;
    const scrollStep = 800; // Ajuste o tamanho do scroll conforme necessário

    prevBtn.addEventListener('click', () => {
        carousel.scrollBy({ left: -scrollStep, behavior: 'smooth' });
    });

    nextBtn.addEventListener('click', () => {
        carousel.scrollBy({ left: scrollStep, behavior: 'smooth' });
    });
});
});

