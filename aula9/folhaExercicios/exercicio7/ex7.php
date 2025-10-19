<?php
// Exercício 7 — Cálculo dos juros pagos no financiamento

$avista_raw = isset($_POST['avista']) ? $_POST['avista'] : '22500';
$parcelas_raw = isset($_POST['parcelas']) ? $_POST['parcelas'] : '60';
$valor_parcela_raw = isset($_POST['valor_parcela']) ? $_POST['valor_parcela'] : '489.65';

$avista = floatval($avista_raw);
$parcelas = intval($parcelas_raw);
$valor_parcela = floatval($valor_parcela_raw);

$total_parcelas = $parcelas * $valor_parcela;
$juros = $total_parcelas - $avista;

$avistaEsc = htmlspecialchars($avista_raw, ENT_QUOTES, 'UTF-8');
$parcelasEsc = htmlspecialchars($parcelas_raw, ENT_QUOTES, 'UTF-8');
$valorParcelaEsc = htmlspecialchars($valor_parcela_raw, ENT_QUOTES, 'UTF-8');

$totalFmt = number_format($total_parcelas, 2, ',', '.');
$jurosFmt = number_format($juros, 2, ',', '.');

$isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

$fragment = "<p>Preço à vista: R$ {$avistaEsc}</p>";
$fragment .= "<p>Parcelas: {$parcelasEsc} x R$ {$valorParcelaEsc} = R$ {$totalFmt}</p>";
if ($juros > 0) {
    $fragment .= "<p style='color:red;font-weight:bold;'>Total de juros pagos: R$ {$jurosFmt}</p>";
} elseif (abs($juros) < 0.0001) {
    $fragment .= "<p style='color:green;font-weight:bold;'>Sem juros (valor das parcelas igual ao à vista)</p>";
} else {
    // caso raro em que parcelamento saiu mais barato
    $fragment .= "<p style='color:blue;font-weight:bold;'>Você pagou R$ {$jurosFmt} a menos que o valor à vista.</p>";
}

if ($isAjax) {
    echo $fragment;
    return;
}

// Fallback: página completa
echo "<!DOCTYPE html>\n";
echo "<html lang='pt-BR'>\n";
echo "<head><meta charset='utf-8'><title>Resultado - Exercício 7</title></head>\n";
echo "<body style='font-family:Arial,Helvetica,sans-serif;margin:18px'>\n";
echo "<h2>Resultado</h2>\n";
echo $fragment;
echo "<p><a href='ex7.html'>Voltar</a></p>\n";
echo "</body>\n</html>\n";

?>
