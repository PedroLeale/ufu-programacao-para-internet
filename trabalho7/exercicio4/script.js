// Função para alternar a visibilidade do menu
function toggleMenu() {
  const menuItems = document.querySelector(".menu-items");
  menuItems.classList.toggle("active");
}

// Função para adicionar mais produtos dinamicamente
let productCount =
  document.getElementById("products-container").childElementCount;
function addProduct() {
  productCount++;

  const productsContainer = document.getElementById("products-container");

  // Criação do card de produto
  const newCard = document.createElement("div");
  newCard.classList.add("card");

  newCard.innerHTML = `
          <img src="https://via.placeholder.com/250x150" alt="Produto ${productCount}">
          <h3>Produto ${productCount}</h3>
          <p>Descrição do Produto ${productCount}</p>
          <button onclick="addToCart()">Adicionar ao Carrinho</button>
        `;

  // Adiciona o novo card ao container de produtos
  productsContainer.appendChild(newCard);
}

// Função para exibir alerta ao adicionar ao carrinho
function addToCart() {
  alert("Produto adicionado ao carrinho!");
}
