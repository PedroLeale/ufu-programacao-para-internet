const button = document.querySelector("button");
button.onclick = function () {
    const name = document.querySelector("input").value;
    const text_field = document.querySelector("p");
    text_field.textContent = "Seu nome: " + name;
};