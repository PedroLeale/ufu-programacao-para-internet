document.getElementById('calcular').onclick = function () {
    const altura = parseInt(document.getElementById('altura').value);
    const sexo = document.querySelector('input[name="sexo"]:checked').value;
    let pesoIdeal;

    if (sexo === 'masculino') {
        pesoIdeal = 52 + (0.75 * (altura - 152.4));
    } else if (sexo === 'feminino') {
        pesoIdeal = 52 + (0.67 * (altura - 152.4));
    }

    const resultado = document.getElementById('resultado');
    resultado.textContent = `Seu peso ideal é ${pesoIdeal.toFixed(2)} kg.`;
};