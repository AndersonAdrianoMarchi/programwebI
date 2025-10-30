<?php
// Exercício 8 — Parcelamento com juros simples

$avista_raw = isset($_POST['avista']) ? $_POST['avista'] : '8654';
$avista = floatval($avista_raw);

// Levels and rates (percentage)
$levels = [24 => 1.5, 36 => 2.0, 48 => 2.5, 60 => 3.0];

$rows = '';
foreach ($levels as $n => $pct) {
    // Juros simples sobre o principal
    $interest = $avista * ($pct / 100.0);
    $total = $avista + $interest;
    $installment = $total / $n;

    $interestFmt = number_format($interest, 2, ',', '.');
    $totalFmt = number_format($total, 2, ',', '.');
    $installFmt = number_format($installment, 2, ',', '.');

    $rows .= "<tr><td>{$n}</td><td>{$pct}%</td><td>R$ {$interestFmt}</td><td>R$ {$totalFmt}</td><td>R$ {$installFmt}</td></tr>";
}

$fragment = "<table><thead><tr><th>Parcelas</th><th>Taxa</th><th>Juros</th><th>Total</th><th>Parcela</th></tr></thead><tbody>" . $rows . "</tbody></table>";

$isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

if ($isAjax) {
    echo $fragment;
    return;
}

// fallback full page
echo "<!DOCTYPE html>\n";
echo "<html lang=\"pt-BR\">\n";
echo "<head><meta charset=\"utf-8\"><title>Resultado - Exercício 8</title></head>\n";
echo "<body style=\"font-family:Arial,Helvetica,sans-serif;margin:18px\">\n";
echo "<h2>Opções de Parcelamento</h2>\n";
echo $fragment;
echo "<p><a href=\"ex8.html\">Voltar</a></p>\n";
echo "</body>\n</html>\n";

?>
