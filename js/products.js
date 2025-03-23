document.addEventListener("DOMContentLoaded", () => {
  const params = new URLSearchParams(window.location.search);
  const categoria = params.get('categoria');
  const subcategoria = params.get('subcategoria'); // pode ser null

  // Atualizar título da página
  const titulo = document.getElementById("titulo-categoria");
  let tituloPagina = "Produtos";

  if (categoria) {
    tituloPagina = categoria.charAt(0).toUpperCase() + categoria.slice(1);
  }

  if (subcategoria) {
    tituloPagina += " - " + subcategoria.charAt(0).toUpperCase() + subcategoria.slice(1);
  }

  document.title = `${tituloPagina} - Gilmar Móveis`;
  titulo.textContent = tituloPagina;

  // Buscar produtos do PHP
  let url = `../get_products.php?categoria=${encodeURIComponent(categoria)}`;
  if (subcategoria) {
    url += `&subcategoria=${encodeURIComponent(subcategoria)}`;
  }

  fetch(url)
    .then(response => response.json())
    .then(produtos => {
      renderizarProdutos(produtos);
    })
    .catch(erro => {
      console.error("Erro ao buscar produtos:", erro);
    });
});

// Função para renderizar os produtos na tela
function renderizarProdutos(produtos) {
  const container = document.getElementById("produtos-container");
  container.innerHTML = "";

  if (!produtos || produtos.length === 0) {
    container.innerHTML = "<p>Nenhum produto encontrado.</p>";
    return;
  }

  produtos.forEach(produto => {
    const card = document.createElement("div");
    card.className = "produto-card";
    card.innerHTML = `
      <img src="${produto.imagem}" alt="${produto.nome}">
      <h3>${produto.nome}</h3>
      <p>${produto.descricao}</p>
      <p><strong>R$ ${produto.preco}</strong></p>
    `;
    container.appendChild(card);
  });
}
