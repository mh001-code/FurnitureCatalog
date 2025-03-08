function toggleMenu() {
    document.querySelector(".mobile-menu").classList.toggle("active");
}

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
