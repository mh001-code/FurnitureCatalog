document.addEventListener("DOMContentLoaded", () => {
  const params = new URLSearchParams(window.location.search);
  const id = params.get("id");

  if (!id) {
    document.body.innerHTML = "<p>ID do produto não encontrado.</p>";
    return;
  }

  fetch(`../php/get_product_by_id.php?id=${id}`)
    .then(response => response.json())
    .then(produto => {
      const whatsappDiv = document.getElementById("whatsapp-link");
      const numeroWhatsApp = "5562993122941"; // substitua com o número com DDI e DDD, sem espaços ou traços
      const mensagem = `Olá, tenho interesse no produto "${produto.nome}". Poderia me dar mais detalhes?`;
      const linkWhatsApp = `https://wa.me/${numeroWhatsApp}?text=${encodeURIComponent(mensagem)}`;

      whatsappDiv.innerHTML = `
  <a href="${linkWhatsApp}" target="_blank" class="btn-whatsapp">
    Falar sobre este produto
    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" class="icon-whatsapp" />
  </a>
`;

      if (!produto || !produto.nome) {
        document.body.innerHTML = "<p>Produto não encontrado.</p>";
        return;
      }

      document.title = produto.nome + " - Gilmar Móveis";
      document.getElementById("nome-produto").textContent = produto.nome;
      document.getElementById("imagem-produto").src = produto.imagem;
      document.getElementById("imagem-produto").alt = produto.nome;
      const descricaoFormatada = produto.descricao.replace(/([.?!])\s*/g, '$1<br>');
      document.getElementById("descricao-produto").innerHTML = descricaoFormatada;



      const preco = parseFloat(produto.preco);

      const aviso = document.getElementById("aviso-parcelamento");
      aviso.textContent = "Atenção: para parcelamentos acima de 5x, poderá haver acréscimo no valor total.";
      aviso.classList.add("aviso-parcelamento");



      // Valor parcelado em 5x
      const valorParcela = Math.floor((preco / 5) * 100) / 100;
      const valorParcelaFormatado = valorParcela.toLocaleString('pt-BR', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
      });

      // Valor com 10% de desconto
      const valorDesconto = preco - (preco * 0.10);
      const valorDescontoFormatado = valorDesconto.toLocaleString('pt-BR', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
      });

      // Valor cheio formatado
      const precoFormatado = preco.toLocaleString('pt-BR', {
        style: 'currency',
        currency: 'BRL'
      });

      // Inserindo no HTML
      document.getElementById("preco-produto").innerHTML = `
  <strong>${precoFormatado}</strong><br>
  <span class="parcelamento">ou em 5x de R$ ${valorParcelaFormatado}</span><br>
`;


      const navCategorias = document.getElementById("navegacao-categorias");

      const categoriaNomeFormatada = produto.categoria.replace(/_/g, " ");
      const linkCategoria = `<a href="products.php?categoria=${encodeURIComponent(produto.categoria)}">${categoriaNomeFormatada}</a>`;

      let linkSubcategoria = "";

      if (produto.subcategoria) {
        const subcategoriaNomeFormatada = produto.subcategoria.replace(/_/g, " ");
        linkSubcategoria = ` > <a href="products.php?categoria=${encodeURIComponent(produto.categoria)}&subcategoria=${encodeURIComponent(produto.subcategoria)}">${subcategoriaNomeFormatada}</a>`;
      }


      navCategorias.innerHTML = linkCategoria + linkSubcategoria;

    })
    .catch(erro => {
      console.error("Erro ao buscar produto:", erro);
      document.body.innerHTML = "<p>Erro ao carregar produto.</p>";
    });
});
