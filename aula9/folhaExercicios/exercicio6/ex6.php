<?php
// Exercício 6 — Conta da feira de Joãozinho

$BUDGET = 50.0;

// Helpers to read floats safely
function readFloat($name, $default = 0.0) {
    return isset($_POST[$name]) ? floatval($_POST[$name]) : $default;
}

$items = [
    'maca' => ['preco' => readFloat('preco_maca', 0), 'qtd' => readFloat('qtd_maca', 0)],
    'melancia' => ['preco' => readFloat('preco_melancia', 0), 'qtd' => readFloat('qtd_melancia', 0)],
    'laranja' => ['preco' => readFloat('preco_laranja', 0), 'qtd' => readFloat('qtd_laranja', 0)],
    'repolho' => ['preco' => readFloat('preco_repolho', 0), 'qtd' => readFloat('qtd_repolho', 0)],
    'cenoura' => ['preco' => readFloat('preco_cenoura', 0), 'qtd' => readFloat('qtd_cenoura', 0)],
    'batatinha' => ['preco' => readFloat('preco_batatinha', 0), 'qtd' => readFloat('qtd_batatinha', 0)],
];

$totals = [];
$grandTotal = 0.0;
foreach ($items as $key => $v) {
    $t = $v['preco'] * $v['qtd'];
    $totals[$key] = $t;
    $grandTotal += $t;
}

$grandTotalFmt = number_format($grandTotal, 2, ',', '.');

// Message depending on budget
if (abs($grandTotal - $BUDGET) < 0.0001) {
    $message = "<p style='color:green;font-weight:bold;'>Saldo esgotado: sua compra totaliza R$ {$grandTotalFmt}.</p>";
} elseif ($grandTotal > $BUDGET) {
    $diff = number_format($grandTotal - $BUDGET, 2, ',', '.');
    $message = "<p style='color:red;font-weight:bold;'>Faltam R$ {$diff} para pagar a conta (total R$ {$grandTotalFmt}).</p>";
} else {
    $remain = number_format($BUDGET - $grandTotal, 2, ',', '.');
    $message = "<p style='color:blue;font-weight:bold;'>Restam R$ {$remain} de saldo (total R$ {$grandTotalFmt}).</p>";
}

$isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

// Build result fragment: table of item totals and final message
$rows = '';
foreach ($totals as $k => $v) {
    $label = ucfirst($k);
    $vFmt = number_format($v, 2, ',', '.');
    $rows .= "<tr><td>{$label}</td><td>R$ {$vFmt}</td></tr>";
}

$fragment = "<table><thead><tr><th>Produto</th><th>Valor (R$)</th></tr></thead><tbody>" . $rows . "</tbody></table>";
$fragment .= "<p style='margin-top:8px;font-weight:600;'>Total: R$ {$grandTotalFmt}</p>";
$fragment .= $message;

if ($isAjax) {
    echo $fragment;
    return;
}

// Full page fallback
echo "<!DOCTYPE html>\n";
echo "<html lang='pt-BR'>\n";
echo "<head><meta charset='utf-8'><title>Resultado - Exercício 6</title></head>\n";
echo "<body style='font-family:Arial,Helvetica,sans-serif;margin:18px'>\n";
echo "<h2>Resultado da Compra</h2>\n";
echo $fragment;
echo "<p><a href='ex6.html'>Voltar</a></p>\n";
echo "</body>\n</html>\n";

?>
