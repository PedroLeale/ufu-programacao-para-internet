 // Seleciona os elementos do DOM
 const modal = document.getElementById('meuModal');
 const btnAbrir = document.getElementById('abrirModal');
 const spanFechar = document.getElementsByClassName('fechar')[0];

 // Função para abrir o modal
 btnAbrir.onclick = function() {
     modal.style.display = 'flex'; // Altera o display para flex para mostrar o modal
 }

 // Função para fechar o modal ao clicar no X
 spanFechar.onclick = function() {
     modal.style.display = 'none'; // Oculta o modal
 }

 // Fecha o modal se o usuário clicar fora dele
 window.onclick = function(event) {
     if (event.target === modal) {
         modal.style.display = 'none'; // Verifica se o clique foi no fundo escuro
     }
 }