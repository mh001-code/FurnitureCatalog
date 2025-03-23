// Função para obter o parâmetro da URL
function getParametroUrl(param) {
  const urlParams = new URLSearchParams(window.location.search);
  return urlParams.get(param);
}

// Obter a categoria da URL
const categoria = getParametroUrl('categoria');

// Verifique se a categoria foi encontrada
if (!categoria) {
  console.error('Categoria não especificada na URL');
} else {
  // Atualizar o título da página
  document.getElementById('titulo-categoria').textContent = `${categoria.charAt(0).toUpperCase() + categoria.slice(1)} - Gilmar Móveis`;

  fetch(`../get_products.php?categoria=${encodeURIComponent(categoria)}`)
      .then(response => {
          if (!response.ok) {
              throw new Error('Erro na requisição');
          }
          return response.json();
      })
      .then(data => {
          console.log(data);  // Verifique os dados que estão sendo recebidos

          const container = document.getElementById('produtos-container');

          if (data.erro) {
              container.textContent = data.erro;
              return;
          }

          if (!data.produtos || data.produtos.length === 0) {
              container.textContent = "Nenhum produto encontrado.";
              return;
          }

          // Renderizar produtos
          data.produtos.forEach(produto => {
              const card = document.createElement('div');
              card.classList.add('produto-card');
              card.innerHTML = `
                  <h3>${produto.nome}</h3>
                  <img src="${produto.imagem}" alt="${produto.nome}" style="max-width:200px;" />
                  <p>${produto.descricao}</p>
                  <p>R$ ${produto.preco}</p>
              `;
              container.appendChild(card);
          });
      })
      .catch(error => {
          console.error('Erro:', error);
          document.getElementById('produtos-container').textContent = "Erro ao carregar produtos.";
      });
}
