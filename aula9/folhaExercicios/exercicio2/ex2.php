<?php
// Exercício 2 — Verifica se o número é divisível por 2

// Recebe o valor (pode ser string vazia quando não enviado)
$numero = isset($_POST['numero']) ? $_POST['numero'] : '';

$resultadoHtml = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Converte para inteiro
    $n = intval($numero);

    // Teste de divisibilidade
    if ($n % 2 == 0) {
        $mensagem = "Valor divisível por 2";
        $cor = "green";
    } else {
        $mensagem = "O valor não é divisível por 2";
        $cor = "red";
    }

    // Sanitiza e prepara HTML do resultado
    $nEsc = htmlspecialchars($numero, ENT_QUOTES, 'UTF-8');
    $resultadoHtml = "<p style=\"color:{$cor}; font-weight:bold;\">{$mensagem} (entrada: {$nEsc})</p>";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Exercício 2 – Divisível por 2</title>
  <style>
    body{font-family:Arial,Helvetica,sans-serif;margin:18px}
    label{display:block;margin-top:8px}
    input[type=number]{width:200px;padding:6px}
    .resultado{margin-top:12px}
  </style>
</head>
<body>
  <h2>Exercício 2 — Testar divisibilidade por 2</h2>

  <form action="ex2.php" method="post">
    <label>Digite um número:</label>
    <input type="number" name="numero" required value="<?php echo htmlspecialchars($numero, ENT_QUOTES, 'UTF-8'); ?>">
    <br><br>
    <button type="submit">Verificar</button>
  </form>

  <div class="resultado">
    <?php echo $resultadoHtml; ?>
  </div>
</body>
</html>

