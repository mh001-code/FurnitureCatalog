// Simulação de dados (futuramente você pode carregar de um JSON ou banco)
const produtos = [
    {
      id: 1,
      nome: "Cama Infantil Azul",
      imagem: "https://via.placeholder.com/200x150?text=Cama+Infantil",
      categoria: "infantil"
    },
    {
      id: 2,
      nome: "Berço Branco",
      imagem: "https://via.placeholder.com/200x150?text=Berço",
      categoria: "infantil/berco"
    },
    {
      id: 3,
      nome: "Guarda-Roupas 3 portas",
      imagem: "https://via.placeholder.com/200x150?text=Guarda-Roupas",
      categoria: "quarto/guarda-roupas"
    },
    {
      id: 4,
      nome: "Cama Casal Madeira",
      imagem: "https://via.placeholder.com/200x150?text=Cama+Casal",
      categoria: "quarto"
    }
  ];
  
  // Função para obter parâmetro da URL
  function obterCategoriaURL() {
    const params = new URLSearchParams(window.location.search);
    return params.get("categoria") || "";
  }
  
  // Função para formatar categoria (ex: quarto/guarda-roupas -> Quarto / Guarda-Roupas)
  // Função para formatar a categoria
function formatarCategoria(categoria) {
    const partes = categoria.split('/');
    return partes.map(p => {
      // Primeira letra maiúscula, resto minúsculo
      return p.charAt(0).toUpperCase() + p.slice(1).toLowerCase();
    }).join(' / ');
  }

  // Pegar a categoria da URL
const urlParams = new URLSearchParams(window.location.search);
const categoria = urlParams.get('categoria');

if (categoria) {
  const tituloFormatado = formatarCategoria(categoria);
  document.title = `${tituloFormatado} - Gilmar Móveis`;
} else {
  document.title = 'Gilmar Móveis - Produtos';
}
  
  // Renderiza produtos conforme categoria
  function renderizarProdutos() {
    const categoriaSelecionada = obterCategoriaURL();
    const tituloElemento = document.getElementById("titulo-categoria");
    const container = document.getElementById("produtos-container");
  
    // Atualiza título da página
    tituloElemento.textContent = formatarCategoria(categoriaSelecionada);
  
    // Filtra produtos
    const produtosFiltrados = produtos.filter(produto =>
      produto.categoria === categoriaSelecionada
    );
  
    if (produtosFiltrados.length === 0) {
      container.innerHTML = "<p>Nenhum produto encontrado nesta categoria.</p>";
      return;
    }
  
    // Insere produtos dinamicamente
    produtosFiltrados.forEach(produto => {
      const card = document.createElement("div");
      card.classList.add("produto-card");
      card.innerHTML = `
        <img src="${produto.imagem}" alt="${produto.nome}">
        <h3>${produto.nome}</h3>
      `;
      container.appendChild(card);
    });
  }
  
  // Executa ao carregar a página
  document.addEventListener("DOMContentLoaded", renderizarProdutos);
  