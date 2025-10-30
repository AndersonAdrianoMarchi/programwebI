<?php
// Exercício 1 — Soma de Três Valores
// Exibe o formulário (prefilled) e, ao submeter, mostra o resultado logo abaixo dos campos

// Recebe valores (pode ser string vazia quando não enviados)
$a = isset($_POST['a']) ? $_POST['a'] : '';
$b = isset($_POST['b']) ? $_POST['b'] : '';
$c = isset($_POST['c']) ? $_POST['c'] : '';

$resultadoHtml = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Converte para número (float) e calcula
    $af = floatval($a);
    $bf = floatval($b);
    $cf = floatval($c);
    $soma = $af + $bf + $cf;

    // Define a cor conforme as regras (aplica a primeira que corresponder)
    $cor = 'black';
    if ($af > 10) {
        $cor = 'blue';
    } elseif ($bf < $cf) {
        $cor = 'green';
    } elseif ($cf < $af && $cf < $bf) {
        $cor = 'red';
    }

    // Prepara HTML do resultado (sanitiza os valores originais para evitar XSS)
    $sa = htmlspecialchars($a, ENT_QUOTES, 'UTF-8');
    $sb = htmlspecialchars($b, ENT_QUOTES, 'UTF-8');
    $sc = htmlspecialchars($c, ENT_QUOTES, 'UTF-8');

    $resultadoHtml = "<p style=\"color:{$cor}\">A soma de {$sa} + {$sb} + {$sc} é <strong>{$soma}</strong>.</p>";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Exercício 1 – Soma de Três Valores</title>
  <style>
    body{font-family:Arial,Helvetica,sans-serif;margin:18px}
    label{display:block;margin-top:8px}
    input[type=number]{width:200px;padding:6px}
    .resultado{margin-top:12px}
  </style>
</head>
<body>
  <h2>Exercício 1 — Soma de três valores</h2>

  <!-- Formulário envia os dados para o próprio arquivo PHP -->
  <form action="ex1.php" method="post">
    <label>Primeiro valor (A):</label>
    <input type="number" step="any" name="a" required value="<?php echo htmlspecialchars($a, ENT_QUOTES, 'UTF-8'); ?>"><br><br>

    <label>Segundo valor (B):</label>
    <input type="number" step="any" name="b" required value="<?php echo htmlspecialchars($b, ENT_QUOTES, 'UTF-8'); ?>"><br><br>

    <label>Terceiro valor (C):</label>
    <input type="number" step="any" name="c" required value="<?php echo htmlspecialchars($c, ENT_QUOTES, 'UTF-8'); ?>"><br><br>

    <button type="submit">Calcular Soma</button>
  </form>

  <div class="resultado">
    <?php echo $resultadoHtml; ?>
  </div>
</body>
</html>
