document.addEventListener("DOMContentLoaded", () => {
  const params = new URLSearchParams(window.location.search);
  const categoria = params.get('categoria');
  const subcategoria = params.get('subcategoria'); // pode ser null

  // Função para formatar título
  function formatarTitulo(texto) {
    return texto
      .replaceAll('_', ' ')
      .split(' ')
      .map(palavra => palavra.charAt(0).toUpperCase() + palavra.slice(1))
      .join(' ');
  }

  // Atualizar título da página
  const titulo = document.getElementById("titulo-categoria");
  let tituloPagina = "Produtos";

  if (categoria) {
    tituloPagina = formatarTitulo(categoria);
  }

  if (subcategoria) {
    tituloPagina += " - " + formatarTitulo(subcategoria);
  }

  document.title = `${tituloPagina} - Gilmar Móveis`;
  titulo.textContent = tituloPagina;

  // Buscar produtos do PHP
  let url = `../php/get_products.php?categoria=${encodeURIComponent(categoria)}`;
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
    let preco = parseFloat(produto.preco);
    let valorFormatado = preco.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    let valorParcela = Math.floor((produto.preco / 5) * 100) / 100;
    let valorParcelaFormatado = valorParcela.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    let desconto = produto.preco * 0.10;
    let valorDesconto = produto.preco - desconto;
    let valorDescontoFormatado = valorDesconto.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    const card = document.createElement("div");
    card.className = "product"; // Usa a classe que já está estilizada no CSS
    card.innerHTML = `
      <img src="${produto.imagem}" alt="${produto.nome}">
      <h3>${produto.nome}</h3>
      <p class="preco"><strong>R$ ${valorFormatado}</strong></p>
      <p class="parcelamento">ou em 5x de R$ ${valorParcelaFormatado}</p>
      <p class="desconto">à vista R$ ${valorDescontoFormatado} <span class="economia">Economize 10% no Pix</span></p>
    `;
    container.appendChild(card);
  });
}

const form = document.getElementById('product-form');

form.addEventListener('submit', function (event) {
  event.preventDefault();

  const produto = {
    nome: document.getElementById('nome').value,
    preco: document.getElementById('preco').value,
    descricao: document.getElementById('descricao').value,
    imagem: document.getElementById('imagem').value,
    categoria: document.getElementById('categoria').value,
    subcategoria: document.getElementById('subcategoria').value
  };

  console.log("Produto a ser enviado:", produto);

  fetch('../php/add_product.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(produto)
  })
    .then(response => response.json())
    .then(data => {
      const mensagem = document.getElementById('mensagem');
      mensagem.textContent = data.message;

      if (data.success) {
        mensagem.style.color = 'green';
        form.reset(); // ✅ Correto agora!
      } else {
        mensagem.style.color = 'red';
      }
    })
    .catch(error => console.error('Erro ao enviar produto:', error));
});



