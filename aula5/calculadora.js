function getValores() {
    try {
        const valor1 = parseFloat(document.getElementById('informa_valor1').value);
        const valor2 = parseFloat(document.getElementById('informa_valor2').value);
        if (isNaN(valor1) || isNaN(valor2)) {
            throw new Error('Por favor, insira valores válidos.');
        }
        return [valor1, valor2];
    } catch (error) {
        alert(error.message);
        throw error;
    }
}

function somar() {
    try {
        const [valor1, valor2] = getValores();
        alert('Resultado: ' + (valor1 + valor2));
    } catch (error) {}
}

function subtrair() {
    try {
        const [valor1, valor2] = getValores();
        alert('Resultado: ' + (valor1 - valor2));
    } catch (error) {}
}

function multiplicar() {
    try {
        const [valor1, valor2] = getValores();
        alert('Resultado: ' + (valor1 * valor2));
    } catch (error) {}
}

function dividir() {
    try {
        const [valor1, valor2] = getValores();
        if (valor2 === 0) {
            throw new Error('Erro: Divisão por zero');
        }
        alert('Resultado: ' + (valor1 / valor2));
    } catch (error) {
        alert(error.message);
    }
}