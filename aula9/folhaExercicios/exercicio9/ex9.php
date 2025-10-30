<?php
// Exercício 9 — Juros compostos para parcelas

$capital_raw = isset($_POST['capital']) ? $_POST['capital'] : '8654';
$capital = floatval($capital_raw);

// levels and starting rate 2.0% for 24, increase 0.3% for subsequent levels
$levels = [24 => 2.0, 36 => 2.3, 48 => 2.6, 60 => 2.9];

$rows = '';
foreach ($levels as $n => $pct) {
    $i = $pct / 100.0;
    $M = $capital * pow(1 + $i, $n/12); // assume t in years: n months => n/12 years
    $install = $M / $n;

    $Mfmt = number_format($M, 2, ',', '.');
    $installFmt = number_format($install, 2, ',', '.');
    $rows .= "<tr><td>{$n}</td><td>{$pct}%</td><td>R$ {$Mfmt}</td><td>R$ {$installFmt}</td></tr>";
}

$fragment = "<table><thead><tr><th>Parcelas</th><th>Taxa</th><th>Montante (M)</th><th>Parcela</th></tr></thead><tbody>" . $rows . "</tbody></table>";

$isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
if ($isAjax) { echo $fragment; return; }

echo "<!DOCTYPE html>\n<html lang=\"pt-BR\">\n<head><meta charset=\"utf-8\"><title>Resultado - Exercício 9</title></head>\n<body style=\"font-family:Arial,Helvetica,sans-serif;margin:18px\">\n";
echo "<h2>Resultado</h2>\n";
echo $fragment;
echo "<p><a href=\"ex9.html\">Voltar</a></p>\n";
echo "</body>\n</html>\n";

?>
